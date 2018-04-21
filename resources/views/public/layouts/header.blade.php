<header>
    <div id="main-navigation">
        <div class="container">            
            <div class="logo">
                <a href="{{ URL::to('/home') }}">
                    <img src="{{ asset('/img/imdecial-main-logo.png') }}" alt="iMedical" class="full-logo">
                    <img src="{{ asset('/img/imdeical-logo-icon.png') }}" alt="iMedical" class="icon-logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="main-menu-conainer">
                    <div class="left-nav">
                        <a class="menu-item" href="{{ URL::to('/home') }}">Home</a>
                        <a class="menu-item" href="{{ URL::to('/about') }}">About</a>
                        <a class="menu-item" href="{{ URL::to('/features') }}">Features</a>
                        
                    </div>
                    <div class="right-nav">
                        <a class="menu-item" href="{{ URL::to('/faqs') }}">FAQs</a>
                        <a class="menu-item" href="{{ URL::to('/blog') }}">Blog</a>
                        @if (!Auth::user())
                            {{-- <a class="menu-item" onclick="Login.Login();return false;">Log in</a>                           --}}
                            <a class="menu-item" href="{{ URL::to('/login') }}">Log in</a>
                            {{-- <a class="menu-btn" href="{{ URL::to('/register') }}">Get started</a> --}}
                        @else
                          <a class="menu-item" href="{{ route('logout') }}">Logout</a>
                          {{-- <a class="menu-btn" href="{{ URL::to('/dashboard') }}">Get started</a> --}}
                        @endif
                    </div>
                </div>
            </div>            
            <div id="nav-icons"><span></span><span></span><span></span><span></span><span></span><span></span></div>
            <span class="left-side"></span>
            <span class="right-side"></span>
        </div>
    </div>
</header>
