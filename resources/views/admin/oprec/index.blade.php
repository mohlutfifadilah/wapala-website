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
                <h5 class="card-title">Data Open Recruitment</h5>
                {{-- <a href="{{ route('user.create') }}" class="btn btn-success btn-sm"><i class="bi bi-plus-lg"></i> Tambah</a> --}}
                <form method="POST" action="{{ route('open-oprec', Auth::user()->oprec) }}" id="recruitmentForm">
                    @csrf
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="open_recruitment" {{ Auth::user()->oprec === 1 ? 'checked' : '' }} onchange="submitForm()">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Open Recruitment</label>
                    </div>
                </form>
              <div id="oprecTable">
                <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Prodi</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($oprec as $u)
                    <tr>
                        <td>{{ $u->nama }}</td>
                        @if ($u->jenis_kelamin === 'L')
                        <td><i class="bx bx-male-sign"></i> ( {{ $u->jenis_kelamin }} )</td>
                        @else
                        <td><i class="bx bx-female-sign"></i> ( {{ $u->jenis_kelamin }} )</td>
                        @endif
                        <td>{{ $u->prodi }} - {{ $u->tahun }}</td>
                        <td>
                            <a href="{{ route('oprec.edit', $u->id) }}" class="btn btn-sm btn-warning text-white me-2 mb-2 mt-2"><i class="ri-edit-box-line"></i></a>
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
