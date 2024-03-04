@section('title', 'Edit Status Keanggotaan')
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
      <h1>Status Keanggotaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Edit Status Keanggotaan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Data Status Keanggotaan</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="{{ route('status.update', $status->id) }} " method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Nama Status Keanggotaan" name="status" value="{{ $status->nama_status }}" required>
                    <label for="floatingName">Nama Status Keanggotaan</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingKepanjangan" placeholder="Kepanjangan" name="kepanjangan" value="{{ $status->kepanjangan }}" required>
                    <label for="floatingKepanjangan">Kepanjangan</label>
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
