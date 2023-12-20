<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{url('./assets/img/logo-cendekiapos.png')}}" alt="">
            <!-- <h1>CendekiaPos</h1> -->
        </a>
        @php
            $items =  menu('main_menu','_json');
        @endphp
        <nav id="navbar" class="navbar">
            <ul>
            @foreach($items as $menu)
                @if(count($menu->children) === 0)
                <li><a class="nav-link {{ $menu->url == request()->url() ? 'active' : '' }}" href="{{$menu->url}}"><span>{{ $menu->title }} </span></a>
                @else
                    @php
                        $submenu = $menu->children;
                    @endphp
                <li class="dropdown"><a href="#" class="nav-link"><span>Categories</span> <i
                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @foreach($submenu as $child)
                            <li><a href="{{$child->url}}" class="nav-link {{ $menu->url == request()->url() ? 'active' : '' }}">{{$child->title}} </a></li>
                        @endforeach
                    </ul>
                @endif
                </li>
            @endforeach
            </ul>
        </nav><!-- .navbar -->

        <div class="position-relative">
            <a href="https://twitter.com/cendekiapos" class="x"><i class="bi bi-twitter-x"
                    style="padding-right: 12px"></i></a>
            <a href="https://www.facebook.com/cendekiaposid/" class="facebook"><i class="bi bi-facebook"
                    style="padding-right: 12px"></i></a>
            <a href="https://www.instagram.com/cendekiaposid/?hl=en" class="instagram" style="padding-right: 12px"><i
                    class="bi bi-instagram"></i></a>
            <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
            <i class="bi bi-list mobile-nav-toggle"></i>

            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="{{ url('/search-result') }}" class="search-form" method="post" id="search">
                    @csrf
                    <span class="icon bi-search"></span>
                    <input type="text" placeholder="Search" name="query" class="form-control" id="searchInput">
                    <button type="submit" class="btn js-search-close"><span class="bi-x"></span></button>
                </form>
            </div><!-- End Search Form -->

        </div>

    </div>

</header><!-- End Header -->

<script>
    function handleSearchSubmit(event) {
      if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById('search').submit();
      }
    }
  
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keypress', handleSearchSubmit);
</script>