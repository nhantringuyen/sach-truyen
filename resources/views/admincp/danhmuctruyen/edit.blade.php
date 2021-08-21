@extends('layouts.app')

@section('content')

    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhật danh mục truyện</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{route('danhmuc.update',[$danhmuc->id])}}"  enctype='multipart/form-data'>
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="slug">Tên danh mục</label>
                                <input type="text" class="form-control" value="{{$danhmuc->tendanhmuc}}" name="tendanhmuc" id="slug" placeholder="Tên danh mục...">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Từ khóa</label>
                                <input type="text" class="form-control" value="{{old('tukhoa')}}" name="tukhoa" placeholder="">

                            </div>
                            <div class="form-group">
                                <label for="convert_slug">Slug danh mục</label>
                                <input type="text" class="form-control" value="{{$danhmuc->slug_danhmuc}}" name="slug_danhmuc" id="convert_slug"  placeholder="Tên danh mục...">

                            </div>
                            <div class="form-group">
                                <label for="category_desc">Mô tả danh mục</label>
                                <input type="text" class="form-control" value="{{$danhmuc->mota}}" name="mota" id="category_desc"  placeholder="Mô tả danh mục">

                            </div>
                            <div class="form-group">
                                <label for="category_image">Hình ảnh danh mục</label>
                                <input type="file" class="form-control-file" name="hinhanh" id="category_image">

                            </div>
                            <div class="form-group">
                                <label for="active_select">Kích hoạt</label>
                                <select name="kichhoat" class="custom-select" id="active_select">
                                    <option value="0" {{ $danhmuc->kichhoat == 0 ? 'selected' : ''}}>Kích hoạt</option>
                                    <option value="1" {{ $danhmuc->kichhoat == 1 ? 'selected' : ''}}>Không kích hoạt</option>
                                </select>
                            </div>

                            <button type="submit" name="themdanhmuc" class="btn btn-primary">Thêm</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
