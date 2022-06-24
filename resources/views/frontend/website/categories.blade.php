@extends('frontend.layouts.master')
@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">News</a></li>
            <li class="breadcrumb-item active">News details</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Single News Start-->
<div class="single-news">
    <div class="container-fluid">
        <div class="row">
            @foreach($news as $new)
            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="{{ route('website.detailNews',$new->id )}}">
                            <img class="default-img" src="{{$new->image}}" alt="#" style='width:375px; height: 275px'>
                        </a>
                        <div class="cn-content">
                            <div class="cn-content-inner">
                                <a class="cn-date" href=""><i class="far fa-clock"></i>{{ $new->puplish_date}}</a><br>
                                <b><a class="cn-title" href="{{ route('website.detailNews',$new->id )}}" style="width:275px">{{
                                    $new->title}}</a></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>


@endsection
