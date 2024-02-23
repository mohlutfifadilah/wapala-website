@section('title', 'Profil - WAPALA IT Telkom')
@include('template.header')
        <section class="my-5">
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
                                <small class="mb-5">Total seluruh anggota yang di wasmallala</small>
                                <h5 class="mt-5 mb-0 pt-1">Anggota Kehormatan</h5>
                                <small class="mb-5">Total seluruh anggota yang di wasmallala</small>
                                <h5 class="mt-5 mb-0 pt-1">Anggota Luar Biasa</h5>
                                <small class="mb-5">Total seluruh anggota yang di wasmallala</small>
                                <h5 class="mt-5 mb-0 pt-1">Anggota Biasa</h5>
                                <small class="mb-5">Total seluruh anggota yang di wasmallala</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="my-5">
            <div class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('20240223_141045_0000.png') }}">
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
                    circle.setText(10);
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
                    circle.setText(10);
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
                    circle.setText(10);
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
                    circle.setText(10);
                    circle.text.style.color = state.color;
                }
            });

            bar.animate(1.0);  // Number from 0.0 to 1.0

        </script>
@include('template.footer')
