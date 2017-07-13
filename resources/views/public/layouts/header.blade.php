<header>
    <div id="main-navigation">
        <div class="container">
            <div class="left-nav">
                <a class="menu-item" href="{{ URL::to('/home') }}">Home</a>
                <a class="menu-item" href="{{ URL::to('/features') }}">Features</a>
                <a class="menu-item" href="{{ URL::to('/faqs') }}">FAQs</a>
            </div>
            <div class="logo">
                <a href="{{ URL::to('/home') }}">
                    <img src="{{ asset('/img/imdecial-main-logo.png') }}" alt="iMedical">
                </a>
            </div>
            <div class="right-nav">
                <a class="menu-item" href="{{ URL::to('/blog') }}">Blog</a>
                <a class="menu-item" href="#">Log in</a>
                <a class="menu-btn" href="#">Get started</a>
            </div>
        </div>
    </div>
</header>
