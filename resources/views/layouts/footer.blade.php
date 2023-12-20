<!-- Footer Start -->
<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">

            <div class="row g-5">
                <div class="col-lg-4">
                    <h3 class="footer-heading">About CendekiaPos</h3>
                    <p>{{ Voyager::setting('site.description') }}</p>
                    <p><a href="#" class="footer-link-more">Learn More</a></p>
                </div>
                
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">Navigation</h3>
                    <ul class="footer-links list-unstyled">
                        @php
                            $items =  menu('main_menu','_json');
                        @endphp
                        @foreach($items as $menu)
                        <li><a href="{{$menu->url}}"><i class="bi bi-chevron-right"></i> {{ $menu->title }} </a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">Categories</h3>
                    <ul class="footer-links list-unstyled">
                    @foreach ($categories as $data)
                        <li><a href="{{ route('blog.category', $data->name) }}"><i class="bi bi-chevron-right"></i> {{ $data->name }}</a></li>
                    @endforeach
                    </ul>
                </div>

                <div class="col-lg-4">
                    <h3 class="footer-heading">Recent Posts</h3>

                    <ul class="footer-links footer-blog-entry list-unstyled">
                        @foreach ($recentPosts as $post)
                        <li>
                            <a href="{{ route('blog.show', $post->slug) }}" class="d-flex align-items-center">
                                <img src="{{ url('storage/'.$post->image) }}" alt="" class="img-fluid me-3">
                                <div>
                                    <div class="post-meta d-block"><span class="date">{{ $post->categories->name }}</span> <span
                                            class="mx-1">&bullet;</span> <span>{{ $post->created_at->format('d M \'y') }}</span></div>
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        </li>
                        @endforeach

                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="footer-legal">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <div class="copyright">
                        © Copyright <strong><span>CendekiaPos</span></strong>. All Rights Reserved
                    </div>

                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
                        <a href="https://twitter.com/cendekiapos" class="x"><i class="bi bi-twitter-x"></i></a>
                        <a href="https://www.facebook.com/cendekiaposid/" class="facebook"><i
                                class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/cendekiaposid/?hl=en" class="instagram"><i
                                class="bi bi-instagram"></i></a>
                        <a href="cendekiaposmedia@gmail.com" class="email"><i class="bi bi-envelope-fill"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>

                </div>

            </div>

        </div>
    </div>

</footer>
<!-- Footer End -->