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
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Anasayfa</h1>
    </div>
</div>
<!-- Page Header End -->
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Müşteri Memnuniyeti</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Ücretsiz Kargo</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Gün İade Hakkı</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">7/24 Destek</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
            @php
            $parentCategories=\App\Http\Controllers\HomeController::categoryList()
        @endphp
            
            <!-- Categories Start -->
            <div class="container-fluid pt-5">
                <div class="text-center mb-4">
                    <h2 class="section-title px-5"><span class="px-2">Kategorilerimiz</span></h2>
                </div>
                <div class="row px-xl-5 pb-3">

                    @foreach ($parentCategories as $rs)
    
                    <div class="col-lg-4 col-md-6 pb-1" sty>
                        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px; align-items: center;">
                            <p class="text-right">{{DB::table('products')->where('category_id', $rs->id)->count();}}</p>
                            <a href="" class="cat-img position-relative overflow-hidden mb-3">
                                <img class="img-fluid" src="{{Storage::url($rs->image)}}" style="height:450px" alt="">
                            </a>
                            <h5 class="font-weight-semi-bold m-0">{{$rs->title}}</h5>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
            <!-- Categories End -->
            
        
        </div>
    </div>
    <!-- Categories End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Bugüne Özel</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">

            @foreach ($daily as $rs)
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" src="{{Storage::url($rs->image)}}" style="height:450px" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{$rs->title}}</h6>
                                    <h7 class="text-truncate mb-3">{{$rs->durum}}</h7>
                                    <h1></h1>
                                    <div class="d-flex justify-content-center">
                                        <h6>{{$rs->price}}</h6><h6 class="text-muted ml-2"><del>{{$rs->price*2}}</del></h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Detaylar</a>
                                    <a href="{{route('addtocart',['id'=>$rs->id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Sepete Ekle</a>
                                </div>
                            </div>
                        </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->


    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">İndirim Haberleri Al</span></h2>
                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="E-postanı buraya gir">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Abone Ol</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->

 <!-- Products Start -->
 <div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">En Ucuz Ürünler</span></h2>
    </div>
        <div class="row px-xl-5 pb-3">

                     @foreach ($cheap as $rs)
                                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                                        <div class="card product-item border-0 mb-4">
                                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                                <img class="img-fluid w-100" src="{{Storage::url($rs->image)}}" style="height:450px"  alt="">
                                            </div>
                                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                                <h6 class="text-truncate mb-3">{{$rs->title}}</h6>
                                                <h7 class="text-truncate mb-3">{{$rs->durum}}</h7>
                                                <h1></h1>
                                                <div class="d-flex justify-content-center">
                                                    <h6>{{$rs->price}}</h6><h6 class="text-muted ml-2"><del>{{$rs->price*2}}</del></h6>
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex justify-content-between bg-light border">
                                                <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Detaylar</a>
                                                <a href="{{route('addtocart',['id'=>$rs->id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Sepete Ekle</a>
                                            </div>
                                        </div>
                                    </div>
                    @endforeach
    </div>
</div>
<!-- Products End -->
    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Senin İçin Hazırlandı</span></h2>
        </div>
            <div class="row px-xl-5 pb-3">

                         @foreach ($picked as $rs)
                                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                                            <div class="card product-item border-0 mb-4">
                                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                                    <img class="img-fluid w-100" src="{{Storage::url($rs->image)}}" style="height:450px"  alt="">
                                                </div>
                                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                                    <h6 class="text-truncate mb-3">{{$rs->title}}</h6>
                                                    <h7 class="text-truncate mb-3">{{$rs->durum}}</h7>
                                                    <h1></h1>
                                                    <div class="d-flex justify-content-center">
                                                        <h6>{{$rs->price}}</h6><h6 class="text-muted ml-2"><del>{{$rs->price*2}}</del></h6>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex justify-content-between bg-light border">
                                                    <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Detaylar</a>
                                                    <a href="{{route('addtocart',['id'=>$rs->id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Sepete Ekle</a>
                                                </div>
                                            </div>
                                        </div>
                        @endforeach
        </div>
    </div>
    <!-- Products End -->

  <!-- Products Start -->
  <div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Son Eklenenler</span></h2>
    </div>
        <div class="row px-xl-5 pb-3">

                     @foreach ($last as $rs)
                                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                                        <div class="card product-item border-0 mb-4">
                                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                                <img class="img-fluid w-100" src="{{Storage::url($rs->image)}}" style="height:450px"  alt="">
                                            </div>
                                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                                <h6 class="text-truncate mb-3">{{$rs->title}}</h6>
                                                <h7 class="text-truncate mb-3">{{$rs->durum}}</h7>
                                                <h1></h1>
                                                <div class="d-flex justify-content-center">
                                                    <h6>{{$rs->price}}</h6><h6 class="text-muted ml-2"><del>{{$rs->price*2}}</del></h6>
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex justify-content-between bg-light border">
                                                <a href="{{route('product',['id'=>$rs->id,'slug'=>$rs->slug])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Detaylar</a>
                                                <a href="{{route('addtocart',['id'=>$rs->id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Sepete Ekle</a>
                                            </div>
                                        </div>
                                    </div>
                    @endforeach
    </div>
</div>
<!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="{{asset('assets/')}}/img/vendor-1.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('assets/')}}/img/vendor-2.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('assets/')}}/img/vendor-3.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('assets/')}}/img/vendor-4.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('assets/')}}/img/vendor-5.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('assets/')}}/img/vendor-6.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('assets/')}}/img/vendor-7.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('assets/')}}/img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

@endsection