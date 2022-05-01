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
            <h1>Ayarları Düzenle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ayarları Düzenle</li>
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
              <h3 class="card-title">Ayarları Düzenle</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="{{route('admin_setting_update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input value="{{$data->id}}" type="hidden" id="inputName" name="id" class="form-control" required>

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
                            <label >Company</label>
                            <input value="{{$data->company}}"  type="text" id="inputName"  name="company" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label >Adres</label>
                            <textarea  name="address">{{$data->address}}</textarea>
                                         
                              </div>
                          <div class="form-group">
                            <label >Telefon</label>
                            <input value="{{$data->phone}}"  type="text" id="inputName" name="phone" class="form-control" required>
                        </div>
                      <div class="form-group">
                          <label >FAX</label>
                          <input value="{{$data->fax}}"  type="text" id="inputName" name="fax" class="form-control" required>
                      </div>
                    
                    <div class="form-group">
                      <label >Email</label>
                      <input value="{{$data->email}}"  type="text" id="inputName" name="email" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label >Smtpserver</label>
                        <input value="{{$data->smtpserver}}"  type="text" id="inputName" name="smtpserver" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label >Smtpemail</label>
                        <input value="{{$data->smtpemail}}"  type="text" id="inputName" name="smtpemail" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label >Smtppassword</label>
                        <input value="{{$data->smtppassword}}"  type="text" id="inputName" name="smtppassword" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label >Smtpport</label>
                        <input value="{{$data->smtpport}}"  type="number" id="inputName" name="smtpport" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label >Facebook</label>
                        <input value="{{$data->facebook}}"  type="text" id="inputName" name="facebook" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label >İnstagram</label>
                        <input value="{{$data->instagram}}"  type="text" id="inputName" name="instagram" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label >Twitter</label>
                        <input value="{{$data->twitter}}"  type="text" id="inputName" name="twitter" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label >Referans</label>
                        <textarea id="references" name="references">{{$data->references}}</textarea>    
                      </div>
                          <div class="form-group">
                            <label >Hakkımızda</label>
                            <textarea id="aboutus" name="aboutus">{{$data->aboutus}}</textarea>
                                     
                              </div>
                              <div class="form-group">
                                <label >İletişim</label>
                                <textarea id="contact" name="contact">{{$data->contact}}</textarea>
                                         
                                  </div>
                      <div class="form-group">
                        <label >Slug</label>
                        <input value="{{$data->slug}}"  type="text" id="inputName" name="slug" class="form-control" required>
                    </div>
                    <script>
                      $(document).ready(function() {
                            $('#references').summernote();
                            $('#aboutus').summernote();
                            $('#contact').summernote();
                      });
                     </script>   
                            <div class="form-group">
                              <label >Status</label>
        
                              <select id="inputStatus" class="form-control custom-select" name="status">
                                <option selected="selected">{{$data->status}}</option>

                                <option>False</option>
                                <option>True</option>
                               
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
