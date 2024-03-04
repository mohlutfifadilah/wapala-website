@section('title', 'Divisi')
@include('admin.template.header')
@include('admin.template.sidebar')
@if(session('success'))
<div id="alertt" class="alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 m-3" role="alert" style="z-index: 999;">
    <i class="bi bi-check-circle me-1"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Divisi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Divisi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Divisi</h5>
                <a href="{{ route('divisi.create') }}" class="btn btn-success btn-sm"><i class="bi bi-plus-lg"></i> Tambah</a>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Logo</th>
                    <th>Nama Divisi</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($divisi as $d)
                    <tr>
                        @if ($d->logo)
                            <td><img src="{{ asset('storage/logo-divisi/' . $d->logo ) }}" alt="" class="img-fluid" style="width: 150px; height: 150px;"></td>
                            @else
                            <td class="text-secondary">Belum ada logo</td>
                        @endif
                        <td>{{ $d->nama_divisi }}</td>
                        <td>
                            <a href="{{ route('divisi.edit', $d->id) }}" class="btn btn-sm btn-warning text-white me-2 mb-2 mt-2"><i class="ri-edit-box-line"></i></a>
                            <form action="{{ route('divisi.destroy', $d->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                                <button href="{{ route('divisi.destroy', $d->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapusnya ?');"><i class="ri-delete-bin-2-line"></i></button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
@include('admin.template.footer')
