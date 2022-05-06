<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="@yield('EShop')">
    <!-- Favicon -->
    <link href="{{asset('assets/')}}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/')}}/css/style.css" rel="stylesheet">
    @yield('css')
    @yield('headerjs')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
@include('home.header')
  <!-- Navbar Start -->
  <div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        @include('home.category')
        @include('home.menu')
    </div>
  </div>

<div>
    @yield('content')
</div>
@include('home.footer')
@yield('footerjs')
</body>
</html>