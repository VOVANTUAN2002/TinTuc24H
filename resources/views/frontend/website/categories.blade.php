<style>
    .col-md-4 {
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 100.333333%;
        max-width: 100.333333%;
    }

    .binhluan {
        margin-left: 140px;
    }

    .row.style_comment {
        margin-left: 140px;
        width: 744px;
    }

    .col-md-4 {
        flex: 0 0 100.333333%;
        max-width: 100.333333%;
    }

    .comment {
        width: 744px;
    }

    .header {
        height: 55px;
    }
</style>
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
            <div class="col-md-12">

                <style type="text/css">
                    .style_comment {
                        border: 1px solid #ddd;
                        border-radius: 10px;
                        background: #F0F0E9;
                    }
                </style>
                <div class="binhluan">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="#">
                                <h5>Bình Luận</h5>
                                <p><textarea rows="5" style="resize:none;" class="form-control comment">
                                </textarea></p>
                                <p><input type="button" class="btn btn-success sent-comment" value="Gửi Bình luận"></p>
                                <div id="notyfi_comment"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <form>
                    @csrf
                    <div id="comment_show"></div>
                    <input type="hidden" name="comment_new_id" class="comment_new_id" value="{{ $new->id }}">
                    {{-- <div class="row style_comment">
                        <div class="row col-md-2">

                            <img width="100%" src="{{asset('avatars/Comics-Batman-icon.png')}}"
                                class="img img-responsive img-thumbnail">

                        </div>
                        <div class="col-md-4">
                            <p style="color:green">Văn Toàn</p>
                            Active. Điều bất ngờ là, Free Fire gần như biến mất trong BXH doanh thu game mobile toàn cầu
                            tháng
                            này.
                            Điều rất hiếm khi xảy ra, ít nhất là trong khoảng 1 năm trở lại đây.
                            Trong cả hai bảng doanh thu tổng lẫn iOS, Free Fire đều không hề xuất hiện.
                        </div>
                    </div> --}}
                </form>
            </div>
        </div>


        <script type="text/javascript">
            $(document).ready(function () {


                load_comments()

                function load_comments() {

                    var news_comment = $('.comment_new_id').val();
                    var token = $('input[name="_token"]').val();

                    // alert(token);
                    $.ajax({
                        url: "{{url('/load-comment')}}",
                        method: "POST",
                        data: {
                            news_comment: news_comment,
                            token: token,
                        },
                        success: function (status, data) {
                            console.log(status, data);
                            $('#comment_show').html(status, data);
                        }
                    });
                }

                $('.sent-comment').click(function () {
                    var news_comment = $('.comment_new_id').val();
                    var comment = $('.comment').val();
                    var token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{url('/send-comment')}}",
                        method: "POST",
                        data: {
                            token: token,
                            comment: comment,
                            news_comment: news_comment,
                        },
                        success: function (status, data) {
                            console.log(status);
                            $('#notyfi_comment').html('<span class="text text-success">Bình Luận Đang chờ duyệt</span>')
                            load_comments();
                            $('#notyfi_comment').fadeOut(20000);
                            $('.comment').val('');
                        }
                    });

                });
            });



        </script>

        @endsection