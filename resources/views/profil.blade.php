@section('title', 'Profil - WAPALA IT Telkom')
@include('template.header')
        <section class="my-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3>Visi</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam corporis natus iusto quis veniam pariatur ducimus culpa perspiciatis et adipisci voluptas, beatae quibusdam laborum dignissimos laudantium quae accusantium eveniet quisquam.</p>
                        <h3>Misi</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam ratione, repudiandae repellendus earum ex dignissimos alias debitis architecto aperiam aliquid ea dolor consequatur blanditiis excepturi distinctio, illo quis modi vitae.</p>
                    </div>
                    <div class="col">
                        <div id="total"></div>
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
        <script src="{{ asset('js/progressbar.js') }}"></script>
        <script>
            // var ProgressBar = require({{ asset('js/progressbar.js') }});
            var bar = new ProgressBar.Circle('#total', {
                color: '#aaa',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 4,
                trailWidth: 1,
                easing: 'easeInOut',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: { color: '#aaa', width: 1 },
                to: { color: '#333', width: 4 },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                    circle.setText('');
                    } else {
                    circle.setText(value);
                    }

                }
                });
                bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                bar.text.style.fontSize = '2rem';

                bar.animate(1.0);  // Number from 0.0 to 1.0
        </script>
@include('template.footer')
