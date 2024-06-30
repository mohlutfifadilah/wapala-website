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
                    <div class="col">
                        <h2>Syarat Pendaftaran :</h2>

                        <ol>
                            <li><p>Mahasiswa/i Aktif Institut Teknologi Telkom Purwokerto.</p></li>
                            <li><p>Bertekad menjadi seorang pencinta alam.</p></li>
                            <li><p>Tidak sedang dalam sanksi akademik.</p></li>
                            <li><p>Minimal studi Semester 1 dan maksimal Semester 3.</p></li>
                            <li><p>Bersedia mengikuti rangkaian Pendidikan Dasar Wapala dan menaati seluruh aturan yang berlaku.</p></li>
                        </ol>
                        <br>
                        <h5>Dengan menyetujui persyaratan diatas, saya menyatakan bersedia dan siap mengikuti seluruh rangkaian tanpa paksaan dari siapapun</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onchange="toggleButton()">
                            <label class="form-check-label" for="flexCheckDefault">
                                Saya Setuju
                            </label>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="/formpendaftaran" class="btn btn-success mt-1 disabled" id="nextButton">Selanjutnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
        function toggleButton() {
            var checkBox = $('#flexCheckDefault');
            var button = $('#nextButton');
            if (checkBox.is(':checked')) {
                button.removeClass('disabled');
            } else {
                button.addClass('disabled');
            }
        }

        // Initialize button state on page load
        $(document).ready(function() {
            toggleButton();
        });
    </script>
        @include('template.footer')
