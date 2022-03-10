@extends('layouts.header')
@section($active,'m-menu__item--active')
@section('title','SIMBKK | Data Pelamar')
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
          <h3 class="m-subheader__title ">Informasi Data Pelamar</h3>
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
                    Data Pelamar
                  </h3>
                </div>
              </div>
  
            </div>
            <div class="m-portlet__body table-responsive">
              <!--begin: Datatable -->
              <table id="table" class="display">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jurusan</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
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
    columns: 
    [
      { "data": null,"sortable": false, "searchable": false,
      render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      }  
      },
      {data: "datasiswa.name",
      "searchable": true,
      "sortable": false,
      render: function (id,type, full, meta) {
        return '<div class="user">'+id+'</div>';
      },
      },
      {data: "datasiswa.email",
      "searchable": false,
      "sortable": false,
      render: function (id,type, full, meta) {
        return '<div class="email">'+id+'</div>';
      },
      },
      {data: "datasiswa.short",
      "searchable": false,
      "sortable": false,
      render: function (id, full, type, meta) {
        return '<div class="jurusan">'+id+'</div>';
      },
      },
      {data: "status",
      "searchable": false,
      "sortable": false,
      render: function (id,type, full, meta) {
        return '<div class="status">'+id+'</div>';
      },
      },
      {data: "user_id",
      "searchable": false,
      "sortable": false,
      render: function (id, type, full, meta) {
        return '<div class="btn-group d-flex justify-content-center"><a href="/resume/'+id+'" data-toggle="tooltip" id="cv" data-id="'+id+'" data-original-title="cv" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a> <a href="javascript:void(0)" data-toggle="tooltip" id="active"  data-id="'+id+'" class="btn btn-success btn-sm mr-2"><i class="fa fa-check" style="color:white;"></i></a><a href="javascript:void(0)" data-toggle="tooltip" id="deactive"  data-id="'+id+'" class="btn btn-danger btn-sm"><i class="fa fa-times" style="color:white;"></i></a></div>';
      },
      },
    ],
});
$(document).on('click','#active',function(){
  swal({
  title: 'Apakah Anda yakin?',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Ya',
  cancelButtonText: 'Tidak'
}).then((result) => {
  if (result.value) {
      var id = $(this).data("id");
      $.ajaxSetup({ 
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }   
      })

      $.ajax({
        data: {"user_id": id},
        url: "/daftarlowongan/active/"+id,
        type: "POST",
        dataType: 'json',
        success: function (data) {
          table.draw();
          swal({
            title: 'Diterima!',
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

  $(document).on('click','#deactive',function(){
    swal({
  title: 'Apakah Anda yakin?',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Ya',
  cancelButtonText: 'Tidak'
}).then((result) => {
  if (result.value) {
    var id = $(this).data("id");
    $.ajaxSetup({ 
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }   
    })

    $.ajax({
      data: {"id": id},
      url: "/daftarlowongan/deactive/"+id,
      type: "POST",
      dataType: 'json',
      success: function (data) {
        table.draw();
        swal({
          title: 'Tidak Diterima!',
          type: 'error',
          showConfirmButton: false,
          timer: 1500,
        })
      },
      error: function (data) {
        console.log('Error:', data);
      }
    });
    }
  })
  });

  
</script>
@include('layouts.footer')
@endsection