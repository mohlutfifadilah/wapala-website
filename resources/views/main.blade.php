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
<section class="mt-3 mb-1">
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{ asset('siapakami.png') }}" class="img-fluid mx-auto" alt="" style="width: 480px; height: 480px;">
            </div>
            <div class="col mt-5 pt-3">
                <h2 class="mb-4">Siapa Kami ?</h2>
                <p>
                    Kami adalah Wapala IT Telkom, WAPALA (Wahana Pencinta Alam) dibentuk pada tanggal 28 September 2004 <br> <br>
                    28 September 2004 : WAPALA AKATEL <br> 28 September 2013 : WAPALA STT TELEMATIKA TELKOM <br> 28 September 2017 : WAPALA IT Telkom.
                </p>
                <small class="mt-5 text-italic text-danger">
                    Ragu-ragu harap kembali!
                </small>
                <br>
                <a href="/profil" class="btn btn-primary btn-small mt-3">
                    Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>
<section class="mt-1">
    <div class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('Desain tanpa judul.png') }}">
        <div class="container text-center py-5 my-5">
            <div class="row">
                @foreach ($divisi as $d)
                    <div class="col mt-5 pt-2">
                        <img src="{{ asset('storage/logo-divisi/' . $d->logo) }}" alt="" class="img-fluid divisi">
                        <h3 class="mt-4 text-white">{{ $d->nama_divisi }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@include('template.footer')
