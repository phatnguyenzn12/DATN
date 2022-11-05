@extends('layouts.admin.master')

@section('title', 'Sửa người dùng')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <div class="card-title">
                                <h3 class="card-label">Sửa người dùng</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('admin.user.saveUpdate', ['id' => request()->route('id')]) }}">
                            @csrf
                            <div class="form-group">
                                <label>Name
                                    <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $user->name }}">
                            </div>
                            {{-- @error('title')
                                    <p class="text-danger">{{ $message }}</p>    
                                @enderror --}}
                            <div class="form-group">
                                <label>Email
                                    <span class="text-danger">*</span></label>
                                <input type="text" name="email" id="name" class="form-control"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-4 control-label">Thumbnail <span
                                        class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-8">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <img id="avatar"
                                                src="{{ $user->avatar ? '' . Storage::url($user->avatar) : 'http://placehold.it/100x100' }}"
                                                alt="Your image"
                                                style="max-width: 200px; height:100px; margin-bottom: 10px;"
                                                class="img-responsive" />
                                            <div class="custom-file">
                                                <input type="file" name="avatar"
                                                    accept=".png, .jpg, .jpeg, .jfif, .webp"
                                                    class="form-control-file custom-file-input file-image @error('avatar') is-invalid @enderror">
                                                <label class="custom-file-label" for="avatar">Choose file</label><br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Phone
                                    <span class="text-danger">*</span></label>
                                <input type="text" name="number_phone" id="number_phone" class="form-control"
                                    value="{{ $user->number_phone }}">
                            </div>
                            {{-- <div class="form-group">
                                <label>Avatar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input file-image" name="avatar"
                                        accept=".png, .jpg, .jpeg, .jfif, .webp" id="avatar">
                                    <label class="custom-file-label" for="avatar">Choose file</label>
                                </div>
                                <div class="preview-image new"></div>
                                <div class="preview-image old">
                                    <img src="/"
                                        style="display:block;margin:10px auto 0;width: auto;height: 150px;object-fit:cover;border:1px solid #3699ff;border-radius:5px;">
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">Sửa</button>
                                <a href="" class="btn btn-success mr-2">Danh sách slider</a>
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
