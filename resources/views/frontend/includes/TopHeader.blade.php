<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4">
                <div class="logo">
                    <a href="">
                        <img src="{{asset('img/logo.png')}}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <form action="{{ route('website.search')}}" method="get" style="width: 100%;">
                    <div class="input-group has-clearable">
                        <div class="input-group-prepend trigger-submit">
                            <span class="input-group-text"><span class="fas fa-search"></span></span>
                        </div>
                        <input type="text" class="form-control" name="title" value="" placeholder="Tìm kiếm">
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="social">
                    <a href="https://twitter.com/?lang=vi"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>