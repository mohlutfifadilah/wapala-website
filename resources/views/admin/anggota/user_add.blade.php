@section('title', 'Tambah Anggota')
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
      <h1>Anggota</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Tambah Anggota</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Data Anggota</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="{{ route('user.store') }} " method="POST">
                @csrf
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Nama Lengkap" name="nama" value="{{ old('nama') }}" required>
                    <label for="floatingName">Nama Lengkap</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingProdi" aria-label="State" name="prodi" required>
                      <option selected disabled>Masukkan Prodi</option>
                      @foreach ($prodi as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_prodi }}</option>
                      @endforeach
                    </select>
                    <label for="floatingProdi">Program Studi</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" id="floatingTahun" aria-label="State" name="tahun" required>
                      <option selected disabled>Masukkan Tahun</option>
                        <?php
                            // Mendapatkan tahun saat ini
                            $currentYear = date("Y");

                            // Menentukan tahun mulai (misalnya 25 tahun terakhir)
                            $startYear = $currentYear - 25;

                            // Loop untuk menghasilkan daftar tahun
                            for ($year = $currentYear; $year >= $startYear; $year--) {
                                echo '<option value="' . $year . '">' . $year . '</option>';
                            }
                        ?>
                    </select>
                    <label for="floatingTahun">Tahun</label>
                    <small class="text-danger ms-2">* Tahun masuk kuliah</small>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <div class="form-check mx-auto">
                                    <input class="form-check-input" type="radio" name="jk" id="gridRadios1" value="L" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Laki-Laki
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" id="gridRadios2" value="P">
                                    <label class="form-check-label" for="gridRadios2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingnia" placeholder="Password" value="" name="nia" required>
                    <label for="floatingnia">NIA</label>
                    <small class="text-danger ms-2">* NIA:WPL.**.***.****</small>
                    <small class="float-end me-3"><a href="" id="resetNIA">Reset</a></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" id="floatingStatus" aria-label="State" name="status" required>
                      <option selected disabled>Masukkan Status</option>
                      @foreach ($status as $s)
                        <option value="{{ $s->id }}">{{ $s->nama_status }}</option>
                      @endforeach
                    </select>
                    <label for="floatingStatus">Status</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="floatingEmail" placeholder="Email" name="email" value="{{ old('email') }}">
                    <label for="floatingEmail">Email</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingNo" placeholder="No Handphone" name="no_hp" value="{{ old('no_hp') }}">
                    <label for="floatingNo">No Handphone</label>
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
<script>
      document.getElementById('resetNIA').addEventListener('click', function() {
        // Menghentikan perilaku default dari tombol reset
        event.preventDefault();
        // Mengambil elemen input dengan id 'floatingnia'
        let input = document.getElementById('floatingnia');

        // Mengatur nilai input kembali menjadi "NIA:WPL."
        input.value = 'NIA:WPL.';

        // Memindahkan fokus ke awal input
        input.focus();
      });

        $(document).ready(function() {
            $('.justNumber').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    // function handleInput(input) {
    //     // Mengambil nilai input
    //     let value = input.value;

    //     // Pisahkan nilai input menjadi array kata
    //     let words = value.split(' ');

    //     // Jika ada kata yang dihapus (panjang array kurang dari 4)
    //     if (value.length < 8) {
    //         // Ganti nilai input kembali menjadi "NIA:WPL."
    //         input.value = 'NIA:WPL.';
    //     }
    //     // Mengubah nilai input berdasarkan panjang karakter
    //     if (value.length === 10) {
    //         // Tambahkan dua digit pertama nomor
    //         input.value = value + '.';
    //     } else if (value.length === 14) {
    //         // Tambahkan tanda titik setelah dua digit berikutnya
    //         input.value = value + '.';
    //     } else if (value.length === 18) {
    //         // Tambahkan tanda titik setelah tiga digit berikutnya
    //         input.value = value;
    //     }
    // }

    // function handleFocus(input) {
    //     // Memastikan bahwa kursor berada di awal input
    //     input.selectionStart = input.selectionEnd = input.value.indexOf(':') + 1;
    // }

    // function handleKeyDown(event) {
    //     // Mendapatkan key yang ditekan
    //     let key = event.key;

    //     // Mencegah input jika bukan angka atau jika kursor tidak berada di akhir input
    //     if (!/^\d$/.test(key) || event.target.selectionStart < event.target.value.indexOf(':') + 6) {
    //         event.preventDefault();
    //     }
    // }
  </script>
@include('admin.template.footer')
