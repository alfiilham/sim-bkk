@extends('layouts.header')
@section('infolowongan','m-menu__item--active')
@section('title','SIMBKK | Info Lowongan')
@section('content')
<style>
.display{
    table-layout:fixed;
}

.isi{
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">
  <div class="m-subheader ">
    <div class="d-flex align-items-center">
      <div class="mr-auto">
        <h3 class="m-subheader__title ">Info Lowongan</h3>
      </div>
    </div>
  </div>
  <!-- Begin Body -->
  <!--Begin::Section-->
  <br>
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="m-portlet m-portlet--mobile ">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                  Info Lowongan
                </h3>
              </div>
            </div>

          </div>
          <div class="m-portlet__body table-responsive">
            <!--begin: Datatable -->
            <table id="table" class="display">
              <thead>
                <tr>
                  <th style="width:10px">No</th>
                  <th style="width:50px">Judul</th>
                  <th style="width:100px">Isi</th>
                  <th style="width:100px">Foto</th>
                  <th style="width:100px">Jurusan</th>
                  <th style="width:100px">Instansi</th>
                  <th style="width:140px;text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>

            <!--end: Datatable -->
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- modaldetail -->
<div class="modal fade" id="modal-alumni-detail"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="max-width: 50% !important;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-alumniTitle">Detail Lowongan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">

            <div class="col-sm-12 mb-4">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Lowongan</h4>

                  <table class="table table-borderless">
                    <tr>
                      <td width="200px">Judul</td>
                      <td>:</td>
                      <td id="d_judul"></td>
                    </tr>
                    <tr>
                      <td>instansi</td>
                      <td>:</td>
                      <td id="d_instansi"></td>
                    </tr>
                    <tr>
                      <td>isi</td>
                      <td>:</td>
                      <td id="d_isi"></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn {{$preset->buttonClass}}" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end -->
    <!--End::Section-->
  </div>
</div>
</div>
<script type="text/javascript">

  var table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "json/infolowongan",
    "order": [[ 1, 'asc' ]],
    columns: [
    { "data": null,"sortable": false, 
    render: function (data, type, row, meta) {
      return meta.row + meta.settings._iDisplayStart + 1;
    }  
  },
  {data: 'judul'},
  {data: "isi",
  "searchable": false,
  "sortable": false,
  render: function (id, type, full, meta) {
    return '<div class="isi">'+id+'</div>';
  },
},
  {data: "foto",
  "searchable": false,
  "sortable": false,
  render: function (id, type, full, meta) {
    return '<img src="/image/infolowongan/'+id+'" alt="'+id+'" height="100" width="100">';
  },
},
  {data: "jurusan",
  "searchable": false,
  "sortable": false,
  render: function (id, type, full, meta) {
    return '<div class="jurusan">'+id+'</div>';
  },
},
  {data:"instansi.nama",
  "searchable": false,
  "sortable": false,
  render: function (id, type, full, meta) {
    return '<div class="instansi">'+id+'</div>';
  },
},
  {data: "id",
  instansi: "instansi.id",
  "searchable": false                                                                                                                                                                                                                                                                             ,
  "sortable": false,
  render: function (id, type, full, meta, instansi) {
    return '<div class="btn-group d-flex justify-content-center"><a href="javascript:void(0)" data-toggle="tooltip" id="detail" data-id="'+id+'" data-original-title="Detail" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a><button id="daftar" class="btn btn-warning btn-sm" data-id="'+id+'"><i class="fa fa-briefcase" style="color:white;"></i></button>';
  },
},
],
});

  $(document).on('click','#daftar',function(){
      swal({
    title: 'Apakah Anda yakin Untuk mendaftar?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Ya',
    cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.value) {
        var id = $(this).data("id");
        $.get('infoLowongan/detail/' + id , function (detail) {
          var instansi = detail.data[0].instansi.id;
        
        $.ajaxSetup({ 
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }   
        })

        $.ajax({
          data: {"idInstansi": instansi, "id": id},
          url: "/daftarInfoLowongan/"+id,
          type: "POST",
          dataType: 'json',
          success: function (data) {
            table.draw();
            swal({
              title: 'Berhasil mendaftar silahkan tunggu info selanjutnya!',
              type: 'success',
              showConfirmButton: false,
              timer: 1500,
            })
          },
          error: function (data) {
            swal({
              title: 'Anda Sudah Daftar',
              type: 'warning',
              showConfirmButton: false,
              timer: 1500,
            })
          }
        });
      })
    }});
});
</script>
<script>
$(document).on('click','#detail',function(){
    var id = $(this).data("id");
    $.get('infoLowongan/detail/' + id , function (detail) {
      $('#d_judul').html(detail.data[0].judul);
      $('#d_isi').html(detail.data[0].isi);
      $('#d_instansi').html(detail.data[0].instansi.nama);
      $('#modal-alumni-detail').modal('show');
    })
  });
</script>
@include('layouts.footer')
@endsection
