@extends('layouts.home')
@section('title',"Ürünlerim")
@section('headerjs')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection
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

            <form action="{{route('user_products_store')}}" method="post" enctype="multipart/form-data">
                @csrf
                            <div class="form-group">
                                <label>Kategori</label><br>
                                <select id="inputStatus" class="form-control custom-select" name="category_id">
                                  @foreach($datalist as $rs)
                                  <option value="{{$rs->id}}">{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title)}}</option>
                                  @endforeach   
                                 
                                  </select>
                            </div>
                            <div class="form-group">
                                <label>Başlık</label>
                                <input type="text" id="inputName" name="title" class="form-control" required>
                            </div>
                          
                            <div class="form-group">
                                <label >Anahtar Kelimeler</label>
                                <input type="text" id="inputName" name="keywords" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label >Açıklama</label>
                              <input type="text" id="inputName" name="description" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label >Resim</label>
                            <input type="file" id="inputName" name="image" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Beden</label>
                            <input type="text" id="inputName" name="size" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label >Fiyat</label>
                            <input type="number" id="inputName" value="0" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label >Detay</label>
                            <textarea id="detail" name="detail"></textarea>
                            <script>
                                ClassicEditor
                                        .create( document.querySelector( '#detail' ) )
                                        .then( editor => {
                                                console.log( editor );
                                        } )
                                        .catch( error => {
                                                console.error( error );
                                        } );
                        </script>                      
                              </div>
                          <div class="form-group">
                            <label >Slug</label>
                            <input type="text" id="inputName" name="slug" class="form-control" required>
                        </div>
                          <div class="form-group">
                            <label >Durum</label>
      
                            <select id="inputStatus" class="form-control custom-select" name="durum">
                              <option>Yeni</option>
                              <option>Yeni gibi</option>
                              <option>Kullanılmış</option>
                              <option>Eski</option>
                             
                              </select>
                        </div>
                            <div class="col-12">
                        
                                <button type="submit" class="btn btn-success float-right">Ekle </button>
                            </div>
                           
            </form>
        </div>
    </div>
</div>
<!-- Checkout End -->











@endsection