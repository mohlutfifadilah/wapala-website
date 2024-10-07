@section('title', 'Open Recruitment - WAPALA IT Telkom')
@section('css')
    <style>
    .wrap{
        background-image:url('{{ asset('jumbotron.jpg') }}');
        width:100%;
        height:40vh;
        background-size:cover;
        position: relative;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Ubah nilai alpha (0.5) sesuai dengan kebutuhan Anda */
    }

    .wrap .jumbotron {
      position: absolute; /* Absolute positioning for text */
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white; /* Adjust color for visibility */
      text-align: center; /* Center align text */
    }
    </style>
@endsection
@section('jumbotron')
<div class="jumbotron mt-5 pt-5">
                <h1 class="display-3 fw-bold">Open Recruitment</h1>
                <p><em>Beranda > Open Recruitment {{ now()->year }}</em></p>
                {{-- <small class="text-muted">Tertarik ?</small><br>
                <a href="" class="btn btn-primary">Daftar Sekarang</a> --}}
            </div>
            <div class="banner"></div>
@endsection
@include('template.header')
        <section class="my-4">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2>Syarat Pendaftaran :</h2>

                        <ol>
                            <li><p>Mahasiswa/i Aktif Institut Telkom University Purwokerto.</p></li>
                            <li><p>Bertekad menjadi seorang pencinta alam.</p></li>
                            <li><p>Tidak sedang dalam sanksi akademik.</p></li>
                            <li><p>Minimal studi Semester 1 dan maksimal Semester 3.</p></li>
                            <li><p>Mengisi Formulir Pendaftaran</p></li>
                            <li><p>Mengunggah pas foto 3x4</p></li>
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
                            <a href="{{ route('pendaftaran.create') }}" class="btn btn-success mt-1 disabled" id="nextButton">Selanjutnya</a>
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
