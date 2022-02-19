@extends('layouts.header')
@section('dataInstansi','m-menu__item--active')
@section('title','SIMBKK | Edit Data')
@section('content')
<div class="container">
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Update Sukses</strong> data anda berhasil di update
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        @endif
{{-- <a href=" user/{{auth::user()->data->id}}/edit/" class="btn {{$preset->buttonClass}} mb-4">Edit Data Belum Lengkap</a>   --}}
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <a href="#" style="font-size : medium"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Data Instansi
        </a>
      </h2>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      {{-- Perulangan --}}
      <div class="card-body">
          <div class="row ">
              <div class="col-xl-12 ">
                <div class="card mb-3">
                  <div class="row no-gutters">
                    {{-- <div class="col-xl-4">
                            <div class="card-image">
                              <img src="images-assets/alumni.jpg " style="width:100%;margin-right:300px;height:20%;" class="card-img responsive" alt="alumni-foto-sistem-informasi-Bursa-kerja-Khusus">
                            </div>
                    </div> --}}
                    <div class="col-xl-7 " style="margin:10px;" >
                      <form action="{{route('profile.update')}}" method="post">
                        @csrf
                        <input type="hidden" name="method" value="put">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Nama Instansi</label>
                                <input placeholder="Nama" name="nama" class="form-control" value="{{auth::user()->name}}">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{auth::user()->dataInstansi->alamat}}</textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Kota</label>
                                <input class="form-control" name="kota"  placeholder="Kota" value="{{auth::user()->dataInstansi->kota}}">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Email</label>
                                <input placeholder="Email" name="email" class="form-control" value="{{auth::user()->email}}">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Telepon</label>
                                <input placeholder="telepon" name="telp" class="form-control" value="{{auth::user()->dataInstansi->telp}}">
                            </div>
                          </div>
                        </div>
                        <button class="btn {{$preset->buttonClass}}">Update</button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#open-modal").click(function(){
    $('#forminstansi').trigger("reset");
    $('#modal-instansi').modal('show');
  });
  </script>
@include('layouts.footer')
@endsection
