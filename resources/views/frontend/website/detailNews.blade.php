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
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-7">
                        <p>
                            <h1  style="width:690px">{{ $new->title }}</h1>
                        </p>
                        <div>
                            <a>
                                <span style ="color: #28262c;-webkit-tap-highlight-color: transparent;">
                                     {{ $new->users->name}}
                                </span>
                            </a>
                        </div>
                        <div class ="dtepub" style="color: #89888b;font-size: .875rem; font-weight: 300;line-height: 20px;white-space: nowrap;">
                             <i class="far fa-clock">{{ $new->puplish_date}}</i>
                        </div>
                        <div>
                            <h5 class="dark" style="color: #626165;font-size: 1.25rem;font-weight: 700;line-height: 1.6em;">
                                {{ $new->description }}
                            </h5>
                        </div>
                        <div class="sn-img">
                            <img src="{{$new->image}}" style="width: 700px; height: 500px" alt="">
                        </div>
                        <div class="sn-content" style="width:650px">

                            <p style ="text-align: justify;color: #28262c; font-size: 1.125rem; font-weight: normal;line-height: 1.6em;text-align: justify;">
                               {!!$new->content!!}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Loại Tin Tức</h2>
                                <div class="category">
                                    @foreach($categories as $category)
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">{{ $category->name}}</a></li>
                                    </ul>
                                    @endforeach
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Ads 1 column</h2>
                                <div class="image">
                                    <a href=""><img src="{{asset('img/adds-1.jpg')}}" alt="Image"></a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Ads 2 column</h2>
                                <div class="image">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href=""><img src="{{asset('img/adds-1.jpg')}}" alt="Image"></a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href=""><img src="{{asset('img/adds-1.jpg')}}" alt="Image"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single News End-->


@endsection
