<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>SMKN 4 Bogor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        /* Additional styling for specific sections */
        .text-content h1, .text-content h2 {
            color: #333;
        }
        .text-content p, .text-content li {
            color: #555;
        }
        .image-content video {
            width: 100%;
            height: auto;
        }
        .kompetensi-keahlian .grid-item img {
            width: 100%;
        }
        .fasilitas .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-film mr-2"></i>
               Gallery Sekola
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1 active" aria-current="page" href="{{route('login')}}">login </a>
                </li>
       
                <li class="nav-item">
                    <a class="nav-link nav-link-1 active" aria-current="page" href="{{route('register')}}">register </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-1 active" aria-current="page" href="{{ route('profilesekola.index') }}">Profile</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link nav-link-1 active" aria-current="page" href="{{ route('welcome') }}">Gallery</a>
                </li>                
                  
       
            </ul>
            </div>
        </div>
    </nav>

    <!-- Introduction and Video Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 text-content">
                <h1>SMKN 4 Bogor</h1>
                <p>Merupakan sekolah kejuruan berbasis Teknologi Informasi dan Komunikasi...</p>
                <h2>Visi :</h2>
                <p>Terwujudnya SMK Pusat Keunggulan melalui terciptanya pelajar pancasila yang berbasis teknologi...</p>
                <h2>Misi :</h2>
                <ul>
                    <li>Mewujudkan karakter pelajar pancasila beriman dan bertaqwa kepada Tuhan Yang Maha Esa...</li>
                    <li>Mengembangkan pembelajaran dan pengelolaan sekolah berbasis Teknologi Informasi dan Komunikasi...</li>
                    <li>Mengembangkan sekolah yang berbasis Adiwiyata Mandiri...</li>
                    <li>Mengembangkan usaha dalam berbagai bidang secara optimal...</li>
                </ul>
            </div>
            <div class="col-lg-4 image-content">
                <video controls autoplay muted class="embed-responsive">
                    <source src="{{ asset('video/smkn4bogor.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>

    <!-- Kepala Sekolah Section -->
    <div class="container my-5 kepala-sekolah-container">
        <div class="row">
            <div class="col-lg-8 text-content">
                <h2>Kepala Sekolah</h2>
                <p><strong>Drs. Mulya Murprihartono, M.Si.</strong></p>
                <p>Kepala Sekolah Ke-3, Juli 2020 - sekarang</p>
                <p>Sejak satu tahun lalu SMKN 4 Kota Bogor dipimpin oleh seseorang yang membawa warna baru...</p>
            </div>
            <div class="col-lg-4 image-content text-center">
                <img src="{{asset('images/image.png')}}" alt="Drs. Mulya Murprihartono, M.Si." class="img-fluid">
                <p>Drs. Mulya Murprihartono, M.Si.</p>
            </div>
        </div>
    </div>

    <!-- Kompetensi Keahlian Section -->
    <div class="container my-5 kompetensi-keahlian text-center">
        <h2>Kompetensi Keahlian</h2>
        <div class="row">
            <div class="col-md-3 grid-item"><img src="{{asset('images/PPLG.jpg')}}" alt="PPLG Logo" class="img-fluid"></div>
            <div class="col-md-3 grid-item"><img src="{{asset('images/TKJ.jpg')}}" alt="TKJ Logo" class="img-fluid"></div>
            <div class="col-md-3 grid-item"><img src="{{asset('images/teknik_otomotif.jpg')}}" alt="TKR Logo" class="img-fluid"></div>
            <div class="col-md-3 grid-item"><img src="{{asset('images/Pengelasan.jpg')}}" alt="TFLDM Logo" class="img-fluid"></div>
        </div>
    </div>

    <footer class="tm-bg-gray pt-3 pb-3 tm-text-gray tm-footer">
        <div class="container text-center" style="font-size: 14px; font-weight: bold;">
            Copyright &copy; 2024 Ashinovatech Company. All rights reserved.
        </div>
    </footer>

    <script src="{{ asset('js/plugins.js') }}"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html>
