@extends('layouts.landing')
@section('title','SMK WIKRAMA BOGOR')
@section('content')
<style>
.isi{
  display: -webkit-box;
  -webkit-line-clamp: 6;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}
@media (min-width: 768px) {
  /* show 3 items */
  .carousel-inner .active,
  .carousel-inner .active + .carousel-item,
  .carousel-inner .active + .carousel-item + .carousel-item {
    display: block;
  }

  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item,
  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item {
    transition: none;
  }

  .carousel-inner .carousel-item-next,
  .carousel-inner .carousel-item-prev {
    position: relative;
    transform: translate3d(0, 0, 0);
  }

  .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item {
    position: absolute;
    top: 0;
    right: -33.3333%;
    z-index: -1;
    display: block;
    visibility: visible;
  }

  /* left or forward direction */
  .active.carousel-item-left + .carousel-item-next.carousel-item-left,
  .carousel-item-next.carousel-item-left + .carousel-item,
  .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item,
  .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item {
    position: relative;
    transform: translate3d(-100%, 0, 0);
    visibility: visible;
  }

  /* farthest right hidden item must be abso position for animations */
  .carousel-inner .carousel-item-prev.carousel-item-right {
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    display: block;
    visibility: visible;
  }

  /* right or prev direction */
  .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
  .carousel-item-prev.carousel-item-right + .carousel-item,
  .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item,
  .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item {
    position: relative;
    transform: translate3d(100%, 0, 0);
    visibility: visible;
    display: block;
    visibility: visible;
  }
}

</style>
 <!-- ======= Hero Section ======= -->
 <section id="hero" class="hero d-flex align-items-center">
 
   <div class="container">
     <div class="row">
       <div class="col-lg-6 d-flex flex-column justify-content-center">
         <h1 data-aos="fade-up">Sistem Informasi Bursa Kerja Khusus</h1>
         <h2 data-aos="fade-up" data-aos-delay="400">Platform pendataan karier siswa/i alumni SMK Wikrama Bogor</h2>
         <div data-aos="fade-up" data-aos-delay="600">
           <div class="text-center text-lg-start">
             @guest
             <a href="{{route('login')}}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center" style="text-decoration:none">
               <span>Login</span>
               <i class="bi bi-arrow-right"></i>
             </a>
             @else
             <a href="{{route('home')}}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center" style="text-decoration:none">
               <span>Dashboard</span>
               <i class="bi bi-arrow-right"></i>
             </a>
             @endguest
           </div>
         </div>
       </div>
       <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
         <img src="image/config/hero-bg.png" class="img-fluid" alt="">
       </div>
     </div>
   </div>
 
 </section><!-- End Hero -->
</div>
<!-- Jumbotron -->
  {{-- Informasi Loker --}}
    <div class="row">
      <div class="col-md-12 mt-6">
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-12">
                  <div class="section-title">
                    <h2>Informasi Lowongan Kerja</h2>
                  </div>
                </div>
              </div>
                <div class="row">
                  @forelse($lowongan as $data)
                  <div class="col-sm-2 align-center">
                    <div class="card">
                      <img class="card-img-top" src='image/InfoLowongan/{{$data->foto}}' alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title text-decoration"><a href="/form-single-lowongan;{{$data->id}}">{{$data->judul}}</a></h5>
                        <p class="isi"> {!!$data->isi!!}</p>
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{substr($data->updated_at,0,10)}}</li>
                      </ul>
                    </div>
                  </div>
                  @empty
                  <center><i class="far fa-sad-tear"></i><h1>Belum ada Info Sekolah</h1></center>
                  @endforelse
                  {{-- More --}}
                  <p>
                    <a href="{{url('/form-full-lowongan')}}" class="more">Lainnya<span class="icon-keyboard_arrow_right"></span></a>
                  </p>
                  {{-- End More --}}
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END section -->
  </div>
  {{-- End Loker --}}
  {{-- Informasi sekolah --}}
  <div class="row">
      <div class="col-md-12 mt-4">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-8">
                          <div class="row">
                            <div class="col-12">
                              <div class="section-title">
                                <h2>Informasi Sekolah</h2>
                              </div>
                            </div>
                          </div>
                            <div class="col-md-12">
                              @forelse($sekolah as $data)
                              <div class="card" style="width: 19rem;">
                                    <img class="card-img-top" src='image/InfoSekolah/{{$data->foto}}' alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title"><a href="/form-single-sekolah;{{$data->id}}">{{$data->judul}}</a></h5>
                                      <p class="isi"> {!!$data->isi!!}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item">{{substr($data->updated_at,0,10)}}</li>
                                    </ul>
                                  </div>
                              @empty
    
                              <center><i class="far fa-sad-tear"></i><h1>Belum ada Info Lowongan</h1></center>
                              @endforelse

                              {{-- More --}}
                              <p>
                                    <a href="{{url('/form-full-sekolah')}}" class="more" style="text-decoration:none; color:#0C446C">Lainnya<span class="icon-keyboard_arrow_right"></span></a>
                                  </p>
                              {{-- End More --}}
                            </div>
                          </div>
                        </div>
                      </div>
                  
                      <!-- END section -->
              </div>
      </div>
  {{-- End Informasi Sekolah --}}
  <!-- carrousel of message -->
    <div class="container mt-4">
      <div class="section-title" data-spy="scroll" data-target="#pesan" id="pesan" data-offset="0" >
          <h2>Pesan</h2>
      </div>
      <div class="container-fluid">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner row w-100 mx-auto">
    @if($pesan->count() >= 1)
    <div class="carousel-item col-md-4 active">
        <div class="card">
          <img class="card-img-top img-fluid" src="{{asset('image/profiles/'.$pesan->last()->foto)}}" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title"> {{$pesan->last()->name}}</h4>
            <p class="card-text">{{$pesan->last()->pesan}}</p>
            <p class="card-text"><small class="text-muted">{{$pesan->last()->pesan}}</small></p>
          </div>
        </div>
      </div>
      @endif
    @forelse($pesan as $p)
      <div class="carousel-item col-md-4 ">
        <div class="card">
        <img class="card-img-top img-fluid" src="{{asset('image/profiles/'.$p->foto)}}" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title"> {{$p->name}}</h4>
            <p class="card-text">{{$p->pesan}}</p>
            <p class="card-text"><small class="text-muted">{{$p->jurusan}}</small></p>
          </div>
        </div>
      </div>
      @empty
      <center><i class="far fa-sad-tear"></i><h1>Belum ada Pesan</h1></center>
      @endforelse
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <br>
  </div>
</div>
    </div>
    <script>
    $(document).ready(function() {
  $("#myCarousel").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $(".carousel-item")
            .eq(i)
            .appendTo(".carousel-inner");
        } else {
          $(".carousel-item")
            .eq(0)
            .appendTo($(this).find(".carousel-inner"));
        }
      }
    }
  });
});

    </script>
  {{-- End carrousel Message --}}

@endsection