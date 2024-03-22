    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="index.html">Logo Disini<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li><a class="{{ request()->routeIs('sejarah') ? 'active' : '' }}" href="{{ route('sejarah') }}">Sejarah</a></li>
                    <li><a class="{{ request()->routeIs('denah') ? 'active' : '' }}" href="{{ route('denah') }}">Denah</a></li>
                    <li><a class="{{ request()->routeIs('berita') ? 'active' : '' }}" href="{{ route('berita') }}">Berita</a></li>
                    <li><a class="{{ request()->routeIs('peninggalan_kuno') ? 'active' : '' }}" href="{{ route('peninggalan_kuno') }}">Peninggalan Kuno</a></li>
                    <li><a class="{{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->