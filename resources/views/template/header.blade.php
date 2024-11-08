<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>

    <!-- Tambahkan jQuery di bagian <head> atau sebelum kode yang menggunakan $ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <link rel="icon" href="{{ asset('favicon.ico') }}">
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

        /* Navbar transparan */
        .navbar {
            background-color: transparent !important;
            position: absolute;
        }
        .nav-link {
            color: #fff; /* Warna teks */
            margin:  0 20px; /* Jarak antar item navbar */
        }

        @media (max-width: 768px) {
            .wrap .jumbotron {
                top: 60%; /* Adjust position on smaller screens */
                transform: translate(-50%, -60%);
                font-size: 1.2rem; /* Adjust font size for mobile */
            }
            .navbar .nav-link {
                margin: 0 10px; /* Reduce spacing on smaller screens */
            }
        }

        @media (max-width: 768px) {
            .navbar {
                background-color: rgba(0, 0, 0, 0.7) !important; /* Add slight background for better visibility */
            }
        }
    </style>
    @yield('css')
  </head>
  <body>
        <div class="wrap">
            <div class="overlay">
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent w-100 position-absolute py-0 mt-0 px-5">
                    <div class="container-fluid">
                        <a class="navbar-brand fw-bold" href="#">
                            <img src="{{ asset('WAPALA TELKOM UNIVERSITY.png') }}" class="mx-2 mt-3" alt="wapala" width="40" height="70">
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
