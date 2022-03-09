@extends('layouts.header')
@section('daftarlowongan','m-menu__item--active')
@section('title','SIMBKK | Sudah Daftar')
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
        <h3 class="m-subheader__title ">Lowongan Saya</h3>
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
                  <th style="width:30px">No</th>
                  <th style="width:100px">Judul</th>
                  <th style="width:200px">Instansi</th>
                  <th style="width:100px">Status</th>
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
  <!-- end -->

  <!--End::Section-->
  </div>
</div>
</div>
<script type="text/javascript">

  var table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "json/daftarLowongan",
    "order": [[ 1, 'asc' ]],
    columns: [
    { "data": null,"sortable": false, 
    render: function (data, type, row, meta) {
      return meta.row + meta.settings._iDisplayStart + 1;
    }  
  },
  {data: "lowongan.judul",
  "searchable": false,
  "sortable": false,
  render: function (id, type, full, meta) {
    return '<div class="InfoLowongan">'+id+'</div>';
  },
},
  {data: "instansi.nama",
  "searchable": false,
  "sortable": false,
  render: function (id, type, full, meta) {
    return '<div class="instansi">'+id+'</div>';
  },
},
  {data: "status",
  "searchable": false,
  "sortable": false,
  render: function (id, type, full, meta) {
    return '<div class="status">'+id+'</div>';
  },
},
  {data: "id",
  "searchable": false,
  "sortable": false,
  render: function (id, type, full, meta) {
    return '<div class="btn-group d-flex justify-content-center"><a href="javascript:void(0)" data-toggle="tooltip" id="delete"  data-id="'+id+'" data-original-title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
  },
},
],
});
$(document).on('click','#delete',function(){
  swal({
  title: 'Apakah Anda yakin?',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Ya',
  cancelButtonText: 'Tidak'
}).then((result) => {
  if (result.value) {
  var id = $(this).data("id");
  var token = $("meta[name='csrf-token']").attr("content");
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
  $.ajax({
    type: "DELETE",
    url: "daftarlowongan/delete/"+id,
    data: {
      "id": id,
      "_token": token,
    },
    success: function (data) {
      table.draw();
      swal({
          title: 'Data Terhapus!',
          type: 'success',
          showConfirmButton: false,
          timer: 1500,
      })
    },
    error: function (data) {
      console.log('Error:', data);
    }
  });
  }
});
});
</script>
@include('layouts.footer')
@endsection