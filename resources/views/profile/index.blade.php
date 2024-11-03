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
        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            align-items: flex-start;
        }
        .text-content {
            flex: 2;
            padding-right: 20px;
        }
        .text-content h1, .text-content h2 {
            color: #333;
        }
        .text-content p, .text-content li {
            color: #555;
        }
        .text-content ul {
            padding-left: 20px;
        }
        .image-content {
            flex: 1;
        }
        .image-content video {
            width: 100%;
            max-width: 1200px;
            height: auto;
            margin-top: 90px;
            margin-left: 50px;
        }
        /* Additional styles for Kepala Sekolah section */
        .kepala-sekolah-container {
            display: flex;
            align-items: flex-start;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        .kepala-sekolah-container .text-content {
            flex: 2;
            padding-right: 20px;
        }
        .kepala-sekolah-container .image-content {
            flex: 1;
            text-align: center;
        }
        .kepala-sekolah-container .image-content img {
            width: 100%;
            max-width: 300px;
            margin-top: 10px;
        }
        /* Kompetensi Keahlian section */
        .kompetensi-keahlian {
            text-align: center;
            margin-top: 40px;
        }
        .kompetensi-keahlian .grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .kompetensi-keahlian .grid-item {
            width: 200px;
            margin: 10px;
        }
        .kompetensi-keahlian .grid-item img {
            width: 100%;
        }
        .fasilitas {
            margin: 40px auto;
            max-width: 1200px;
            text-align: center;
        }
        .fasilitas h2 {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }
        .fasilitas .card {
            border: none;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .fasilitas .card img {
            width: 100%;
            height: auto;
        }
        .fasilitas .card-body {
            padding: 10px;
        }
        .fasilitas .card-body p {
            margin: 0;
            font-size: 1.1em;
            color: #555;
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
                Gallery Sekolah
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-1 active" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-1 active" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-1 active" href="{{ route('profilesekola.index') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-1 active" href="{{ route('welcome') }}">Gallery Sekola</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <!-- Introduction and Video Section -->
    <div class="container">
        <div class="text-content">
            <h1>SMKN 4 Bogor</h1>
            <p>Merupakan sekolah kejuruan berbasis Teknologi Informasi dan Komunikasi. Sekolah ini didirikan dan dirintis pada tahun 2008 kemudian dibuka pada tahun 2009 yang saat ini terakreditasi A...</p>
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
        <div class="image-content">
            <video controls autoplay muted>
                <source src="{{ asset('video/smkn4bogor.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>

    <!-- Kepala Sekolah Section -->
    <div class="kepala-sekolah-container">
        <div class="text-content">
            <h2>Kepala Sekolah</h2>
            <p><strong>Drs. Mulya Murprihartono, M.Si.</strong></p>
            <p>Kepala Sekolah Ke-3, Juli 2020 - sekarang</p>
            <p>Sejak satu tahun lalu SMKN 4 Kota Bogor dipimpin oleh seseorang yang membawa warna baru, tahun pertama sejak dilantik, tepatnya pada tanggal 10 Juli 2020, inovasi dan kebijakan-kebijakan baru pun mulai dirancang. Bukan tanpa kesulitan, penuh tantangan tapi beliau meyakinkan untuk selalu optimis pada harapan dengan bersinergi mewujudkan visi misi SMKN 4 Bogor ditengah kesulitan pandemi ini. Strategi baru pun dimunculkan, beberapa program sudah terealisasikan diantaranya mengembangkan aplikasi LMS (Learning Management System) sebagai solusi dalam pelaksanaan program BDR (Belajar dari Rumah), untuk mengoptimalkan hubungan kerjasama antara sekolah dengan Industri dan Dunia Kerja (IDUKA), dan juga untuk pengalaman praktek belajar jarak jauh agar tetap berjalan dengan optimal.</p>
        </div>
        <div class="image-content">
            <img src="{{asset('images/image.png')}}" alt="Drs. Mulya Murprihartono, M.Si.">
            <p>Drs. Mulya Murprihartono, M.Si.</p>
        </div>
    </div>

    <!-- Kompetensi Keahlian Section -->
    <div class="kompetensi-keahlian">
        <h2>Kompetensi Keahlian</h2>
        <div class="grid">
            <div class="grid-item">
                <img src="{{asset('images/IMG-20241103-WA0075.jpg')}}" alt="PPLG Logo">
            </div>
            <div class="grid-item">
                <img src="{{asset('images/tjkt.png')}}" alt="TKJ Logo">
            </div>
            <div class="grid-item">
                <img src="{{asset('images/IMG-20241103-WA0073.jpg')}}" alt="TKR Logo">
            </div>
            <div class="grid-item">
                <img src="{{asset('images/tflm.jpeg')}}" alt="TFLDM Logo">
            </div>
        </div>
    </div>
    {{-- <div class="fasilitas">
        <h2>Fasilitas</h2>
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="path/to/image1.jpg" class="card-img-top" alt="Lapangan Upacara">
                    <div class="card-body">
                        <p>Lapangan Upacara</p>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="path/to/image2.jpg" class="card-img-top" alt="Taman">
                    <div class="card-body">
                        <p>Taman</p>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="path/to/image3.jpg" class="card-img-top" alt="Ruang Aula">
                    <div class="card-body">
                        <p>Ruang Aula</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Card 4 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="path/to/image4.jpg" class="card-img-top" alt="Lapangan Upacara">
                    <div class="card-body">
                        <p>Lapangan Upacara</p>
                    </div>
                </div>
            </div>
            <!-- Card 5 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="path/to/image5.jpg" class="card-img-top" alt="Ruang Praktek PPLG">
                    <div class="card-body">
                        <p>Ruang Praktek PPLG</p>
                    </div>
                </div>
            </div>
            <!-- Card 6 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="path/to/image6.jpg" class="card-img-top" alt="Ruang Praktek PPLG">
                    <div class="card-body">
                        <p>Ruang Praktek PPLG</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <footer class="tm-bg-gray pt-3 pb-3 tm-text-gray tm-footer">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-7 col-12 px-5 mb-3 text-center" style="font-size: 14px; font-weight: bold;">
                Copyright &copy; 2024 Ashinovatech Company. All rights reserved.
            </div>
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
