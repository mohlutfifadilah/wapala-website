@section('title', 'Tambah Angkatan')
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
      <h1>Angkatan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Tambah Angkatan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Data Angkatan</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="{{ route('angkatan.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <label for="floatingName" class="ms-2 mb-2">Upload Foto</label>
                    <input type="file" class="form-control" id="floatingName" placeholder="Upload Foto" name="foto" value="">
                    <small class="text-danger mt-3 mb-1">* Ukuran 150x150 px | Format .jpg/.png | Max. 2 mb</small>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingNama" placeholder="Nama Angkatan" name="angkatan" value="" required>
                    <label for="floatingNama">Nama Angkatan</label>
                  </div>
                </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-success">Tambah</button>
                  {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>

        </div>
      </div>
    </section>

</main><!-- End #main -->
@include('admin.template.footer')
