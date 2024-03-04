@section('title', 'WAPALA IT Telkom')
@section('jumbotron')
<div class="jumbotron m-0">
                <h1 class="display-3 fw-bold">WAPALA IT Telkom</h1>
                <p><em>~ Memayu Hayuning Bawana ~</em></p>
                {{-- <small class="text-muted">Tertarik ?</small><br>
                <a href="" class="btn btn-primary">Daftar Sekarang</a> --}}
            </div>
            <div class="banner"></div>
@endsection
@include('template.header')
<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{ asset('IMG_6120.JPG') }}" class="img-fluid" alt="...">
            </div>
            <div class="col">
                <h3>Siapa Kami?</h3>
                <p>
                    Kami adalah Wapala IT Telkom, WAPALA (Wahana Pencinta Alam) dibentuk pada tanggal 28 September 2004
                    dengan nama WAPALA AKATEL, pada tanggal 28 September 2013 WAPALA AKATEL berganti nama menjadi WAPALA
                    STT TELEMATIKA TELKOM, lalu pada tanggal 28 September 2017 berganti nama menjadi WAPALA IT Telkom.
                </p>
                <p class="mt-3 fw-italic">
                    Ragu-ragu harap kembali!
                </p>
                <a href="" class="btn btn-primary">
                    Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>
<section class="my-5">
    <div class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('20240223_141045_0000.png') }}">
        <div class="container text-center py-5 my-5">
            <div class="row">
                <div class="col mt-5 pt-2">
                    <img src="{{ asset('15.jpg') }}" alt="" class="img-fluid divisi">
                    <h3 class="mt-4 text-white">Rock Climbing</h3>
                </div>
                <div class="col mt-5 pt-2">
                    <img src="{{ asset('17.jpg') }}" alt="" class="img-fluid divisi">
                    <h3 class="mt-4 text-white">Gunung Hutan</h3>
                </div>
                <div class="col mt-5 pt-2">
                    <img src="{{ asset('13.jpg') }}" alt="" class="img-fluid divisi">
                    <h3 class="mt-4 text-white">Caving</h3>
                </div>
            </div>
        </div>
    </div>
</section>
@include('template.footer')
