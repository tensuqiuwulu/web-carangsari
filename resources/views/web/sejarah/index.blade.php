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
                <h2>Sejarah</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada quam nec dolor rutrum, quis mattis est fermentum. Morbi eget nunc nec nisl convallis vehicula. Integer ut sagittis velit, non auctor odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam erat volutpat.
                </p>
                <p>
                    Curabitur nec lectus justo. Nullam vel orci euismod, fermentum risus nec, scelerisque elit. Nunc non sollicitudin leo. Donec pulvinar mi a dui vulputate, sit amet tempus urna lacinia. Vivamus sit amet odio nunc.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="https://via.placeholder.com/600x400" alt="Sejarah" class="img-fluid">
            </div>
        </div>
    </div>
</section>
@endsection