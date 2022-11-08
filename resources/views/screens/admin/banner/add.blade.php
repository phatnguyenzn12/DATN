@extends('layouts.admin.master')

@section('title', 'Trang danh sách người dùng')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <div class="card-title">
                                <h3 class="card-label">Tạo khóa học</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.banner.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Tiêu đề
                                    <span class="text-danger">*</span></label>
                                <input type="text" value="" name="title" class="form-control"
                                    placeholder="Nhập tiêu đề">
                            </div>
                            {{-- @error('title')
                                    <p class="text-danger">{{ $message }}</p>    
                                @enderror --}}
                            <div class="form-group">
                                <label>Nội dung
                                    <span class="text-danger">*</span></label>
                                <input value="" type="text" name="content" class="form-control"
                                    placeholder="Nội dung">
                            </div>
                            {{-- <div class="form-group">
                                <label>Trạng thái
                                    <span class="text-danger">*</span></label>
                                <input value="" type="text" name="status" class="form-control"
                                    placeholder="Trạng thái">
                            </div> --}}
                            <div class="form-group">
                                <label>kiểu
                                    <span class="text-danger">*</span></label>
                                <input value="" type="text" name="type" class="form-control"
                                    placeholder="Kiểu">
                            </div>
                            {{-- <div class="form-group">
                                <label>Danh mục</label>
                                <select name="cate_course_id" id="select2" class="form-control">
                                    <option value="">Chọn danh mục</option>
                                    <optgroup label="">
                                        @foreach ($cateCourses as $cateCourse)
                                            <option value="{{ $cateCourse->id }}">{{ $cateCourse->name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">Tạo mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

@endsection
@push('js-handles')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
