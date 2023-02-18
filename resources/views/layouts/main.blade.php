<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Teman Kota Semarang</title>
    <link href="img/disnaker.png" rel="icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Tenaga Kerja Mandiri" name="Tenaga Kerja Mandiri">
    <meta content="Tenaga Kerja Mandiri" name="Tenaga Kerja Mandiri">
  
          {{-- trix --}}
          <link rel="stylesheet" type="text/css" href="/css/trix.css">
          <script type="text/javascript" src="/js/trix.js"></script>
          <style>
            trix-toolbar [data-trix-button-group="file-tools"]{
              display: none
            }
          </style>

    <!-- Favicon -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset ('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset ('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset ('css/style.css') }}" rel="stylesheet">

  <style>
  .avatar {
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
  </style>
</head>

<body>
    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
      @include('partials.navbar')
      @yield('careusel')
    </div>
    <div>
      @yield('content')
    </div>
    

@include('partials.footer')


<!-- Back to Top -->

<a href="#" class="btn btn-lg btn-danger btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset ('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset ('js/main.js') }}"></script>
</body>

</html>