@section('title', 'Open Recruitment - WAPALA IT Telkom')
@section('jumbotron')
<div class="jumbotron mt-5 pt-5">
                <h1 class="display-3 fw-bold">Open Recruitment</h1>
                <p><em>Beranda > Open Recruitment {{ now()->year }}</em></p>
                {{-- <small class="text-muted">Tertarik ?</small><br>
                <a href="" class="btn btn-primary">Daftar Sekarang</a> --}}
            </div>
            <div class="banner"></div>
@endsection
@include('template.header-oprec')
        <section class="my-4">
            <div class="container">
                <div class="row">
                    <h2 class="text-center">SILAHKAN ISI FORMULIR :</h2>
                    <div class="col-6">
                        <form class="g-3" method="POST" action="{{ route('pendaftaran.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h4>Data Pribadi :</h4>
                            <hr>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="foto" class="form-label">Foto</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" value="{{ old('foto') }}" onchange="previewImage(event)">
                                    <div id="foto-preview" class="mt-4">
                                        <img id="foto-preview-img" src="{{ session('foto') }}" alt="Preview Foto" style="max-width: 300px; {{ session('foto') ? 'display: block;' : 'display: none;' }}">
                                    </div>
                                    @error('foto')
                                        <div id="foto" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                    <div id="foto" class="form-text mt-4">
                                        <ul>
                                            <li><small>Foto Formal resmi (SMA/SMK/Kuliah) yang penting terlihat rapih</small></li>
                                            <li><small>Foto dengan <i>background</i> merah dan usahakan berukuran 3x4</small></li>
                                            <li><small>Format file : jpg, jpeg, png, max 2MB</small></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                                    @error('nama_lengkap')
                                        <div id="nama_lengkap" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                    @error('tempat_lahir')
                                        <div id="tempat_lahir" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                    @error('tanggal_lahir')
                                        <div id="tanggal_lahir" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="l" value="l" {{ old('jenis_kelamin') == 'l' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="l">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="p" value="p" {{ old('jenis_kelamin') == 'p' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="p">Perempuan</label>
                                    </div>
                                    @error('jenis_kelamin')
                                        <div id="jenis_kelamin" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4 mb-4">
                                <div class="col-md-3">
                                    <label for="golongan_darah" class="form-label">Golongan Darah</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('golongan_darah') is-invalid @enderror" type="radio" name="golongan_darah" id="a" value="a" {{ old('golongan_darah') == 'a' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="a">A</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('golongan_darah') is-invalid @enderror" type="radio" name="golongan_darah" id="b" value="b" {{ old('golongan_darah') == 'b' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="b">B</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('golongan_darah') is-invalid @enderror" type="radio" name="golongan_darah" id="ab" value="ab" {{ old('golongan_darah') == 'ab' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="ab">AB</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('golongan_darah') is-invalid @enderror" type="radio" name="golongan_darah" id="o" value="o" {{ old('golongan_darah') == 'o' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="o">O</label>
                                    </div>
                                    @error('golongan_darah')
                                        <div id="golongan_darah" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="nim" class="form-label">NIM</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control justNumber @if(session('nim')) is-invalid @endif @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim') }}">
                                    @error('nim')
                                        <div id="nim" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                    @if(session('nim'))
                                        <div id="nim" class="form-text text-danger">{{ session('nim') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="prodi" class="form-label">Program Studi</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-select @error('prodi') is-invalid @enderror" aria-label="prodi" name="prodi">
                                        <option selected disabled>Pilih Program Studi</option>
                                        @foreach ($prodi as $p)
                                            <option value="{{ $p->nama_prodi }}" {{ old('prodi') == $p->nama_prodi ? 'selected' : '' }}>{{ $p->nama_prodi }}</option>
                                        @endforeach
                                    </select>
                                    @error('prodi')
                                        <div id="prodi" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="agama" class="form-label">Agama</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-select @error('agama') is-invalid @enderror" aria-label="agama" name="agama">
                                        <option selected disabled>Pilih Agama</option>
                                        @foreach ($agama as $a)
                                            <option value="{{ $a->nama_agama }}" {{ old('agama') == $a->nama_agama ? 'selected' : '' }}>{{ $a->nama_agama }}</option>
                                        @endforeach
                                    </select>
                                    @error('agama')
                                        <div id="agama" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="nohp" class="form-label">No Handphone</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control justNumber @if(session('nohp')) is-invalid @endif @error('nohp') is-invalid @enderror" id="nohp" name="nohp" value="{{ old('nohp') }}">
                                    @error('nohp')
                                        <div id="nohp" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                    @if(session('nohp'))
                                        <div id="nohp" class="form-text text-danger">{{ session('nohp') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="alamat_rumah" class="form-label">Alamat Rumah</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control @error('alamat_rumah') is-invalid @enderror" id="alamat_rumah" rows="4" name="alamat_rumah">{{ old('alamat_rumah') }}</textarea>
                                    @error('alamat_rumah')
                                        <div id="alamat_rumah" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control @error('alamat_domisili') is-invalid @enderror" id="alamat_domisili" rows="4" name="alamat_domisili">{{ old('alamat_domisili') }}</textarea>
                                    @error('alamat_domisili')
                                        <div id="alamat_domisili" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="motivasi" class="form-label">Motivasi</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control @error('motivasi') is-invalid @enderror" id="motivasi" rows="4" name="motivasi">{{ old('motivasi') }}</textarea>
                                    @error('motivasi')
                                        <div id="motivasi" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="pengalaman_organisasi" class="form-label">Pengalaman Organisasi</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control  @error('pengalaman_organisasi') is-invalid @enderror" id="pengalaman_organisasi" rows="4" name="pengalaman_organisasi">{{ old('pengalaman_organisasi') }}</textarea>
                                    @error('pengalaman_organisasi')
                                        <div id="pengalaman_organisasi" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="riwayat_penyakit" class="form-label">Riwayat Penyakit</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control @error('riwayat_penyakit') is-invalid @enderror" id="riwayat_penyakit" rows="4" name="riwayat_penyakit">{{ old('riwayat_penyakit') }}</textarea>
                                    @error('riwayat_penyakit')
                                        <div id="riwayat_penyakit" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <h4>Data Orang Tua :</h4>
                            <hr>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="nama_orangtua" class="form-label">Nama Orang Tua</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control @error('nama_orangtua') is-invalid @enderror" id="nama_orangtua" name="nama_orangtua" value="{{ old('nama_orangtua') }}">
                                    @error('nama_orangtua')
                                        <div id="nama_orangtua" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="nohp_orangtua" class="form-label">No Handphone</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control justNumber @if(session('nohp_orangtua')) is-invalid @endif @error('nohp_orangtua') is-invalid @enderror" id="nohp_orangtua" name="nohp_orangtua" value="{{ old('nohp_orangtua') }}">
                                    @error('nohp_orangtua')
                                        <div id="nohp_orangtua" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                    @if(session('nohp_orangtua'))
                                        <div id="nohp_orangtua" class="form-text text-danger">{{ session('nohp_orangtua') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('foto-preview-img');
                    output.src = reader.result;
                    output.style.display = 'block';
                }
                reader.readAsDataURL(event.target.files[0]);
            }
            $(document).ready(function() {

                var currentDate = new Date();
                // Format the current date as YYYY-MM-DD for the input field
                var formattedCurrentDate = currentDate.toISOString().split('T')[0];
                // Set the max attribute of the input field to the current date
                let selectElement = document.getElementById('tanggal_lahir');
                selectElement.setAttribute('max', formattedCurrentDate);

                $('.justNumber').on('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
            });
        </script>
        @include('template.footer')
