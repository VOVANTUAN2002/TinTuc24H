@extends('backend.layouts.login')
@section('content')
<form action='{{route('postLogin')}}' method='post'>
    @csrf
    <div class="form-group">
        <label for="inpuEmail">Email</label>
        <input type="email" id="inpuEmail" class="form-control input-shadow" name="email" value="{{old('phone')}}" placeholder="Nhập Email" autofocus="" >
        @if (Session::has('error_phone'))
        <div class="alert alert-danger">{{session::get('error_phone')}}</div>
        @endif
        @if ($errors->any())
        <p style="color:red">{{ $errors->first('email') }}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="inputPassword">Mật khẩu</label>
        <input type="password" id="inputPassword" class="form-control input-shadow light block" name="password" value="{{old('password')}}" placeholder="Mật khẩu" autofocus="">
        @if ($errors->any())
        <p style="color:red">{{ $errors->first('password') }}</p>
        @endif
    </div>
    <button type="submit" class="btn btn-light btn-block">Sign In</button>
</form>
@endsection
