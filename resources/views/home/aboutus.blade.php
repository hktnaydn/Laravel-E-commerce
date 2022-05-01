@extends('layouts.home')
@section('title',$setting->title)
@section('description')
{{$setting->description}}
@endsection
@section('keywords',$setting->keywords)
@section('content')
    
 <!-- Page Header Start -->
 <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Hakkımızda</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Anasayfa</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Hakkımızda</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="mb-4">
                 {!!$setting->aboutus!!}
            </div>
            <div class="collapse mb-4" id="shipping-address">
              
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                  
                
            </div>
            <div class="card border-secondary mb-5">
          
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->
@endsection