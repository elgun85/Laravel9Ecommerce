<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
            Zay
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category')}}">All Category</a>
                    </li>
{{--                    <li class="nav-item">
                        <a class="nav-link" href="{{route('elgun')}}">elgun</a>
                    </li>--}}

                    <li class="nav-item">
                        <a class="nav-link" href="shop.html">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('orders')}}">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('test_index')}}">Test</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                    <i class="fa fa-fw fa-search text-dark mr-2"></i>
                </a>
                <a class="nav-icon position-relative text-decoration-none" href="{{route('cardlist')}}">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                        <livewire:frontend.cart.cart-count/>
                    </span>
                </a>


                <a class="nav-icon position-relative text-decoration-none" href="{{route('wishlistIndex')}}">
                    <i class="far fa-heart text-dark mr-5"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                        <livewire:frontend.wishlist.whishlist-count/>
                    </span>
                </a>



{{--                @if (Route::has('login'))
                    @auth
                        <a class="nav-icon position-relative text-decoration-none" href="{{route('wishlistIndex')}}">
                            <i class="far fa-heart text-dark mr-5"></i>
                            <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                        </a>
                    @else
                        <a class="nav-icon position-relative text-decoration-none"
                           onclick="alert('Please go to login')" href="#">

                            <i class="far fa-heart text-dark mr-5"></i>
                            <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                        </a>
                    @endauth
                @endif--}}



                {{--<i class="far fa-heart"> wislist()</i>--}}



                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            @if(Auth::user()->type == 'admin')
                                <a href="{{ route('dashboard') }}" class="btn btn-outline-light text-sm text-gray-700 dark:text-gray-500 underline"
                                   style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Dashboard</a>



                                <a href="{{ route('logout') }}" class="btn btn-outline-light text-sm text-gray-700 dark:text-gray-500 underline"
                                   style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                ><i class="mdi mdi-logout text-primary"></i>   {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endif

                                @if(Auth::user()->type == 'user')
                                    <a href="{{ route('logout') }}" class="btn btn-outline-light text-sm text-gray-700 dark:text-gray-500 underline"
                                       style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    ><i class="mdi mdi-logout text-primary"></i>   {{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @endif

                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light text-sm text-gray-700 dark:text-gray-500 underline"
                               style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-light ml-4 text-sm text-gray-700 dark:text-gray-500 underline"
                                   style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif


            </div>
        </div>

    </div>
</nav>
<!-- Close Header -->

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

