@section('title', 'WAPALA IT Telkom')
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
                        Kami adalah Wapala IT Telkom, WAPALA (Wahana Pencinta Alam) dibentuk pada tanggal 28 September 2004 dengan nama WAPALA AKATEL, pada tanggal 28 September 2013 WAPALA AKATEL berganti nama menjadi WAPALA STT TELEMATIKA TELKOM, lalu pada tanggal 28 September 2017 berganti nama menjadi WAPALA IT Telkom.
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
            <div class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('IMG_6120 (1).jpg') }}">
                <div class="container text-center py-5 my-5">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('icon.png') }}" alt="" class="img-fluid">
                            <h3>Rock Climbing</h3>
                        </div>
                        <div class="col">
                            <img src="{{ asset('icon.png') }}" alt="" class="img-fluid">
                            <h3>Gunung Hutan</h3>
                        </div>
                        <div class="col">
                            <img src="{{ asset('icon.png') }}" alt="" class="img-fluid">
                            <h3>Caving</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('template.footer')
