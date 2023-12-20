@extends('layouts.layout')
@section('content')
<main id="main">
    <section>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">{{ $about->title }}</h1>
                </div>
            </div>

            <div class="row mb-5">

                <div class="d-md-flex post-entry-2 half">
                    <a href="#" class="me-4 thumbnail">
                        <img src="{{ url('storage/'.$about->image) }}" alt="{{ $about->title }}" class="img-fluid">
                    </a>
                    <div class="ps-md-5 mt-4 mt-md-0">
                        <div class="post-meta mt-4">{{ $about->title }}</div>
                        {{-- <h2 class="mb-4 display-4">Company History</h2> --}}
                        {!! $about->body !!}
                    </div>
                </div>

            </div>

        </div>  
</main><!-- End #main -->

@endsection