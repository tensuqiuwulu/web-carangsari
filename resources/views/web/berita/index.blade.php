@extends('web._layout.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Berita</li>
        </ol>
        <h2>Berita</h2>
    </div>
</section><!-- End Breadcrumbs -->

<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-8 entries">
                @foreach ($berita as $item)
                <article class="entry">
                    <div class="entry-img">
                        <img src="{{ asset('storage/berita/' . $item->foto) }}" alt="" class="img-fluid">
                    </div>
                    <h2 class="entry-title">
                        <a href="blog-single.html">{{$item->judul}}</a>
                    </h2>
                    <div class="entry-content">
                        <p>
                            {!! substr($item->deskripsi, 0, 300) !!}...
                        </p>
                        <div class="read-more">
                            <a href="{{ route('berita.show', ['id' => $item->id]) }}">Read More</a>
                        </div>
                    </div>
                </article><!-- End blog entry -->
                @endforeach

                <div class="blog-pagination">
                    <ul class="justify-content-center">
                        @if ($berita->currentPage() == 1)
                        <li class="active"><a href="{{ $berita->url(1) }}">1</a></li>
                        @else
                        <li><a href="{{ $berita->url(1) }}">1</a></li>
                        @endif

                        @for ($i = 2; $i <= $berita->lastPage(); $i++)
                            @if ($i == $berita->currentPage())
                            <li class="active"><a href="{{ $berita->url($i) }}">{{ $i }}</a></li>
                            @else
                            <li><a href="{{ $berita->url($i) }}">{{ $i }}</a></li>
                            @endif
                            @endfor
                    </ul>
                </div>


            </div><!-- End blog entries list -->

            <div class="col-lg-4">

                <div class="sidebar">

                    <h3 class="sidebar-title">Recent Posts</h3>
                    <div class="sidebar-item recent-posts">
                        @foreach ($recentBerita as $item)
                        <div class="post-item clearfix">
                            <img src="{{ asset('storage/berita/' . $item->foto) }}" alt="">
                            <h4><a href="{{ route('berita.show', ['id' => $item->id]) }}">{{ $item->judul }}</a></h4>
                            <time datetime="2020-01-01">{{ $item->created_at }}</time>
                        </div>
                        @endforeach

                    </div><!-- End sidebar recent posts-->

                </div><!-- End sidebar -->

            </div><!-- End blog sidebar -->

        </div>

    </div>
</section><!-- End Blog Section -->
@endsection