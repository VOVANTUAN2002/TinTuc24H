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
            <h1 class="page-title mr-sm-auto"> Quản Lý Email</h1>
            <div class="btn-toolbar">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Thêm Mới
                  </button>
            </div>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm Mới</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form id="exampleForm">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="text" class="form-control" id="name" placeholder="Nhập Tên">
                                </div>
                            </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
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
                                    <th>Email</th>
                                </tr>
                            </thead>
                            {{-- @foreach($comments as $comment)
                            <tbody>
                                <tr>
                                    <td>{{ $comment->id}}</td>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->news->title }}</td>
                                    <td>{{ $comment->startus }}</td>
                                    <td>
                                        <span class="sr-only">Edit</span></a> <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-pencil-alt"></i>
                                            <span class="sr-only">Remove</span></a>
                                        <form action="{{ route('comments.destroy',$comment->id )}}" style="display:inline" method="post">
                                            <button onclick="return confirm('Xóa {{$comment->content}} ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i></button>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach --}}
                        </table>
                    </div>
                </div>
                <div style="float:right">
                    {{-- {{ $categories->links() }} --}}
                </div>

            </div>
        </div>
        <!--End Row-->
    </div>
</div>
@endsection
