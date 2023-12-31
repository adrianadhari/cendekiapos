@extends('layouts.layout')
@section('content')
<main id="main">

    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">
                    <div class="single-post">
                        <div class="post-meta"><span class="date">{{ $post->categories->name}}</span> <span class="mx-1">&bullet;</span>
                            <span>{{ $post->created_at->format('d M \'y') }}</span>
                        </div>
                        <h1 class="mb-5">{{ $post->title }}</h1>
                        <p><span class="firstcharacter">L</span>{!! $post->excerpt !!}</p>

                        <figure class="my-4">
                            <img src="{{ url('storage/'.$post->image) }}" alt="" class="img-fluid">
                            <figcaption>{!! $post->caption !!}</figcaption>
                        </figure>
                        {!! $post->excerpt !!}
                        {!! $post->body !!}
                    </div><!-- End Single Post Content -->
                </div>
                <div class="col-md-3">
                    <!-- ======= Sidebar ======= -->
                    <div class="aside-block">

                        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-popular" type="button" role="tab"
                                    aria-controls="pills-popular" aria-selected="true">Popular</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest"
                                    aria-selected="false">Latest</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <!-- Popular -->
                            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel"
                                aria-labelledby="pills-popular-tab">
                                @foreach($trendingPost as $post)
                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">{{ $post->categories->name }}</span> <span
                                            class="mx-1">&bullet;</span> <span>{{ $post->created_at->format('d M \'y') }}</span></div>
                                    <h2 class="mb-2"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h2>
                                    <span class="author mb-3 d-block">{{ $post->author->name }}</span>
                                </div>
                                @endforeach
                            </div> <!-- End Popular -->

                            <!-- Latest -->
                            <div class="tab-pane fade" id="pills-latest" role="tabpanel"
                                aria-labelledby="pills-latest-tab">
                                @foreach($latest as $post)
                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">{{ $post->categories->name }}</span> <span
                                            class="mx-1">&bullet;</span> <span>{{ $post->created_at->format('d M \'y') }}</span></div>
                                    <h2 class="mb-2"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h2>
                                    <span class="author mb-3 d-block">{{ $post->author->name }}</span>
                                </div>
                                @endforeach

                            </div> <!-- End Latest -->

                        </div>
                    </div>

                   {{--  <div class="aside-block">
                        <h3 class="aside-title">Video</h3>
                        <div class="video-post">
                            <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
                                <span class="bi-play-fill"></span>
                                <img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Video -->

                    <div class="aside-block">
                        <h3 class="aside-title">Categories</h3>
                        <ul class="aside-links list-unstyled">
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Business</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Culture</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Sport</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Food</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Politics</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Celebrity</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Startups</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Travel</a></li>
                        </ul>
                    </div><!-- End Categories -->

                    <div class="aside-block">
                        <h3 class="aside-title">Tags</h3>
                        <ul class="aside-tags list-unstyled">
                            <li><a href="category.html">Business</a></li>
                            <li><a href="category.html">Culture</a></li>
                            <li><a href="category.html">Sport</a></li>
                            <li><a href="category.html">Food</a></li>
                            <li><a href="category.html">Politics</a></li>
                            <li><a href="category.html">Celebrity</a></li>
                            <li><a href="category.html">Startups</a></li>
                            <li><a href="category.html">Travel</a></li>
                        </ul>
                    </div><!-- End Tags -->
 --}}
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection