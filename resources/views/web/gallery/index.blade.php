@extends('web._layout.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Gallery</li>
        </ol>
        <h2>Gallery</h2>
    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Gallery</h2>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($gallery as $item)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">

                <div class="portfolio-wrap">
                    <img src="{{ asset('storage/gallery/' . $item->foto) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <div class="portfolio-links">
                            <a href="{{ asset('storage/gallery/' . $item->foto) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $item->judul }}"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</section><!-- End Portfolio Section -->
@endsection