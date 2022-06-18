<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bursa Kerja Khusus &mdash; SMK WIKRAMA BOGOR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="landing/fonts/icomoon/style.css">

  <link rel="stylesheet" href="landing/css/bootstrap.min.css">
  <link rel="stylesheet" href="landing/css/jquery-ui.css">
  <link rel="stylesheet" href="css/app.css">
  <!-- Vendor CSS Files -->
  <link href="vendor/vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="landing/css/owl.carousel.min.css">
  <link rel="stylesheet" href="landing/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="landing/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.css">
  <link rel="stylesheet" href="landing/css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="landing/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="landing/css/aos.css">
  <link href="landing/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="landing/css/style.css">
	<!-- Include the slider scripts -->
  {{-- <script type="text/javascript" src="landing/js/jquery.simpleslider.js"></script>
  <script type="text/javascript" src="landing/js/src/backstretch.js"></script>
  <script type="text/javascript" src="landing/js/src/custom.js"></script> --}}


</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
   <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
 
     <a href="{{url('/')}}" class="logo d-flex align-items-center" style="text-decoration:none">
       <img src="image/config/logo/wk.png" alt="">
       <span>@yield('title')</span>
     </a>
 
     <nav id="navbar" class="navbar">
       <ul>
         <li><a class="nav-link scrollto active" href="/">Beranda</a></li>
         <li><a class="nav-link scrollto" href="{{url('/form-full-sekolah')}}">Informasi Sekolah</a></li>
         <li><a class="nav-link scrollto" href="{{url('/form-full-lowongan')}}">Informasi Lowongan Kerja</a></li>
         <li><a class="nav-link scrollto" href="#pesan">Pesan</a></li>
       </ul>
       <i class="bi bi-list mobile-nav-toggle"></i>
     </nav>
     <!-- .navbar -->
   </div>
 </header>
 <!-- End Header -->
  {{-- Body --}}
  @yield('content')
  {{-- End Body --}}
  <footer class="footer">
      <div class="container">
          <div class="row">
            <div class="col-md-3">
              <a href="https://smkwikrama.sch.id/" class="logo" style="text-decoration:none">
                <img src="image/config/logo/wk.png" alt="">
              </a>
              <br>
              <div class="row">
                  <div class="col-md-10">
                    <p>Jl. Raya Wangun Kelurahan Sindangsari
                    <br> Bogor Timur 16720</p>
                  </div>
              </div>
              <ul class="nav">
                  <li class="nav-item"><a href="https://www.facebook.com/smkwikrama/" class="nav-link pl-0"><i class="fa-brands fa-facebook fa-2xl"></i></a></li>
                  <li class="nav-item"><a href="https://twitter.com/smkwikrama" class="nav-link"><i class="fa-brands fa-twitter fa-2xl"></i></a></li>
                  <li class="nav-item"><a href="https://www.youtube.com/channel/UCyhEUzlXbXet57qFnDfdWuw" class="nav-link"><i class="fa-brands fa-youtube fa-2xl"></i></a></li>
                  <li class="nav-item"><a href="https://www.instagram.com/smkwikrama/" class="nav-link"><i class="fa-brands fa-instagram fa-2xl"></i></a></li>
              </ul>
              <br>
            </div>
              <div class="col-md-5">
                <h4>Bursa Kerja Khusus</h4>
                <h5>SMK WIKRAMA BOGOR</h5>
                <div class="row">
                    <div class="col-md-12">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa quae animi, laboriosam voluptatibus neque ipsum quidem quas eius assumenda quam magnam, eos dolorem architecto sequi esse omnis veniam tenetur ad!</p>
                    </div>
                </div>
                  <br>
              </div>
              @auth
              <div class="col-md-4">
                <h5>Kirim Pesan</h5>
                  <div class="row">
                    <div class="col-md-12">
                      <form id="formpesan">
                        <fieldset class="form-group">
                            <textarea class="form-control" name="pesan" id="pesan" rows="4" placeholder="Pesan"></textarea>
                        </fieldset>
                        <fieldset class="form-group text-xs-right">
                         <center> <button type="button" id="send" class="btn btn-secondary-outline btn-lg">Send</button></center> 
                        </fieldset>
                      </form>
                    </div>
                  </div>
                  <br>
              </div>   
              @endauth
          </div>
        </div>
        <p class="mt-2" style="text-align: center;">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
  </footer>

  
    <!-- .site-wrap -->
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>
    {{-- <script type="text/javascript" src="landing/js/transit.js"></script>
    <script type="text/javascript" src="landing/js/touchSwipe.js"></script>
    <script type="text/javascript" src="landing/js/simpleSlider.js"></script> --}}
    <script src="landing/js/jquery-3.3.1.min.js"></script>
    <script src="landing/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="landing/js/jquery-ui.js"></script>
    <script src="landing/js/popper.min.js"></script>
    <script src="landing/js/bootstrap.min.js"></script>
    <script src="landing/js/owl.carousel.min.js"></script>
    <script src="landing/js/jquery.stellar.min.js"></script>
    <script src="landing/js/jquery.countdown.min.js"></script>
    <script src="landing/js/bootstrap-datepicker.min.js"></script>
    <script src="landing/js/jquery.easing.1.3.js"></script>
    <script src="landing/js/aos.js"></script>
    <script src="landing/js/jquery.fancybox.min.js"></script>
    <script src="landing/js/jquery.sticky.js"></script>
    <script src="landing/js/jquery.mb.YTPlayer.min.js"></script>
    <script src="landing/js/main.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- <script src="https://unpkg.com/simpleslider-js@1.9.0/dist/simpleSlider.min.js"></script>
    <script src="https://unpkg.com/simpleslider-js@1.9.0/dist/simpleSlider.min.css"></script> --}}
  <script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})

//kirim pesan
$("#send").click(function (e) {
    $.ajaxSetup({ 
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }   
    })
    e.preventDefault();

    $.ajax({
      data: $('#formpesan').serialize(),
      url: "{{ route('pesan.store') }}",
      type: "POST",
      dataType: 'json',
      success: function (data) {
        $('#formpesan').trigger("reset");
        swal({
          title: "Berhasil!",
          text: "Pesan Terikirim!",
          icon: "success",
          button: false,
          timer: 1500
        });
      },
      error: function (data) {
        console.log('Error:', data);
        swal({
          title: "Gagal!",
          text: "Pesan Tidak Terkirim!",
          icon: "error",
          button: false,
          timer: 1500
        });
      }
    });
  });


  </script>
  </body>
  
  </html>
