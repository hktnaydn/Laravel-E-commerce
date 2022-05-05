<div class="col-lg-9">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
        <a href="" class="text-decoration-none d-block d-lg-none">
            <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{route('home')}}" class="nav-item nav-link active">ANASAYFA</a>
                <a href="{{route('aboutus')}}" class="nav-item nav-link">Hakkımızda</a>
                <a href="{{route('references')}}" class="nav-item nav-link">Referanslar</a>
                <a href="{{route('faq')}}" class="nav-item nav-link">Sık Sorulan Sorular</a>
                <a href="{{route('contact')}}" class="nav-item nav-link">İletişim</a>
            </div>
            @auth
            <nav class="navbar">
                <div class="navbar-nav">
                    <div class="nav-item dropdown">
                      <a class="nav-link" data-toggle="dropdown">{{Auth::user()->name}} <i class="fa fa-user-o"></i></a>
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                          <a href="{{route('myprofile')}}" class="dropdown-item">Hesabım</a> 
                                          <a href="{{route('home')}}" class="dropdown-item">Cüzdanım</a> 
                                          <a href="" class="dropdown-item">Siparişlerim</a> 
                                          <a href="{{route('logout')}}" class="dropdown-item">Çıkış Yap</a>         
                        </div>
                    </div>
                </div>
            </nav>
            @endauth
            @guest
            <div class="navbar-nav ml-auto py-0">
                <a href="{{'login'}}" class="nav-item nav-link">Login</a>
                <a href="/register" class="nav-item nav-link">Register</a>
            </div>
            @endguest
        </div>
    </nav>
    
</div>