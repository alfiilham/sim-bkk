<div class="container-fluid">
    <br>
    <h3>Selamat Datang {{auth::user()->name}}</h3>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card border-success mb-3">
                <div class="card-header bg-transparent border-success">Jumlah lowongan</div>
                <div class="card-body text-success">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="card-text">{{$jmlhlowongan}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success mb-3">
                <div class="card-header bg-transparent border-success">Jumlah Pelamar</div>
                <div class="card-body text-success">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="card-text">{{$jmlhpelamar}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success mb-3">
                <div class="card-header bg-transparent border-success">Jumlah Pelamar Diterima</div>
                <div class="card-body text-success">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="card-text">{{$jmlhpelamarditerima}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success mb-3">
                <div class="card-header bg-transparent border-success">Data Instansi</div>
                <div class="card-body text-success">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Nama Instansi</h5>
                            <p class="card-text">{{auth::user()->name}}</p>
                            <h5 class="card-title">Alamat</h5>
                            <p class="card-text">{{auth::user()->dataInstansi->alamat}}</p>
                            <h5 class="card-title">Kota</h5>
                            <p class="card-text">{{auth::user()->dataInstansi->kota}}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">Telepon</h5>
                            <p class="card-text">{{auth::user()->dataInstansi->telp}}</p>
                            <h5 class="card-title">Email</h5>
                            <p class="card-text">{{auth::user()->email}} <i>
                            @if(auth::user()->email_verified_at != null)
                            <b> Verified </b>
                            @else
                            <b class="text-danger"> Not Verified </b>
                            @endif
                            </i></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-success">Footer</div>
            </div>
        </div> 
    </div>
</div>
