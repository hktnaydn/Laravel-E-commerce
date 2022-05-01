@extends('layouts.admin')
@section('admincontent')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori ekle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kategori Ekle</li>
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
              <h3 class="card-title">Kategori Ekle</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="{{route('admin_category_create')}}" method="post" enctype="multipart/form-data">
                @csrf
                            <div class="form-group">
                                <label>Parent</label><br>
                                <select id="inputStatus" class="form-control custom-select" name="parent_id">
                                  <option value="0">Ana Kategori</option>
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
                            <label >Slug</label>
                            <input type="text" id="inputName" name="slug" class="form-control" required>
                        </div>
                            <div class="form-group">
                              <label >Status</label>
        
                              <select id="inputStatus" class="form-control custom-select" name="status">
                                <option>False</option>
                                <option>True</option>
                               
                                </select>
                          </div>
                            <div class="col-12">
                        
                                <button type="submit" class="btn btn-success float-right">Ekle </button>
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
