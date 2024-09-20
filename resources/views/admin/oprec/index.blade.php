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
      <h1>Open Recruitment</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
          <li class="breadcrumb-item">Halaman</li>
          <li class="breadcrumb-item active">Open Recruitment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Open Recruitment</h5>
                <div class="d-flex justify-content-between">
                    <form method="POST" action="{{ route('open-oprec', Auth::user()->oprec) }}" id="recruitmentForm">
                        @csrf
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="open_recruitment" {{ Auth::user()->oprec === 1 ? 'checked' : '' }} onchange="submitForm()">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Open Recruitment</label>
                        </div>
                    </form>

                    <!-- Tombol Export -->
                    <div>
                        <a href="{{ route('reset-oprec') }}" class="btn btn-outline-danger btn-sm me-5 mb-2 mt-2" onclick="return confirm('Yakin akan mereset data ? Data Oprec akan terhapus seluruhnya');">
                            <i class="ri-loop-right-line"></i> Reset Data
                        </a>
                        <a href="{{ route('oprec-export-excel') }}" class="btn btn-sm btn-success me-2 mb-2 mt-2">
                            <i class="ri-file-excel-line"></i> Export Excel
                        </a>
                        <a href="{{ route('oprec-export-pdf') }}" class="btn btn-sm btn-danger me-2 mb-2 mt-2">
                            <i class="ri-file-pdf-2-line"></i> Export PDF
                        </a>
                    </div>
                </div>

              <div id="oprecTable">
                <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Program Studi</th>
                    <th>No Handphone</th>
                    <th>No Handphone<br>Orang Tua</th>
                    <th>Status</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($oprec as $u)
                    <tr>
                        <td><img src="{{ asset('/storage/oprec/' . $u->foto) }}" class="img-fluid" alt="" style="width: 60px; height: 60px; border-radius: 50%;"></td>
                        @if ($u->jenis_kelamin === 'L')
                            <td>{{ $u->nama }} <i class="ri-men-line text-primary"></i> ( {{ $u->jenis_kelamin }} )</td>
                        @else
                            <td>{{ $u->nama }} <i class="ri-women-line" style="color: rgb(231, 79, 191);"></i> ( {{ $u->jenis_kelamin }} )</td>
                        @endif
                        <td>{{ $u->nim }}</td>
                        <td>{{ $u->prodi }}</td>
                        <td>{{ $u->nohp }}</td>
                        <td>{{ $u->nohp_orangtua }}</td>
                        @if ($u->status != 0)
                            <td><span class="badge rounded-pill text-bg-success">Selesai</span></td>
                        @else
                            <td><span class="badge rounded-pill text-bg-warning text-white">Pending</span></td>
                        @endif
                        <td>
                            <a href="{{ route('send-email', $u->id) }}" class="btn btn-sm btn-success text-white me-2 mb-2 mt-2"><i class="ri-mail-send-line"></i></a>
                            <a href="{{ route('oprec.show', $u->id) }}" class="btn btn-sm btn-info text-white me-2 mb-2 mt-2"><i class="ri-information-2-line"></i></a>
                            {{-- <a href="{{ route('oprec.edit', $u->id) }}" class="btn btn-sm btn-warning text-white me-2 mb-2 mt-2"><i class="ri-edit-box-line"></i></a> --}}
                            <form action="{{ route('oprec.destroy', $u->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                                <button href="{{ route('oprec.destroy', $u->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapusnya ?');"><i class="ri-delete-bin-2-line"></i></button>
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
      </div>
    </section>

  </main><!-- End #main -->
<script>
    function submitForm() {
            if (confirm('Yakin akan mengubah status pendaftaran ?')) {
                document.getElementById('recruitmentForm').submit();
            } else {
                // Kembalikan checkbox ke status sebelumnya jika konfirmasi dibatalkan
                var switchButton = document.getElementById('flexSwitchCheckDefault');
                switchButton.checked = !switchButton.checked;
            }
        }

    function toggleTable() {
            var switchButton = document.getElementById('flexSwitchCheckDefault');
            var table = $('#oprecTable');
            if (switchButton.checked) {
                table.show();
            } else {
                table.hide();
            }
        }

        // Initialize table visibility based on the initial state of the checkbox
        $(document).ready(function() {
            toggleTable();
        });
</script>
@include('admin.template.footer')
