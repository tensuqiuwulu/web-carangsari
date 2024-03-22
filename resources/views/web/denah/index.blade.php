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
                <img src="https://via.placeholder.com/800x600" alt="Denah" class="img-fluid">
            </div>
            <div class="col-lg-4">
                <h2>Legenda</h2>
                <ul class="list-group">
                    <li class="list-group-item">Ruangan A - Kantor</li>
                    <li class="list-group-item">Ruangan B - Ruang Rapat</li>
                    <li class="list-group-item">Ruangan C - Kamar Mandi</li>
                    <!-- Tambahkan item legenda lainnya sesuai kebutuhan -->
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection