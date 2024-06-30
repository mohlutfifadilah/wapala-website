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
                        <form class="g-3" method="POST" action="{{ route('pendaftaran.store') }}">
                            @csrf
                            <h4>Data Pribadi :</h4>
                            <hr>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="l" id="l" value="l">
                                        <label class="form-check-label" for="l">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="p" id="p" value="p">
                                        <label class="form-check-label" for="p">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 mb-4">
                                <div class="col-md-3">
                                    <label for="golongan_darah" class="form-label">Golongan Darah</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="" id="" value="">
                                        <label class="form-check-label" for="l">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="p" id="p" value="p">
                                        <label class="form-check-label" for="p">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="nim" class="form-label">NIM</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="nim" name="nim">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="prodi" class="form-label">Program Studi</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-select" aria-label="prodi">
                                        <option selected disabled>Pilih Program Studi</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="agama" class="form-label">Agama</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-select" aria-label="agama">
                                        <option selected disabled>Pilih Agama</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="nohp" class="form-label">No Handphone</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="nohp" name="nohp">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="alamat_rumah" class="form-label">Alamat Rumah</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="alamat_rumah" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="alamat_domisili" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="motivasi" class="form-label">Motivasi</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="motivasi" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="pengalaman_organisasi" class="form-label">Pengalaman Organisasi</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="pengalaman_organisasi" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="riwayat_penyakit" class="form-label">Riwayat Penyakit</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="riwayat_penyakit" rows="3"></textarea>
                                </div>
                            </div>
                            <h4>Data Orang Tua :</h4>
                            <hr>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="nama_orangtua" class="form-label">Nama Orang Tua</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="nama_orangtua" name="nama_orangtua">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="nohp_orangtua" class="form-label">No Handphone</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="nohp_orangtua" name="nohp_orangtua">
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
            $(document).ready(function() {
                var currentDate = new Date();
                // Format the current date as YYYY-MM-DD for the input field
                var formattedCurrentDate = currentDate.toISOString().split('T')[0];
                // Set the max attribute of the input field to the current date
                let selectElement = document.getElementById('tanggal_lahir');
                selectElement.setAttribute('max', formattedCurrentDate);
            });
        </script>
        @include('template.footer')
