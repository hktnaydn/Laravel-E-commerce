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
            <h1>Ürün ekle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ürün Ekle</li>
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
              <h3 class="card-title">Ürün Ekle</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action="{{route('admin_image_store',['product_id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
             
                            
                            <div class="form-group">
                                <label>Başlık</label>
                                <input type="text" id="title" name="title" class="form-control" >
                            </div>
                          
                          
                            <div class="form-group">
                              <label >Resim</label>
                              <input type="file" id="inputName" name="image" class="form-control">
                          </div>
                          
                          <div class="col-12">
                        
                            <button type="submit" class="btn btn-success float-right">Ekle </button>
                        </div> 
           
            </div>
            <!-- /.card-body -->
        </form>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>ID</th>
              <th>Başlık</th>
              <th>Resim</th>
              <th>Eylem</th>
            </tr>
            </thead>
            <tbody>@foreach($images as $rs)
            <tr>
              <td>{{$rs->id}}</td>
              <td>{{$rs->title}}</td>
              <td>@if($rs->image)
                  <img src="{{Storage::url($rs->image)}}" height="60" alt="">
                  @endif
              </td>
              <td><a href="{{route('admin_image_delete',['id'=>$rs->id,'product_id'=>$data->id])}}" onclick="return confirm('Delete ! Emin misin?')" >Sil</a></td>
            </tr> @endforeach
            </tbody>
          </table>




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
