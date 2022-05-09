@extends('layouts.home')
@section('title','Kullanıcı Profili')

@section('content')
    
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Kullanıcı Paneli</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Profil Bilgileri</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<div class="section">
    <div class="container">
        <div class="row">
                <div id="aside" class="col-md-2">
                    @include('home.usermenu')
                </div>

                <div id="main" class="col-md-10">
                    @include('profile.show')
                </div>
        </div>
    </div>
</div>

@endsection