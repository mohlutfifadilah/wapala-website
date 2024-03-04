@section('title', 'Edit Program Studi')
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
      <h1>Program Studi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Edit Program Studi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Data Program Studi</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="{{ route('prodi.update', $prodi->id) }} " method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Nama Program Studi" name="prodi" value="{{ $prodi->nama_prodi }}" required>
                    <label for="floatingName">Nama Program Studi</label>
                    <small class="text-danger mt-3">* Contoh : S1 Ilmu Komunikasi</small>
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
