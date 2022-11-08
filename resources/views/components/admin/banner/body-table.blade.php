@foreach ($banners as $banner)
<tr>
     <th>{{$banner->title}}</th>
     <th>{{$banner->content}}</th>
     <th>{{$banner->type}}</th>
     <th>{{$banner->title}}</th>
     <th>Ẩn</th>
 </tr>
    
@endforeach
