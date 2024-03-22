@extends('web._layout.app')
@section('content')

@push('styles')
<style>
    .google-maps {
        position: relative;
        padding-bottom: 75%;
        height: 0;
        overflow: hidden;
    }

    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }

    #hero {
        width: 100%;
        height: 100vh;
        background: url("../img/hero-bg.jpg") top center no-repeat;
        background-size: cover;
        position: relative;
        padding-top: 82px;
    }
</style>
@endpush

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="row">
            <div class="col-xl-6">
                <h1>Bettter digital experience with Presento</h1>
                <h2>We are team of talented designers making websites with Bootstrap</h2>
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Contact</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

            <div class="col-lg-6">

                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box mt-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>info@example.com<br>contact@example.com</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box mt-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="google-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15776.496492363074!2d115.22448505000001!3d-8.679744799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240f51f1412a5%3A0xa7e549b0b86dc50e!2sLapangan%20Puputan%20Renon!5e0!3m2!1sid!2sid!4v1711029335675!5m2!1sid!2sid" width="600" height="410" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

    </div>
</section><!-- End Contact Section -->
@endsection