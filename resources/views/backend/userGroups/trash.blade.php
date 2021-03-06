@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('userGroups.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
                </li>
            </ol>
        </nav>
        <div class="d-md-flex align-items-md-start">
            <h1 class="page-title mr-sm-auto"> Quản Lý Nhóm - Thùng Rác</h1>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col">
                    <form action="" method="GET" id="form-search" class="form-dark">
                        <div class="input-group input-group-alt">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                   Tìm nâng cao
                                  </button>
                            </div>
                        </div>
                        @include('backend.userGroups.modals.modalSearch')
                    </form>
                </div>
            </div>
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('userGroups.index')}}">Tất Cả</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('userGroups.trash')}}">Thùng Rác</a>
                    </li>
                </ul>
            </div>
        </div>
        @if (Session::has('success'))
        <div class="text text-success"><b>{{session::get('success')}}</b></div>
        @endif
        @if (Session::has('error'))
        <div class="text text-danger">{{session::get('error')}}</div>
        @endif
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-borderless">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên nhóm</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            @foreach($items as $key => $item)
                            <tbody>
                                <tr>
                                    <td>{{ ++$key}}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if(Auth::user()->hasPermission('UserGroup_restore'))
                                        <span class="sr-only">Edit</span></a> <a href="{{route('userGroups.restore',$item->id)}}"
                                        class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-trash-restore"></i> <span class="sr-only">Remove</span></a>
                                        @endif
                                        @if(Auth::user()->hasPermission('UserGroup_forceDelete'))
                                        <form action="{{ route('userGroups.force_destroy',$item->id )}}" style="display:inline" method="post">
                                            <button onclick="return confirm('Xóa vĩnh viễn {{$item->name}} ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i></button>
                                            @csrf
                                            @method('delete')
                                        </form>
                                        @endif
                                    </td>

                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div style="float:right">
                    {{ $items->links() }}
                </div>

            </div>
        </div>
        <!--End Row-->
    </div>
</div>

@endsection
