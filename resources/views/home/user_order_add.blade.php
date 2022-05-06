@extends('layouts.home')
@section('title',"Siparişi Tamamla")

@section('content')
    
 <!-- Page Header Start -->
 <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Siparişi Tamamla</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Sepetim</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Siparişi Tamamla</p>
        </div>
    </div>
</div>
<!-- Page Header End -->



    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <form action="{{route('user_order_store')}}" method="post">
            @csrf 
        <div class="row px-xl-5">

            
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Fatura Adresi</h4>
                    <div class="">
                                                   
                        <div class="col form-group">
                                <label>Adınız</label>
                                <input class="form-control" type="text" name="name" value="{{Auth::User()->name}}">
                            </div>
                           
                            <div class="col form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" name="email" value="{{Auth::User()->email}}" placeholder="ornek@email.com">
                            </div>
                            <div class="col form-group">
                                <label>Tel No</label>
                                <input class="form-control" type="text" name="phone" value="{{Auth::User()->phone}}" placeholder="+90">
                            </div>
                            <div class="col form-group">
                                <label>Adres</label>
                                <input class="form-control" type="text" name="address" value="{{Auth::User()->address}}" placeholder="123 Sokak">
                            </div>
                        
                        <h4 class="font-weight-semi-bold mb-4">Kart Bilgileri</h4>
                        <div class="col form-group">
                            <label>Adınız</label>
                            <input class="form-control" type="text" name="cardname" value="{{Auth::User()->name}}">
                        </div>
                       
                        <div class="col form-group">
                            <label>Kart Numarası</label>
                            <input class="form-control" type="number" name="cardnumber"  placeholder="0000-0000-0000-0000">
                        </div>
                        <div class="col form-group">
                            <label>Son Kullanma Tarihi</label>
                            <input class="form-control" type="text" name="dates"  placeholder="00/00">
                        </div>
                        <div class="col form-group">
                            <label>CVV</label>
                            <input class="form-control" type="text" name="keys"  placeholder="000">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Sipariş Toplamı</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Ürünler</h5>

                            @foreach ($datalist as $rs)
                                    <div class="d-flex justify-content-between">
                                        <p> {{$rs->product->title}}</p>
                                        <p>{{$rs->product->price}}TL</p>
                                    </div>
                                    <hr/>
                            @endforeach
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">0 TL</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Toplam</h5>
                            <h5 class="font-weight-bold">{{$total}} TL</h5>
                            <input type="hidden" name="total" value="{{$total}}">
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Ödemeye Geç</button>
                    </div>
                </div>
            </div>
     
        </div>   </form>
    </div>
    <!-- Checkout End -->
@endsection