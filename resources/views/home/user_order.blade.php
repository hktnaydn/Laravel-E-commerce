@extends('layouts.home')
@section('title',"Ürünlerim")

@section('content')
    
 <!-- Page Header Start -->
 <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold mb-3">Siparişlerim</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Hesabım</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Siparişlerim</p>
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
                                    <th>İsim</th>
                                    <th>Email</th>
                                    <th>Telefon</th>
                                    <th>Adress</th>
                                    <th>Toplam</th>
                                    <th>Tarih</th>
                                    <th>Statü</th>
                                    <th>Düzenle</th>
                                   
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
                                    <td>{{$rs->name}}</td>
                                    <td>{{$rs->email}}</td>
                                    <td>{{$rs->phone}}</td>
                                    <td>{{$rs->address}}</td>
                                    <td>{{$rs->total}}TL</td>
                                    <td>{{$rs->created_at}}</td>
                                    <td>{{$rs->status}}</td>
                                    <td><a href="{{route('user_order_show',['id'=>$rs->id])}}">Sipariş Detay</a></td>
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