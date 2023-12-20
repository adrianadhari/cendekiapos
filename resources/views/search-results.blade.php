@extends('layouts.layout')
@section('content')
<main id="main">

  <!-- ======= Search Results ======= -->
  <section id="search-result" class="search-result">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <h3 class="category-title">Search Results</h3>
          @foreach($results as $post)
          <div class="d-md-flex post-entry-2 small-img">
            <a href="{{ route('blog.show', $post->slug) }}" class="me-4 thumbnail">
              <img src="{{ url('storage/'. $post->image) }}" alt="" class="img-fluid">
            </a>
            <div>
              <div class="post-meta"><span class="date">{{ $post->categories->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ $post->created_at->format('d M \'y') }}</span></div>
              <h3><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h3>
              <p>{!! $post->excerpt !!}</p>
              <div class="d-flex align-items-center author">
                <div class="photo"><img src="{{ url('storage/'. $post->author->avatar) }}" alt="" class="img-fluid"></div>
                <div class="name">
                  <h3 class="m-0 p-0">{{ $post->author->name }}</h3>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <!-- Paging -->
          <div class="text-start py-4">
            <div class="custom-pagination">
                {{-- Previous Page Link --}}
                @if ($results->onFirstPage())
                    <a href="#" class="prev disabled">Previous</a>
                @else
                    <a href="{{ $news->previousPageUrl() }}" class="prev">Previous</a>
                @endif
        
                {{-- Pagination Elements --}}
                @for ($i = 1; $i <= $results->lastPage(); $i++)
                    @if ($i == $results->currentPage())
                        <a href="#" class="active">{{ $i }}</a>
                    @else
                        <a href="{{ $results->url($i) }}">{{ $i }}</a>
                    @endif
                @endfor
        
                {{-- Next Page Link --}}
                @if ($results->hasMorePages())
                    <a href="{{ $results->nextPageUrl() }}" class="next">Next</a>
                @else
                    <a href="#" class="next disabled">Next</a>
                @endif
            </div>
        </div>

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

      </div>
      </div>
    </div>
  </section> <!-- End Search Result -->

</main><!-- End #main -->

@endsection