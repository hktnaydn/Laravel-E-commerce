@extends('layouts.home')
@section('title',"Sepetim")

@section('content')
    
   <!-- Page Header Start -->
   <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Sepetim</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Anasayfa</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Hesabım</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Ürünler</th>
                        <th>Fiyat</th>
                        <th>Durum</th>
                        <th>Beden</th>
                       
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                        $total=0;
                    @endphp
                    @foreach ($datalist as $rs)
                        
                        
                            <tr>
                                <td class="align-middle"><img src="{{Storage::url($rs->product->image)}}" alt="" style="width: 50px;"> {{$rs->product->title}}</td>
                                <td class="align-middle">{{$rs->product->price}}TL</td>
                                <td class="align-middle">{{$rs->product->durum}}</td>
                                <td class="align-middle">{{$rs->product->size}}</td>
                                                        </tr> 
                            @php
                                $total+=$rs->product->price;
                            @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
<!-- Cart End -->










@endsection