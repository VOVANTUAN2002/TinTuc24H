@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{route('comments.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản lý bình
                            luận</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Chỉnh Sửa Bình Luận</h1>
        </header>
        <div class="page-section">
            <form method="post" action="{{route('comments.update',$comments->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="tf1">Bình luận</label>
                                <input name="content" type="text" class="form-control" value="{{ $comments->content}}">
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('content') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-select form-control" name="startus">
                                <option value="approved" @selected( $comments->startus == 'approved') >Đã Duyệt</option>
                                <option value="pending" @selected( $comments->startus == 'pending') >Chờ Duyệt</option>
                            </select>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('startus') }}</p>
                            @endif
                        </div>
                        <div class="form-actions">
                            <a class="btn btn-secondary float-right " href="{{route('comments.index')}}">Hủy</a>
                            <button style="float: right;" class="btn btn-primary ml-auto mr-2" type="submit">Lưu<noscript></noscript> </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
