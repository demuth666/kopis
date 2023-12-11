<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Kenangan Senja</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- Navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">kenangan<span>senja</span>.</a>

        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#products">Produk</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="login">
            <a href={{ route('filament.admin.auth.login') }}>Login</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="search-button"><i data-feather="search"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>

        <!-- Search Form start -->
        <div class="search-form">
            <form method="GET" action="{{ route('search') }}">
                <input type="search" id="search-box" name="data" placeholder="search here...">
            </form>
        </div>


    </nav>x
    <!-- Navbar end -->

    <!-- Menu Section start -->
    <section id="menu" class="menu">
        <div class="row">
            @if (count($produk))
                @foreach ($produk as $produks)
                    <div class="menu-card">
                        <a href={{ route('order', $produks->id) }}>
                            <img src="{{ asset('storage/' . $produks->gambar) }}" alt="Espresso" class="menu-card-img">
                        </a>
                        <h3 class="menu-card-title">{{ $produks->nama_produk }}</h3>
                        <p class="menu-card-price">IDR {{ $produks->harga }}</p>
                    </div>
                @endforeach
            @else
                <div class="menu-card">
                    <h3 class="menu-card-title">Produk Tidak Ditemukan</h3>
                </div>
            @endif
        </div>
    </section>
    <!-- Menu Section end -->

    <!-- Footer start -->
    <footer>
        <div class="socials">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
        </div>

        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="credit">
            <p>Created by <a href="">syifa ramadhani</a>. | &copy; 2023.</p>
        </div>
    </footer>
    <script>
        feather.replace()
    </script>

    <!-- My Javascript -->
    <script src={{ asset('js/script.js') }}></script>
</body>

</html>
