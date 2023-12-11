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


    </nav>
    <!-- Navbar end -->

    <!-- Hero Section start -->
    <section class="hero" id="home">
        <div class="mask-container">
            <main class="content">
                <h1>Mari Nikmati Secangkir <span>Kopi</span></h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, enim.</p>
            </main>
        </div>
    </section>

    <section id="about" class="about">
        <h2><span>Tentang</span> Kami</h2>

        <div class="row">
            <div class="about-img">
                <img src="img/tentang-kami.jpg" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Kenapa memilih kopi kami?</h3>
                <p>Nikmati kopi berkualitas tinggi kami, hasil dari biji terbaik yang dipilih secara hati-hati.
                    Dengan
                    setiap tegukan, Anda merasakan kelezatan dari perkebunan ke cangkir.</p>
                <p>Dukungan Anda tidak hanya menikmati kopi, tetapi juga mendukung petani lokal dan keberlanjutan.
                    Keberagaman cita rasa kami adalah seni, menciptakan pengalaman yang istimewa.</p>
            </div>
        </div>
    </section>

    <!-- About Section end -->

    <!-- Menu Section start -->
    <section id="menu" class="menu">
        <h2><span>Menu</span> Kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita, repellendus numquam quam tempora
            voluptatum.
        </p>
        <div class="row">
            @foreach ($produk as $produks)
                <div class="menu-card">
                    <a href={{ route('order', $produks->id) }}>
                        <img src="{{ asset('storage/' . $produks->gambar) }}" alt="Espresso" class="menu-card-img">
                    </a>
                    <h3 class="menu-card-title">{{ $produks->nama_produk }}</h3>
                    <p class="menu-card-price">IDR {{ $produks->harga }}</p>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Menu Section end -->

    <!-- Products Section start -->
    <section class="products" id="products">
        <h2><span>Produk Unggulan</span> Kami</h2>

        <div class="row">
            @foreach ($topProduk as $tops)
                <div class="product-card">
                    <div class="product-icons">
                        <a href={{ route('order', $tops->produk_id) }}><i data-feather="shopping-cart"></i></a>
                    </div>
                    <div class="product-image">
                        <img src="{{ asset('storage/' . $tops->gambar) }}" alt="Product 1">
                    </div>
                    <div class="product-content">
                        <h3>{{ $tops->nama_produk }}</h3>
                        <div class="product-price">IDR {{ $tops->harga }} <span>IDR 55K</span></div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Products Section end -->

    <!-- Contact Section start -->
    <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, provident.
        </p>

        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.57311709235512!3d-6.903444341687889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1672408575523!5m2!1sen!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="nama">
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" placeholder="email">
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="no hp">
                </div>
                <button type="submit" class="btn">kirim pesan</button>
            </form>

        </div>
    </section>
    <!-- Contact Section end -->

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
