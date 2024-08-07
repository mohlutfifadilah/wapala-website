<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" href="{{ asset('Logo WAPALA.png') }}">
    <style>
        .btn-primary {
           background-color: #87ceeb;
           border: none;
        }
        .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary:after, .btn-primary:active:after{
            background-color: #87ceeb;
            border: none;
        }
        body {
            font-family: 'Poppins';
        }

        .nav-item .nav-link.active{
            font-weight: bold;
            color: #87ceeb;
        }
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

/* Navbar transparan */
    .navbar {
        background-color: transparent !important;
        position: absolute;
    }
    .nav-link {
        color: #fff; /* Warna teks */
        margin:  0 20px; /* Jarak antar item navbar */
    }
    .wrap .jumbotron {
      position: absolute; /* Absolute positioning for text */
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white; /* Adjust color for visibility */
      text-align: center; /* Center align text */
    }
    .portfolio-menu{
	text-align:center;
}
.portfolio-menu ul li{
	display:inline-block;
	margin:0;
	list-style:none;
	padding:10px 15px;
	cursor:pointer;
	-webkit-transition:all 05s ease;
	-moz-transition:all 05s ease;
	-ms-transition:all 05s ease;
	-o-transition:all 05s ease;
	transition:all .5s ease;
}

.portfolio-item{
	/*width:100%;*/
}
.portfolio-item .item{
	/*width:303px;*/
	float:left;
	margin-bottom:10px;
}
    </style>
  </head>
  <body>
        <div class="wrap">
            <div class="overlay">
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent w-100 position-absolute py-0 mt-0 px-5">
                    <div class="container-fluid">
                        <a class="navbar-brand fw-bold" href="#">
                            <img src="Logo WAPALA.png" class="mx-2 mt-3" alt="wapala" width="40" height="70">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mr-2">
                                <li class="nav-item">
                                    <a class="nav-link {{ $segment === 'beranda' ? 'active' : '' }}" href="/">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $segment === 'profil' ? 'active' : '' }}" href="/profil">Profil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $segment === 'album' ? 'active router-link-active' : '' }}" href="/album">Album</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $segment === 'kontak' ? 'active router-link-active' : '' }}" href="/kontak">Kontak</a>
                                </li>
                                @if (!Auth::check())
                                    {{-- <li class="nav-item mr-2 ms-3">
                                        <a class="btn btn-primary btn-small" href="/login">Login</a>
                                    </li> --}}
                                @else
                                    <li class="nav-item mr-2 ms-3">
                                        <a class="btn btn-primary btn-small" href="/dashboard">Dashboard</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            @yield('jumbotron')
        </div>
