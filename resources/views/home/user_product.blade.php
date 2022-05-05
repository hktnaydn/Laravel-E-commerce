@extends('layouts.home')
@section('title',"Ürünlerim")

@section('content')
    
 <!-- Page Header Start -->
 <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Ürünlerim</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Hesabım</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Ürünlerim</p>
        </div>
    </div>
</div>
<!-- Page Header End -->



<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-2">
            @include('home.usermenu')
        </div>


        <div class="col-lg-10">
            <div class="card-tools">
                <h5> <a class="btn btn-block btn-info" href="{{route('user_products_create')}}">Ürün Ekle</a></h5>
              </div>
                                    <!-- Checkout Start -->
                    <div class="container-fluid">
                        <div class="row px-xl-5">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kategori</th>
                                    <th>Başlık</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Statü</th>
                                    <th>Durum</th>
                                    <th>Resim Galerisi</th>
                                    <th>Düzenle</th>
                                    <th>Sil</th>
                                </tr>
                                </thead>
                                <tbody>@foreach($datalist as $rs)
                                <tr>
                                    <?php if($rs->user_id==Auth::User()->id)
                                    {}

                                    else {
                                        continue;
                                    }
                                    
                                    ?>
                                    <td>{{$rs->id}}</td>
                                    <td>{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category,$rs->category->title)}} </td>
                                    <td>{{$rs->title}}</td>
                                    <td>{{$rs->price}}</td>
                                    <td>@if($rs->image)
                                        <img src="{{Storage::url($rs->image)}}" height="50" alt="">
                                        @endif
                                    </td>
                                    <td>{{$rs->status}}</td>
                                    <td>{{$rs->durum}}</td>
                                    <td><a href="{{route('user_image_add',['product_id'=>$rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')"><img src="{{asset('assets/admin/images')}}/gallery.png" alt="" height="60"></a></td>
                                    <td><a href="{{route('user_products_edit',['id'=>$rs->id])}}">Düzenle</a></td>
                                    <td><a href="{{route('user_products_delete',['id'=>$rs->id])}}" onclick="return confirm('Delete ! Emin misin?')" >Sil</a></td>
                                </tr> @endforeach
                                </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            
                        </div>
                    </div>
                    <!-- Checkout End -->
        </div>
    </div>
</div>
<!-- Checkout End -->











@endsection