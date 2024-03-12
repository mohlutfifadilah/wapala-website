@section('title', 'Profil - WAPALA IT Telkom')
@section('jumbotron')
<div class="jumbotron mt-5 pt-5">
                <h1 class="display-3 fw-bold">Profil</h1>
                <p><em>Beranda > Profil</em></p>
                {{-- <small class="text-muted">Tertarik ?</small><br>
                <a href="" class="btn btn-primary">Daftar Sekarang</a> --}}
            </div>
            <div class="banner"></div>
@endsection
@include('template.header-profil')
        <section class="my-4">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3>Visi</h3>
                        <p style="text-align: justify;">
                            WAPALA IT Telkom sebagai organisasi yang memiliki kepedulian tinggi terhadap alam dan lingkungan sekitar serta dapat meningkatkan intelektualitas, jasmani, rohani, dan jiwa ksatria anggotanya.
                        </p>
                        <h3>Misi</h3>
                        <p style="text-align: justify;">
                            <ol class="m-0 ps-3">
                                <li>
                                    Memperluas hubungan kerjasama dan mempererat rasa kekeluargaan yang harmonis serta saling menguntungkan dengan organisasi eksternal.
                                </li>
                                <li>
                                    Menyelenggarakan kegiatan yang dapat membantu masyarakat dan turut serta dalam usaha pelestarian alam dan lingkungan hidup.
                                </li>
                                <li>
                                    Membentuk anggota WAPALA IT Telkom yang mampu berpikir dan bertindak kritis, bertanggung jawab, berwawasan luas yang berlandaskan nilai-nilai kekeluargaan.
                                </li>
                                <li>
                                    Mengembangkan kegiatan dalam rangka peningkatan kualitas tata kelola organisasi.
                                </li>
                            </ol>
                        </p>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-md-4">
                                <div id="total"></div>
                                <div id="ak"></div>
                                <div id="alb"></div>
                                <div id="ab"></div>
                            </div>
                            <div class="col-md-8">
                                <h5 class="mt-2 mb-0 pt-1">Total Keseluruhan Anggota</h5>
                                <small class="mb-5">Total seluruh anggota yang ada di WAPALA IT Telkom</small>
                                <h5 class="mt-5 mb-0 pt-1">Anggota Kehormatan</h5>
                                <small class="mb-5">Total seluruh Anggota Kehormatan</small>
                                <h5 class="mt-5 mb-0 pt-1">Anggota Luar Biasa</h5>
                                <small class="mb-5">Total seluruh Anggota Luar Biasa</small>
                                <h5 class="mt-5 mb-0 pt-1">Anggota Biasa</h5>
                                <small class="mb-5">Total seluruh Anggota Biasa</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="my-5">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('arti-logo2.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </section>
        <section class="my-5">
            <div class="container">
                <div class="row row-cols-4">
                    @foreach ($angkatan as $a)
                        <div class="col">
                            <div class="card" style="width: 16rem;">
                                <img src="{{ asset('IMG_6120.JPG') }}" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $a->nama_angkatan }}</h5>
                                    <p class="card-text">WAPALA {{ numberToRomanRepresentation($loop->iteration) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col">
                        <div class="card" style="width: 16rem;">
                            <img src="{{ asset('IMG_6120.JPG') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 16rem;">
                            <img src="{{ asset('IMG_6120.JPG') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 16rem;">
                            <img src="{{ asset('IMG_6120.JPG') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="{{ asset('js/progressbar.js') }}"></script>
        <script>
            var bar = new ProgressBar.Circle('#total', {
                color: '#FFEA82',
                trailColor: '#eee',
                trailWidth: 1,
                duration: 1400,
                easing: 'bounce',
                strokeWidth: 6,
                from: {color: '#FFEA82', a:0},
                to: {color: '#ED6A5A', a:1},
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.setText({{ $total }});
                    circle.text.style.color = state.color;
                }
            });

            bar.animate(1.0);  // Number from 0.0 to 1.0

            var bar = new ProgressBar.Circle('#ak', {
                color: '#FFEA82',
                trailColor: '#eee',
                trailWidth: 1,
                duration: 1400,
                easing: 'bounce',
                strokeWidth: 6,
                from: {color: '#FFEA82', a:0},
                to: {color: '#ED6A5A', a:1},
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.setText({{ $ak }});
                    circle.text.style.color = state.color;
                }
            });

            bar.animate(1.0);  // Number from 0.0 to 1.0
            var bar = new ProgressBar.Circle('#alb', {
                color: '#FFEA82',
                trailColor: '#eee',
                trailWidth: 1,
                duration: 1400,
                easing: 'bounce',
                strokeWidth: 6,
                from: {color: '#FFEA82', a:0},
                to: {color: '#ED6A5A', a:1},
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.setText({{ $alb }});
                    circle.text.style.color = state.color;
                }
            });

            bar.animate(1.0);  // Number from 0.0 to 1.0
            var bar = new ProgressBar.Circle('#ab', {
                color: '#FFEA82',
                trailColor: '#eee',
                trailWidth: 1,
                duration: 1400,
                easing: 'bounce',
                strokeWidth: 6,
                from: {color: '#FFEA82', a:0},
                to: {color: '#ED6A5A', a:1},
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.setText({{ $ab }});
                    circle.text.style.color = state.color;
                }
            });

            bar.animate(1.0);  // Number from 0.0 to 1.0
        </script>
        <?php
            function numberToRomanRepresentation($number) {
                $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
                $returnValue = '';
                while ($number > 0) {
                    foreach ($map as $roman => $int) {
                        if($number >= $int) {
                            $number -= $int;
                            $returnValue .= $roman;
                            break;
                        }
                    }
                }
                return $returnValue;
            }
        ?>
@include('template.footer')
