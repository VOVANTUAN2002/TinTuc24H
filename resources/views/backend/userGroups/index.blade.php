@extends('backend.layouts.master')

@section('content')


<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
            </li>
        </ol>
    </nav>
    <a href="{{route('userGroups.index')}}" class="btn btn-success btn-floated"> </a>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> Quản Lý Nhóm Nhân Viên</h1><!-- .btn-toolbar -->
        {{-- <div class="btn-toolbar">
        @if(Auth::user()->hasPermission('UserGroup_create'))
            <a href="{{ route('userGroups.create') }}" class="btn btn-primary">
                <i class="fa-solid fa fa-plus"></i>
                <span class="ml-1">Thêm Mới</span>
            </a>
        @endif
        </div> --}}
    </div>
</header>
<div class="page-section">
    <div class="card card-fluid">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active " href="{{route('userGroups.index')}}">Tất Cả</a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link " href="{{route('userGroups.trash')}}">Thùng Rác</a>
                </li> --}}
            </ul>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
            <div class="alert alert-success">{{session::get('success')}}</div>
            @endif

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Tên nhóm</th>
                            <th> Miêu tả nhóm </th>
                            <th> Chức năng </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userGroups as $userGroup)
                        <tr>
                            <td class="align-middle"> {{ $userGroup->id }} </td>
                            <td class="align-middle"> {{ $userGroup->name }} </td>
                            <td class="align-middle"> {{ $userGroup->description }} </td>
                            <td>
                                <form action="{{ route('userGroups.destroy',$userGroup->id )}}" style="display:inline" method="post">
                                    <button onclick="return confirm('Xóa {{$userGroup->name}} ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i></button>
                                    @csrf
                                    @method('delete')
                                </form>
                                <span class="sr-only">Edit</span></a> <a href="{{route('userGroups.edit',$userGroup->id)}}" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Remove</span></a>
                            </td>
                        </tr><!-- /tr -->
                        @endforeach
                    </tbody><!-- /tbody -->
                </table><!-- /.table -->
            </div>
        </div><!-- /.card-body -->
        @endsection