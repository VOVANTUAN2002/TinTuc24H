@extends('frontend.layouts.master')
@section('content')


<!-- Category News Start-->
<div class="cat-news">
    <div class="container">
        <br>
        <h1 class="fas fa-search">Kết quả tìm kiếm...</h1>
        @foreach($news as $new)
        <div class="row">
            <div class="col-lg-3">
                <div class="product-img">
                    <a href="{{ route('website.detailNews',$new->id )}}">
                        <img class="default-img" src="{{$new->image}}" alt="#" style='width:100%; height: 200px'>
                    </a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="cn-content-inner">
                    <div>
                        <h5><a class="cn-title" href="{{ route('website.detailNews',$new->id )}}">{{
                                $new->title}}
                        </a></h5>
                    </div>
                    <div>
                        <p class="cn-date"><i class="far fa-clock"></i>{{ $new->puplish_date}}</p>
                    </div>
                    <div>
                        <b class="cn-date">{{ $new->description}}</b>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        @endforeach
        <div class="row">
            <div class="col-lg-12">
                <div style="float:right">
                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </div>
</div>






@endsection