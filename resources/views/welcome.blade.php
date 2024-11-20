<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery sekolah</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!--
    
TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->
<style>
.tm-gallery img {
        width: 100%; /* Lebar gambar mengikuti card */
        height: 250px; /* Tinggi tetap untuk semua gambar */
        object-fit: cover; /* Potong gambar agar sesuai ukuran */
        border-radius: 8px; /* Opsional: tampil lebih halus */
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
       
            </ul>
            </div>
        </div>
    </nav>
    <div class="tm-hero d-flex justify-content-center align-items-center" 
    style="background-image: url('{{ asset('images/Smkn_04_bogor.jpg') }}'); background-position: center; background-size: cover; height: 400px;">





    {{-- <div class="tm-hero d-flex justify-content-center align-items-center" style="background-image: url('{{asset('img/hero.jpg')}}');"> --}}
        {{-- <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form> --}}
    </div>

    @php
    $gallery = App\Models\Gallery::paginate(9);
@endphp

<div class="container-fluid tm-container-content tm-mt-60">
  <div class="row mb-4">
      <h2 class="col-6 tm-text-primary">
          Latest Photos
      </h2>
      <div class="col-6 d-flex justify-content-end align-items-center">
          <form action="" class="tm-text-primary">
            @for ($i = 1; $i <= $gallery->lastPage(); $i++)
              Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary" {{ $i == $gallery->currentPage() ? 'active' : '' }}> of {{ $i }}
              @endfor
          </form>
      </div>
  </div>

    <div class="row tm-gallery">
        @foreach ($gallery as $item)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <div class="card">
                    <figure class="effect-ming tm-video-item d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/'.$item->foto) }}" alt="Image" class="card-img-top img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{ $item->text }}</h2>
                        </figcaption>
                    </figure>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->text }}</h5>
                        <p class="card-text">Tanggal: {{ $item->tanggal }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    
            
        </div> <!-- row -->
        <div class="col-6 d-flex justify-content-end align-items-center">
            <form action="" class="tm-text-primary">
                {{ $gallery->links('pagination::bootstrap-4') }}
            </form>
        </div>
        
        
    </div> <!-- container-fluid, tm-container-content -->
    <footer class="tm-bg-gray pt-3 pb-3 tm-text-gray tm-footer">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Sekola dan Visi/Misi -->
                <div class="col-lg-6 col-md-6 col-12 text-left" style="font-size: 14px; font-weight: bold;">
                    <h1><strong style="color: black"> SMKN 04 BOGOR</strong></h1>
                    <p><strong>Visi:</strong></p>
                    <p>Terwujudnya SMK Pusat Keunggulan melalui terciptanya pelajar pancasila yang berbasis teknologi, berwawasan lingkungan dan berkewirausahaan.</p>
                    <p><strong>Misi:</strong></p>
                    <ul>
                        <li>Mewujudkan karakter pelajar pancasila beriman dan bertaqwa kepada Tuhan Yang Maha Esa dan berakhlak mulia, berkebhinekaan global, gotong royong, mandiri, kreatif dan bernalar kritis.</li>
                        <li>Mengembangkan pembelajaran dan pengelolaan sekolah berbasis Teknologi Informasi dan Komunikasi.</li>
                        <li>Mengembangkan sekolah yang berwawasan Adiwiyata Mandiri.</li>
                        <li>Mengembangkan usaha dalam berbagai bidang secara optimal sehingga memiliki kemandirian dan daya saing tinggi.</li>
                    </ul>
                </div>
    
                <!-- Google Maps -->
                <div class="col-lg-6 col-md-6 col-12 text-right">
                    <iframe
                        width="100%"
                        height="300px"
                        frameborder="0"
                        style="border:0"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.04983961244!2d106.82211897504129!3d-6.640733393353841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1731226686593!5m2!1sid!2sid"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
    
            <!-- Copyright -->
            <p style="text-align: center">&copy; 2024 Ashinovatech Company. All rights reserved.</p>
        </div>
    </footer>
    
    
    
    
    <script src="{{asset('js/plugins.js')}}"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html>