@section('title', 'Album - WAPALA IT Telkom')
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
                <h1 class="display-3 fw-bold">Album</h1>
                <p><em>Beranda > Album</em></p>
                {{-- <small class="text-muted">Tertarik ?</small><br>
                <a href="" class="btn btn-primary">Daftar Sekarang</a> --}}
            </div>
            <div class="banner"></div>
@endsection
@include('template.header')
            <section class="my-4">
                <div class="container">
                    <div class="portfolio-menu mt-2 mb-4 text-center">
                        <ul>
                            <li class="btn btn-primary btn-sm active" data-filter="*">Semua</li>
                            @foreach ($kategori as $k)
                                <li class="btn btn-primary btn-sm" data-filter=".{{ $k->id }}">{{ $k->nama_kategori }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="portfolio-item row">
                        @foreach ($galeri as $g)
                            <div class="item {{ $g->id_kategori }} col-lg-3 col-md-4 col-6 col-sm">
                                <a href="{{ asset('storage/galeri/' . $g->foto) }}" class="fancylight popup-btn" data-fancybox-group="light">
                                    <img class="img-fluid" src="{{ asset('storage/galeri/' . $g->foto) }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        <script>
            $('.portfolio-menu ul li').click(function(){
                $('.portfolio-menu ul li').removeClass('active');
                $(this).addClass('active');

                var selector = $(this).attr('data-filter');
                $('.portfolio-item').isotope({
                    filter:selector
                });
                return  false;
            });
         $(document).ready(function() {
            var popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
                type : 'image',
                gallery : {
                    enabled : true
                }
            });
         });
        </script>
        @include('template.footer')
