<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CateCourse;
use App\Models\Course;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CateCourseController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public  function index()
    {
        $cate = CateCourse::all();
        return view('screens.admin.catecourse.list', compact('cate'));
    }
    public function create()
    {

        return view('components.admin.catecourse.create');
    }
    public function store(Request $request)
    {
        $cate = new CateCourse();
        $cate->fill($request->all());
        $cate->save();
        return redirect()->route('admin.cate-course.index');
    }
   
    public function edit($id)
    {
        $cate = CateCourse::find($id);
        return view('components.admin.catecourse.edit',compact('cate'));
        // return view('components.admin.catecourse.edit');
    }
    public function update(Request $request, CateCourse $cateCourse,$id)
    {
        $cateCourse = CateCourse::find($id);
        $cateCourse->fill($request->except(['_method', '_token']));
        $cateCourse->update();
        return redirect()->route('admin.cate-course.index');

    }
    public function destroy($id)
    {
        $data =CateCourse::destroy($id);
        DB::table('courses')->where('cate_course_id', $id)->delete();
        return redirect()->back();
    }
}
