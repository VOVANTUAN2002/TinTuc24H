@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{route('news.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý
                            nhóm</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Chỉnh Sửa loại tinh tức</h1>
        </header>
        <div class="page-section">
            <form method="post" action="{{route('news.update',$new->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="tf1">Ngày tạo tin</label>
                                <input name="puplish_date" type="date" class="form-control" value="{{ $new->puplish_date}}">
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('puplish_date') }}</p>
                                @endif
                            </div>
                        </div>
                        <legend>Thông tin cơ bản</legend>
                        <div class="form-group">
                            <label for="tf1">Tiêu đề</label>
                            <input name="title" type="text" class="form-control" placeholder="Nhập tên Tiêu đề" value="{{ $new->title}}">
                            <small class="form-text text-muted"></small>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tf1">Mô tả Tiêu đề</label>
                            <textarea name="description" type="text" class="form-control" placeholder="Nhập tên Tiêu đề">{{ $new->description}}</textarea>
                            <small class="form-text text-muted"></small>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('description') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh:</label>
                            <input type="file" name="image" id="upload_file_input" class="form-control" value="{{ $new->image}}">
                            @if ($errors)
                            <div class="text-danger">{{$errors->first('image')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tf1">Nội dung</label>
                            <textarea name="content" type="text" class="form-control" placeholder="Nhập tên Nội dung">{{ $new->content}}</textarea>
                            <small class="form-text text-muted"></small>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('content') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Người đăng</label>
                                <select type="text" class="form-control" placeholder="danh mục" name="user_id" value="{{ $new->user_id}}">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="tf1">Lượt xem</label>
                                    <input name="view" type="text" class="form-control" placeholder="Nhập tên Tiêu đề" value="{{$new->view}}">
                                    <small class="form-text text-muted"></small>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('view') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Tình trạng</label>
                                <select name="status" class="form-control" value="{{ $new->status }}">
                                    <option value="hidden" @selected(old('status')=='hidden' )>Ẩn</option>
                                    <option value="show" @selected(old('status')=='show' )>Hiện</option>
                                </select>
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('status') }}</p>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label>Sản phẩm HOT</label>
                                <div class="form-group">
                                    <label class="switcher-control">
                                        <input type="hidden" name="hot" value="0">
                                        <input type="checkbox" class="switcher-input" name="hot" @checked( $new->hot == 1) value="1">
                                        <span class="switcher-indicator"></span>
                                    </label>
                                </div>
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('hot') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="btn btn-secondary float-right" onclick="window.history.go(-1); return false;">Hủy</button>
                            <button style="float: right;" class="btn btn-primary ml-auto" type="submit">Lưu<noscript></noscript> </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection