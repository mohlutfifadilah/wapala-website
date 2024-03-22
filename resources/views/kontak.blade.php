@section('title', 'Kontak - WAPALA IT Telkom')
@section('jumbotron')
<div class="jumbotron mt-5 pt-5">
                <h1 class="display-3 fw-bold">Kontak</h1>
                <p><em>Beranda > Kontak</em></p>
                {{-- <small class="text-muted">Tertarik ?</small><br>
                <a href="" class="btn btn-primary">Daftar Sekarang</a> --}}
            </div>
            <div class="banner"></div>
@endsection
@include('template.header-kontak')
        <section class="my-4">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src="{{ asset('ketum.png') }}" alt="">
                    </div>
                    <div class="col">
                        <h3>Kontak Kami :</h3>
                        <i class="fab fa-instagram" style="font-size: 25px;"></i> @wapalaittelkom
                    </div>
                </div>
            </div>
        </section>
        @include('template.footer')
