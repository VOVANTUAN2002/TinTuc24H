@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('categoryNews.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
                </li>
            </ol>
        </nav>
        <div class="d-md-flex align-items-md-start">
            <h1 class="page-title mr-sm-auto"> Quản Lý Loại Tin Tức</h1>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col">
                    <form action="" method="GET" id="form-search" class="form-dark">
                        <div class="input-group input-group-alt">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tìm nâng cao
                                </button>
                            </div>
                        </div>
                        @include('backend.categoryNews.modals.modalSearch')
                    </form>
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
                                        <th>Tên Loại Tin</th>
                                        <th>Tên Thể Loại Tin</th>
                                    </tr>
                                </thead>
                                @foreach($categoryNews as $category)
                                <tbody>
                                    <tr>
                                        <td>{{ $category->id}}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->CategoryNews->name }}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div style="float:right">
                        {{ $categoryNews->links() }}
                    </div>

                </div>
            </div>
            <!--End Row-->
        </div>
    </div>
    @endsection