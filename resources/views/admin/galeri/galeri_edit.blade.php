@section('title', 'Edit Galeri')
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
      <h1>Galeri</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
          <li class="breadcrumb-item">Halaman</li>
          <li class="breadcrumb-item active">Edit Galeri</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Data Galeri</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="{{ route('galeri.update', $galeri->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @php
                    $id_kategori = \App\Models\Kategori::find($galeri->id_kategori);
                @endphp
                <div class="col-md-12">
                    <label for="floatingName" class="ms-2 mb-2">Upload Foto</label>
                    <input type="file" class="form-control" id="floatingName" placeholder="Upload Foto" name="foto" value="">
                    <small class="text-danger mt-3 mb-1">* Ukuran 150x150 px | Format .jpg/.png | Max. 2 mb</small>
                </div>
                <div class="col-md-12">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingKategori" aria-label="State" name="kategori" required>
                      <option selected disabled value="{{ $id_kategori->nama_kategori }}">{{ $id_kategori->nama_kategori }}</option>
                      @foreach ($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                      @endforeach
                    </select>
                    <label for="floatingKategori">Kategori</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating mb-3">
                      <textarea class="form-control" placeholder="Masukkan deskripsi disini" id="floatingTextarea" style="height: 100px;" name="deskripsi">{{ $galeri->deskripsi }}</textarea>
                      <label for="floatingTextarea">Deskripsi</label>
                    </div>
                </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-warning text-white">Edit</button>
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
