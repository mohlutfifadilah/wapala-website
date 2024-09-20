@section('title', 'Open Recruitment')
@include('admin.template.header')
@include('admin.template.sidebar')

@if(session('success'))
<div id="alertt" class="alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 m-3" role="alert" style="z-index: 999;">
    <i class="bi bi-check-circle me-1"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div id="error-alert" class="alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0 m-3" role="alert">
    <i class="bi bi-exclamation-octagon me-1"></i>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Calon Anggota</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Open Recruitment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Diri</h5>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('/storage/oprec/' . $oprec->foto) }}" class="img-fluid" alt="" style="max-width: 300px; max-height: 400px;">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-sm-3">
                                <h5><b>Nama</b></h5>
                            </div>
                            <div class="col-sm-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-sm-8">
                                <p>{{ $oprec->nama }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5><b>Jenis Kelamin</b></h5>
                            </div>
                            <div class="col-sm-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-sm-8">
                                <p>{!! $oprec->jenis_kelamin == 'L' ? '<i class="ri-men-line text-primary"></i>' : '<i class="ri-women-line" style="color: rgb(231, 79, 191);"></i>' !!} {{ $oprec->jenis_kelamin }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5><b>Golongan Darah</b></h5>
                            </div>
                            <div class="col-sm-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-sm-8">
                                <p>{{ $oprec->golongan_darah }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5><b>Tempat Tanggal Lahir</b></h5>
                            </div>
                            <div class="col-sm-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-sm-8">
                                <p>{{ $oprec->tempatTglLahir }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5><b>NIM</b></h5>
                            </div>
                            <div class="col-sm-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-sm-8">
                                <p>{{ $oprec->nim }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5><b>Email</b></h5>
                            </div>
                            <div class="col-sm-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-sm-8">
                                <p>{{ $oprec->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5><b>Program Studi</b></h5>
                            </div>
                            <div class="col-sm-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-sm-8">
                                <p>{{ $oprec->prodi }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5><b>Agama</b></h5>
                            </div>
                            <div class="col-sm-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-sm-8">
                                <p>{{ $oprec->agama }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5><b>No Handphone</b></h5>
                            </div>
                            <div class="col-sm-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-sm-8">
                                <p>{{ $oprec->nohp }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5><b>Alamat Rumah</b></h5>
                            </div>
                            <div class="col-sm-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-sm-8">
                                <p>{{ $oprec->alamat_rumah }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5><b>Alamat Domisili</b></h5>
                            </div>
                            <div class="col-sm-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-sm-8">
                                <p>{{ $oprec->alamat_domisili }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <h5><b>Motivasi :</b></h5> <br> {{ $oprec->motivasi }}
                    </div>
                    <div class="col-md-4">
                        <h5><b>Pengalaman Organisasi :</b></h5> <br> {{ $oprec->pengalaman_organisasi }}
                    </div>
                    <div class="col-md-4">
                        <h5><b>Riwayat Penyakit :</b></h5> <br> {{ $oprec->riwayat_penyakit }}
                    </div>
                </div>
                <h5 class="card-title mt-3">Data Orang Tua</h5>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h5><b>Nama Orang Tua</b></h5>
                     </div>
                    <div class="col-sm-1">
                        <h5>:</h5>
                    </div>
                    <div class="col-sm-8">
                        <p>{{ $oprec->nama_orangtua }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <h5><b>No Handphone Orang Tua</b></h5>
                    </div>
                    <div class="col-sm-1">
                        <h5>:</h5>
                    </div>
                    <div class="col-sm-8">
                        <p>{{ $oprec->nohp_orangtua }}</p>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@include('admin.template.footer')
