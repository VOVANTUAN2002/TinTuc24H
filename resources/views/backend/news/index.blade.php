@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
                </li>
            </ol>
        </nav>
        <div class="d-md-flex align-items-md-start">
            <h1 class="page-title mr-sm-auto"> Quản Lý Tin Tức</h1>
            <div class="btn-toolbar">
                <a href="{{ route('news.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa fa-plus"></i>
                    <span class="ml-1">Thêm Mới</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('news.index')}}">Tất Cả</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{route('news.trash')}}">Thùng Rác</a>
                    </li>
                </ul>
            </div>
            </div>
        </div>
        @if (Session::has('success'))
        <div class="text text-success"><b>{{session::get('success')}}</b></div>
        @endif
        @if (Session::has('error'))
        <div class="text text-danger"><b>{{session::get('error')}}</b></div>
        @endif
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-borderless">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên Tin</th>
                                    <th>Nội dung</th>
                                    <th>Hot</th>
                                    <th>Ngày tạo</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            @foreach($news as $new)
                            <tbody>
                                <tr>
                                    <td>{{ $new->id }}</td>
                                    <td>{{ $new->title }}</td>
                                    <td>{{ $new->content }}</td>
                                    <td>{{ $new->hot }}</td>
                                    <td>{{ $new->puplish_date }}</td>
                                    <td>
                                        <span class="sr-only">Edit</span></a> <a href="{{route('news.edit',$new->id)}}" class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-pencil-alt"></i>
                                            <span class="sr-only">Remove</span></a>
                                        <form action="{{ route('news.destroy',$new->id )}}" style="display:inline" method="post">
                                            <button onclick="return confirm('Xóa {{$new->title}} ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i></button>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div style="float:right">
                    {{ $news->links() }}
                </div>
            </div>
        </div>
        <!--End Row-->
    </div>
</div>
@endsection
