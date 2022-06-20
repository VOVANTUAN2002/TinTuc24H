<div class="header">
    <div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav m-auto">
                    <a href="{{ route('website.home')}}" class="nav-item nav-link active">Tin Tức</a>
                    @foreach($categories as $category)
                    <a href=" {{ route('website.detailNews',$category->id)}}" class="nav-item nav-link">{{ $category->name }}</a>
                    @endforeach
            </div>
        </nav>
    </div>
</div>