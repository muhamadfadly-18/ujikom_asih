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
    style="background-image: url('{{ asset('images/IMG-20241103-WA0072.jpg') }}'); background-position: center; background-size: cover; height: 400px;">





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
              Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of {{ $gallery->count() }}
          </form>
      </div>
  </div>

  <div class="row tm-gallery">
    @foreach ($gallery as $item)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('img/'.$item->foto) }}" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>{{ $item->text }}</h2>
                </figcaption>                    
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">{{ $item->tanggal }}</span>
            </div>
        </div>
    @endforeach
</div>
    
            
        </div> <!-- row -->
        <div class="row tm-mb-90">
          <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
              <a href="{{ $gallery->previousPageUrl() }}" class="btn btn-primary tm-btn-prev mb-2 {{ $gallery->onFirstPage() ? 'disabled' : '' }}">Previous</a>
              <div class="tm-paging d-flex">
                  @for ($i = 1; $i <= $gallery->lastPage(); $i++)
                      <a href="{{ $gallery->url($i) }}" class="tm-paging-link {{ $i == $gallery->currentPage() ? 'active' : '' }}">{{ $i }}</a>
                  @endfor
              </div>
              <a href="{{ $gallery->nextPageUrl() }}" class="btn btn-primary tm-btn-next {{ $gallery->hasMorePages() ? '' : 'disabled' }}">Next Page</a>
          </div>            
      </div>
    </div> <!-- container-fluid, tm-container-content -->
    <footer class="tm-bg-gray pt-3 pb-3 tm-text-gray tm-footer">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-7 col-12 px-5 mb-3 text-center" style="font-size: 14px; font-weight: bold;">
                Copyright &copy; 2024 Ashinovatech Company. All rights reserved.
            </div>
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