@extends('layouts.admin')
@section('javascript')
<!-- include summernote css/js -->
 <!-- include libraries(jQuery, bootstrap) -->

 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 
 <!-- include summernote css/js -->
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

@endsection
@section('admincontent')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ürün Düzenle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ürün Düzenle</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Ürün Düzenle</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="{{route('admin_products_update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                            <div class="form-group">
                                <label>Kategori</label><br>
                                <select id="inputStatus" class="form-control custom-select" name="category_id">
                                  @foreach($datalist as $rs)
                                  <option value="{{$rs->id}}" @if($rs->id==$data->category_id) selected="selected" @endif)>{{$rs->title}}</option>
                                  @endforeach   
                                 
                                  </select>
                            </div>
                            <div class="form-group">
                                <label>Başlık</label>
                                <input value="{{$data->title}}" type="text" id="inputName" name="title" class="form-control" required>
                            </div>
                          
                            <div class="form-group">
                                <label >Anahtar Kelimeler</label>
                                <input value="{{$data->keywords}}"  type="text" id="inputName" name="keywords" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label >Açıklama</label>
                              <input value="{{$data->description}}"  type="text" id="inputName" name="description" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label >Resim</label>
                            <input value="{{$data->image}}"  type="file" id="inputName" name="image" class="form-control">
                            @if($data->image)
                        <img src="{{Storage::url($data->image)}}" height="250" alt="">
                        @endif
                        </div>
                        <div class="form-group">
                            <label >Fiyat</label>
                            <input value="{{$data->price}}"  type="number" id="inputName" value="0" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label >Detay</label>
                            <textarea id="summernote" name="detail">{{$data->detail}}</textarea>
                          <script>
                            $(document).ready(function() {
                                  $('#summernote').summernote();
                            });
                           </script>                      
                              </div>
                          <div class="form-group">
                            <label >Slug</label>
                            <input value="{{$data->slug}}"  type="text" id="inputName" name="slug" class="form-control" required>
                        </div>
                            <div class="form-group">
                              <label >Status</label>
        
                              <select id="inputStatus" class="form-control custom-select" name="status">
                                <option selected="selected">{{$data->status}}</option>

                                <option>False</option>
                                <option>True</option>
                               
                                </select>
                          </div>
                          <div class="form-group">
                            <label >Durum</label>
      
                            <select id="inputStatus" class="form-control custom-select" name="durum">
                                <option selected="selected">{{$data->durum}}</option>
                                <option>Yeni</option>
                              <option>Yeni gibi</option>
                              <option>Kullanılmış</option>
                              <option>Eski</option>
                             
                              </select>
                        </div>
                            <div class="col-12">
                        
                                <button type="submit" class="btn btn-success float-right">Düzenle </button>
                            </div>
                           
            </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
       
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
  @endsection
