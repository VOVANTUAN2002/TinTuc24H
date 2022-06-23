@extends('frontend.layouts.master')
@section('content')
<!-- Top News Start-->
<div class="top-news">
    <div class="container-fluid">
        <div class="row">
            @foreach($news as $new)
            <div class="col-md-6 tn-left">
                <div class="tn-img">
                    <img style="width: 644px; height: 444px" src="{{$new->image}}" />
                    <div class="tn-content">
                        <div class="tn-content-inner">
                            <a class="tn-date" href=""><i class="far fa-clock"></i>{{$new->puplish_date}}</a>
                            <a class="tn-title" href="{{ route('website.detailNews',$new->id )}}">{{$new->title}}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Top News End-->

<!-- Category News Start-->

<div class="cat-news">
    <div class="container-fluid">
        <div class="row">
            @foreach($News as $new)
            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="{{ route('website.detailNews',$new->id )}}">
                            <img class="default-img" src="{{$new->image}}" alt="#" style='width:375px; height: 275px'>
                        </a>
                        <div class="cn-content">
                            <div class="cn-content-inner">
                                <a class="cn-date" href=""><i class="far fa-clock"></i>{{ $new->puplish_date}}</a>
                                <a class="cn-title" href="{{ route('website.detailNews',$new->id )}}" style="width:275px">{{
                                    $new->title}}</a>
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
</div>
<!-- Category News End-->

<!-- Category News Start-->
<div class="cat-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h2><i class="fas fa-align-justify"></i>Việc kinh doanh</h2>
                <div class="row cn-slider">
                    <div class="col-md-6">
                        <div class="cn-img">
                            <img src="img/cat-news-7.jpg" />
                            <div class="cn-content">
                                <div class="cn-content-inner">
                                    <a class="cn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                    <a class="cn-title" href="">Interdum et malesuada fames ac ante</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cn-img">
                            <img src="img/cat-news-8.jpg" />
                            <div class="cn-content">
                                <div class="cn-content-inner">
                                    <a class="cn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                    <a class="cn-title" href="">Mauris non ligula eget ante sagittis</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cn-img">
                            <img src="img/cat-news-9.jpg" />
                            <div class="cn-content">
                                <div class="cn-content-inner">
                                    <a class="cn-date" href=""><i class="far fa-clock"></i>05-03-2020</a>
                                    <a class="cn-title" href="">Integer non nunc nec nulla aliquet</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2><i class="fas fa-align-justify"></i>Giải trí</h2>
                <div class="row cn-slider">
                    <div class="col-md-6">
                        <div class="cn-img">
                            <img src="img/cat-news-10.jpg" />
                            <div class="cn-content">
                                <div class="cn-content-inner">
                                    <a class="cn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                    <a class="cn-title" href="">Ut laoreet justo non ornare</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cn-img">
                            <img src="img/cat-news-11.jpg" />
                            <div class="cn-content">
                                <div class="cn-content-inner">
                                    <a class="cn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                    <a class="cn-title" href="">Proin a nulla ut enim feugiat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cn-img">
                            <img src="img/cat-news-12.jpg" />
                            <div class="cn-content">
                                <div class="cn-content-inner">
                                    <a class="cn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                    <a class="cn-title" href="">Sed mauris sem sollicitudin at neque</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Category News End-->

<!-- Main News Start-->

<!-- Main News End-->

@endsection