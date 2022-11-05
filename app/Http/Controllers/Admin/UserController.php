<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(){
        return view('screens.admin.user.list');
    }
    
    public function filterData($search = 0,$record = 10)
    {
        $users = User::select('id','name','email','password');
        if($search != 0) {
            $users = $users->where('name','LIKE',"%$search%");
        }
        $users = $users->paginate($record);
        $passedDown = [
            'data' => $users
        ];
        return response()->json($passedDown,200);
    }

    public function delete($id, Request $request)
    {
        $user = new User();
        $user->dlt($id);
        return redirect()->route('admin.user.index');
    }

    public function detail($id, Request $request)
    {
        $user = new User();
        $this->v['user'] = $user->loadOne($id);
        return view('screens.admin.user.detail',$this->v);
    }

    public function update($id, Request $request)
    {
        $user = new User();
        $this->v['user'] = $user->loadOne($id);
        return view('screens.admin.user.edit-user', $this->v);
    }

    public function saveUpdate($id, Request $request)
    {

        $method_update = "admin.user.update";
        $method_user = "admin.user.index";
        $request->isMethod('post');
        $params = [];
        $params['cols'] = array_map(function ($item) {
            if ($item == '') {
                $item = null;
            }
            if (is_string($item)) {
                $item = trim($item);
            }
            return $item;
        }, $request->post());
        unset($params['cols']['_token']);
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $params['cols']['avatar'] = $this->upLoadFile($request->file('avatar'));
        }
        $params['cols']['id'] = $id;
        $objUser = new User();
        $res = $objUser->saveUpdate($params);

        if ($res == null) {
            return redirect()->route($method_user);
        } else if ($res == 1) {
            return redirect()->route($method_user)->with('success','Cập nhật thành công');
        } else {
            return redirect()->route($method_update, ['id' => $id])->with('success','Lỗi cập nhật');
        }
    }
    public function upLoadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAS('images', $fileName, 'public');
    }
}
