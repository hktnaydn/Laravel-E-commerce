@extends('layouts.home')
@section('title','Ürün Detay')

@section('content')
    
  <!-- Page Header Start -->
  <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Ürün Detayları</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Anasayfa</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Ürün Detayları
            </p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{Storage::url($data->image)}}" alt="Image">
                    </div>
                        @foreach($datalist as $rs)
                            <div class="carousel-item">
                                <img class="w-100 h-100" src="{{Storage::url($rs->image)}}" alt="Image">
                            </div>
                        @endforeach 
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{$data->title}}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
               
            </div><br>
            <h4>Kullanım Durumu : </h4><h5 class="font-weight-semi-bold mb-4">{{$data->durum}}</h5>
            <h3 class="font-weight-semi-bold mb-4">{{$data->price}} TL</h3>
            <p class="mb-4">{{$data->description}}</p>
         
            <div class="d-flex mb-4">
               
            </div><br><br>
            <div class="d-flex align-items-center mb-4 pt-2">
                <form action="{{route('user_shopcart_add',['id'=>$data->id])}}" method="POST">
                    @csrf
                                        <button  class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Sepete Ekle</button>
                                        @if (session('alert'))
                                            <div class="alert alert-success">
                                            {{ session('alert') }}
                                            </div>
                                        @endif
                </form>
            </div>
            
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Detaylar</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">İade Hakları</a>
                
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Ürün Detayları</h4>
                    <p> {!!$data->detail!!}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-2">
                    <h4 class="mb-3">Aldığım Ürünü Nasıl İade edebilirim</h4>
                    <p> İadelerinizi kolay iade adımında belirtilen kargo firması ile ÜCRETSİZ gönderebilirsiniz.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0">
                                    trendyol.com ve mobil uygulamalarda yer alan "Hesabım" bölümünden “Siparişlerim'e“ gidin.
                                </li>
                                <li class="list-group-item px-0">
                                    “Detaylar” butonuna basın ve siparişinizin detaylarını görüntüleyin.
                                </li>
                                <li class="list-group-item px-0">
                                    "Kolay İade Talebi Oluştur" butonuna basın.
                                </li>
                                <li class="list-group-item px-0">
                                    İade edilecek ürün ve iade nedeni seçin. Aynı üründen birden fazla satın aldıysanız iade edilecek ürün adedini de seçmeniz gerekir.
                                </li>
                              </ul> 
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0">
                                    Ekranda çıkan iade kargo kodunu not alın. İade kargo kodunuza "Siparişlerim" sayfasından ve üyelik mail adresinize gönderilen bilgilendirme mesajından da ulaşabilirsiniz.
                                </li>
                                <li class="list-group-item px-0">
                                    İade edilecek ürünler ile birlikte faturayı tek bir pakete koyun. (Her bir teslimat için iade kodu ayrı ayrı alınmalı ve paketler ayrı ayrı hazırlanarak kargoya verilmelidir.)

• Faturanız yoksa aşağıdaki bilgileri boş bir kağıda yazıp iade paketinin içine koyup iadenizi yapabilirsiniz.

o Ad Soyad:

o Sipariş No:

o İade Nedeni:
                                </li>
                                <li class="list-group-item px-0">
                                    Paketi iade kargo koduyla birlikte seçtiğiniz kargoya 7 gün içinde teslim edin. Kodu vermeniz yeterlidir, ayrıca bir İade adresi belirtmeniz gerekmez. 7 günü geçirdiğiniz durumda yeniden iade kargo kodu almalısınız.


                                </li>
                                <li class="list-group-item px-0">
                                    Paketi iade kargo koduyla birlikte seçtiğiniz kargoya 7 gün içinde teslim edin. Kodu vermeniz yeterlidir, ayrıca bir İade adresi belirtmeniz gerekmez. 7 günü geçirdiğiniz durumda yeniden iade kargo kodu almalısınız.


                                </li>
                              </ul> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->


<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
                <div class="card product-item border-0">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
                <div class="card product-item border-0">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-2.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
                <div class="card product-item border-0">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-3.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
                <div class="card product-item border-0">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-4.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
                <div class="card product-item border-0">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-5.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Products End -->
@endsection