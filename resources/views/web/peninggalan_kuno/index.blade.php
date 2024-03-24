@extends('web._layout.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ route('peninggalan_kuno') }}">Home</a></li>
            <li>Peninggalan Kuno</li>
        </ol>
        <h2>Peninggalan Kuno</h2>
    </div>
</section><!-- End Breadcrumbs -->


<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Peninggalan Kuno</h2>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                @foreach ($peninggalanKuno as $item)
                <div class="swiper-slide">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <img src="{{ asset('storage/peninggalan_kuno/' . $item->foto) }}" class="testimonial-img" alt="">
                            <h3>{{ $item->judul }}</h3>
                            {!! substr($item->deskripsi, 0, 200) !!}...
                            <div class="read-more">
                                <a href="{{ route('peninggalan_kuno.show', ['id' => $item->id]) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End testimonial item -->
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- End Testimonials Section -->
@endsection