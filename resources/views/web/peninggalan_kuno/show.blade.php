@extends('web._layout.app')

@section('content')
<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ route('peninggalan_kuno') }}">Home</a></li>
            <li>Peninggalan Kuno</li>
        </ol>
        <h2>Peninggalan Kuno</h2>
    </div>
</section><!-- End Breadcrumbs -->


<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-12 entries">

                <article class="entry entry-single">

                    <div class="entry-img" style="text-align: center;">
                        <img src="{{ asset('storage/peninggalan_kuno/' . $peninggalanKuno->foto) }}" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        <a href="blog-single.html">{{ $peninggalanKuno->judul }}</a>
                    </h2>

                    <div class="entry-content">
                        <p>
                            {!! $peninggalanKuno->deskripsi !!}
                        </p>
                    </div>

                </article><!-- End blog entry -->

            </div><!-- End blog entries list -->

        </div>

    </div>
</section><!-- End Blog Single Section -->


@endsection