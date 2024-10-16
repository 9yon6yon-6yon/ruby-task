<nav class="navbar navbar-expand-lg navbar-light main_box">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand logo_h" href="{{ url('/') }}"><img src="{{ asset('frontend/assets/img/logo.png') }}"
                alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                        aria-haspopup="true" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('showproducts') }}">Shop Category</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                        aria-haspopup="true" aria-expanded="false">Blog</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a href="{{ route('cart.view') }} " class="cart"><span class="ti-bag"></span></a>
                </li>
                <li class="nav-item">
                    <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                </li>
            </ul>
        </div>
    </div>
</nav>
