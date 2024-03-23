@extends('web._layout.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Sejarah</li>
        </ol>
        <h2>Sejarah</h2>
    </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-6">
                {!! $sejarah->deskripsi ?? '' !!}
            </div>
            <div class="col-lg-6">
                <!-- get foto sejarah -->
                <img src="{{ asset('storage/sejarah/' . $sejarah->foto) }}" alt="Sejarah" class="img-fluid">
            </div>
        </div>
    </div>
</section>
@endsection