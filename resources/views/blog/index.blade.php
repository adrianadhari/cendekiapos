@extends('layouts.layout')
@section('content')
<main id="main">

    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
        <div class="container-md" data-aos="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="swiper sliderFeaturedPosts">
                        <div class="swiper-wrapper">
                            @foreach($featuredPosts as $post)
                            <div class="swiper-slide">
                                <a href="{{ route('blog.show', $post->slug) }}" class="img-bg d-flex align-items-end"
                                    style="background-image: url('storage/{{$post->image}}') ">
                                    <div class="img-bg-inner">
                                        <h2>{{ $post->title }}</h2>
                                        <p>{!! $post->excerpt !!}</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            
                        </div>
                        <div class="custom-swiper-button-next">
                            <span class="bi-chevron-right"></span>
                        </div>
                        <div class="custom-swiper-button-prev">
                            <span class="bi-chevron-left"></span>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero Slider Section -->

    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-4">
                    @foreach($spotedPost as $post)
                    <div class="post-entry-1 lg">
                        <a href="{{ route('blog.show', $post->slug) }}" class="nav-link"><img src="storage/{{ $post->image }}"
                                alt="" class="img-fluid"></a>
                        <div class="post-meta"><span class="date">{{ $post->categories->name }}</span> <span class="mx-1">&bullet;</span>
                            <span>{{ $post->created_at->format('d M \'y') }}</span>
                        </div>
                        <h2><a href="{{ route('blog.show', $post->slug) }}" class="nav-link">{{ $post->title }}</a></h2>
                        <p class="mb-4 d-block">{!! $post->excerpt !!}</p>

                        <div class="d-flex align-items-center author">
                            <div class="photo"><img src="storage/{{ $post->author->avatar }}" alt="" class="img-fluid"></div>
                            <div class="name">
                                <h3 class="m-0 p-0">{{ $post->author->name }}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="col-lg-8">
                    <div class="row g-5">
                        {{-- left --}}
                        <div class="col-lg-4 border-start custom-border">
                            @foreach($leftPosts as $post)
                            <div class="post-entry-1">
                                <a href="{{ route('blog.show', $post->slug) }}" class="nav-link"><img
                                        src="storage/{{ $post->image }}" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">{{ $post->categories->name }}</span> <span
                                        class="mx-1">&bullet;</span> <span>{{ $post->created_at->format('d M \'y') }}</span></div>
                                <h2><a href="{{ route('blog.show', $post->slug) }}" class="nav-link">{{ $post->title }}</a>
                                </h2>
                            </div>
                            @endforeach
                        </div>
                        {{-- Right --}}
                        <div class="col-lg-4 border-start custom-border">
                            @foreach($rightPosts as $post)
                            <div class="post-entry-1">
                                <a href="{{ route('blog.show', $post->slug) }}" class="nav-link"><img
                                        src="storage/{{ $post->image }}" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">{{ $post->categories->name }}</span> <span
                                        class="mx-1">&bullet;</span> <span>{{ $post->created_at->format('d M \'y') }}</span></div>
                                <h2><a href="{{ route('blog.show', $post->slug) }}" class="nav-link">{{ $post->title }}</a></h2>
                            </div>
                            @endforeach
                        </div>
                        <!-- Trending Section -->
                        <div class="col-lg-4">

                            <div class="trending">
                                <h3>Trending</h3>
                                <ul class="trending-post">
                                    @foreach($trendingPost as $post)
                                    <li>
                                        <a href="{{ route('blog.show', $post->slug) }}" class="nav-link">
                                            <span class="number">{{ $loop->iteration }}</span>
                                            <h3>{{ $post->title }}</h3>
                                            <span class="author">{{ $post->author->name}}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div> <!-- End Trending Section -->
                    </div>
                </div>

            </div> <!-- End .row -->
        </div>
    </section> <!-- End Post Grid Section -->

    <!-- ======= Culture Category Section ======= -->
    @foreach($combinedResults as $result)
    <section class="category-section">
        <div class="container" data-aos="fade-up">

            <div class="section-header d-flex justify-content-between align-items-center mb-5">
                <h2>{{ $result['category']->name }}</h2>
                <div><a href="{{ route('blog.category', $result['category']->name) }}" class="more">See All {{ $result['category']->name }}</a></div>
            </div>

            <div class="row">
                <div class="col-md-9">

                    <div class="d-lg-flex post-entry-2">
                        <a href="{{ route('blog.show', $result['randomPost']->get(0)->slug) }}" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                            <img src="{{ url('storage/'.$result['randomPost']->get(0)->image)}}" alt="" class="img-fluid">
                        </a>
                        <div>
                            <div class="post-meta"><span class="date">{{ $result['randomPost']->get(0)->categories->name}}</span> <span class="mx-1">&bullet;</span>
                                <span>{{ $result['randomPost']->get(0)->created_at->format('d M \'y') }}</span>
                            </div>
                            <h3><a href="{{ route('blog.show', $result['randomPost']->get(0)->slug) }}" class="nav-link">{{ $result['randomPost']->get(0)->title}}</a></h3>
                            <p>{!! $result['randomPost']->get(0)->excerpt !!}
                            </p>
                            <div class="d-flex align-items-center author">
                                <div class="photo"><img src="{{ url('storage/'.$result['randomPost']->get(0)->author->avatar) }}" alt="" class="img-fluid">
                                </div>
                                <div class="name">
                                    <h3 class="m-0 p-0">{{ $result['randomPost']->get(0)->author->name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="post-entry-1 border-bottom">
                                <a href="{{ route('blog.show', $result['randomPost']->get(1)->slug) }}" class="nav-link"><img
                                        src="{{ url('storage/'.$result['randomPost']->get(1)->image)}}" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">{{ $result['randomPost']->get(1)->categories->name}}</span> <span
                                        class="mx-1">&bullet;</span> <span>{{ $result['randomPost']->get(1)->created_at->format('d M \'y') }}</span></div>
                                <h2 class="mb-2"><a href="{{ route('blog.show', $result['randomPost']->get(1)->slug) }}" class="nav-link">{{ $result['randomPost']->get(1)->title}}</a></h2>
                                <span class="author mb-3 d-block">{{ $result['randomPost']->get(1)->author->name }}</span>
                                <p class="mb-4 d-block">{!! $result['randomPost']->get(1)->excerpt !!}</p>
                            </div>

                            <div class="post-entry-1">
                                <div class="post-meta"><span class="date">{{ $result['randomPost']->get(2)->categories->name}}</span> <span
                                        class="mx-1">&bullet;</span> <span>{{ $result['randomPost']->get(2)->created_at->format('d M \'y') }}</span></div>
                                <h2 class="mb-2"><a href="{{ route('blog.show', $result['randomPost']->get(2)->slug) }}" class="nav-link">{{ $result['randomPost']->get(2)->title}}</a></h2>
                                <span class="author mb-3 d-block">{{ $result['randomPost']->get(2)->author->name }}</span>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="post-entry-1">
                                <a href="{{ route('blog.show', $result['randomPost']->get(3)->slug) }}" class="nav-link"><img
                                        src="{{ url('storage/'.$result['randomPost']->get(3)->image)}}" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">{{ $result['randomPost']->get(3)->author->name }}</span> <span
                                        class="mx-1">&bullet;</span> <span>{{ $result['randomPost']->get(3)->created_at->format('d M \'y') }}</span></div>
                                <h2 class="mb-2"><a href="{{ route('blog.show', $result['randomPost']->get(3)->slug) }}" class="nav-link">{{ $result['randomPost']->get(3)->title}}</a></h2>
                                <span class="author mb-3 d-block">{{ $result['randomPost']->get(3)->author->name }}</span>
                                <p class="mb-4 d-block">{!! $result['randomPost']->get(1)->excerpt !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    @php
                        $randomPostFrom5ToEnd = array_slice($result['randomPost']->toArray(), 4);
                    @endphp
                    @foreach ($randomPostFrom5ToEnd as $post)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">{{ $post['categories']['name'] }}</span> <span class="mx-1">&bullet;</span>
                            <span>{{ \Carbon\Carbon::parse($post['created_at'])->format('d M \'y') }}</span>
                        </div>
                        <h2 class="mb-2"><a href="{{ route('blog.show', $post['slug']) }}" class="nav-link">{{ $post['title']}}
                        </a></h2>
                        <span class="author mb-3 d-block">{{ $post['author']['name'] }}</span>
                    </div>  
                    @endforeach

                </div>
            </div>
        </div>
    </section><!-- End Culture Category Section -->
    @endforeach
</main><!-- End #main -->

@endsection