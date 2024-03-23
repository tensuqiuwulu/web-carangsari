@extends('web._layout.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Denah</li>
        </ol>
        <h2>Denah</h2>
    </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-8">
                <h2>Denah</h2>
                <img src="{{ asset('storage/denah/' . ($denah->foto ?? '')) ?: 'https://via.placeholder.com/800x600' }}" alt="Denah" class="img-fluid">
            </div>
            <div class="col-lg-4">
                <h2>Deskripsi</h2>
                {!! $denah->deskripsi ?? '' !!}
            </div>
        </div>
    </div>
</section>
@endsection