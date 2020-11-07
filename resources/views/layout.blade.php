<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'BeautyWine') }}</title>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500&display=swap" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <!-- Font Awsome -->
        <script src="https://kit.fontawesome.com/807899bdcd.js" crossorigin="anonymous"></script>
        <!-- Custom Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('extra-header')
        <style>
            .search-bar-container{
                position: relative;
            }
            .search-bar{
                width: 35px;
                border: rgb(193,193,193) solid 1px;
                border-radius: 500px;
                position: relative;
                display: flex;
                justify-content: end;
                transition: width 300ms ease-in-out;
                overflow: hidden;
            }
            .search-bar:focus-within{
                width: 250px;
            }
            .search-bar:focus-within .search-bar__input{
                cursor: initial;
                opacity: 1;
            }
            .search-bar__input{
                font-size: 1.1rem;
                background: none;
                opacity: .5;
                border: none;
                position: absolute;
                top: 0;
                bottom: 0;
                right: 0;
                opacity: 0;
                cursor: pointer;
            }
            .search-bar__input::placeholder{
                color: rgb(193,193,193);
                font-size: 1rem;
            }
            .search-bar__submit{
                font-size: .6rem;
                width: 35px;
                height: 35px;
                border-radius: 50%;
                border: none;
                background: none;
                padding: 2px 0px 0px -1px;
                margin-right: auto;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <header>
                <nav class="ro-navbar navbar navbar-expand-lg navbar-light">
                    <!-- Burger Menu -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Logo -->
                    <div class="logo-container">
                        <a href="{{ route('home') }}">
                            <img src="https://www.woodcraftsaustralia.com/wp-content/uploads/2020/08/Woodcrafts-Australia-Logo-2-1.png" style="width: 170px; height: 100px; object-fit: cover;">
                        </a>
                    </div>
                    <!-- Cart Icon Mobile -->
                    <span class="cart-btn d-lg-none">
                        <a style="position: relative" href="{{ route('cart.index') }}">
                            <i style="font-size: 1.1rem; color: rgb(52,58,64); margin-right: 15px" class="fas fa-shopping-bag"></i>
                            <span class="cart-count" style="position: absolute; color: rgb(52,58,64); font-size: .9rem; top: 2px; line-height: 13px; left:-18px; width:17px; text-align: center; border: rgb(52,58,64) 2px solid; border-radius: 5px">{{ App\Http\Controllers\CartController::getItemQty() }}</span>
                        </a>
                    </span>
                    <div class="ro-collapse collapse navbar-collapse ro-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/dashboard/index.php' ? 'active': ''?>">
                                <a class="nav-link" href="{{route('home')}}">HOME <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/dashboard/contact.php' ? 'active': ''?>">
                                <a class="nav-link" href="{{route('store')}}">TOP SALE</a>
                            </li>
                            <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/dashboard/contact.php' ? 'active': ''?>">
                                <a class="nav-link" href="{{route('contact')}}">CONTACT US</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0 d-lg-none">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
                        </form>    
                    </div>
                    <!-- Search & Cart (> 992px)-->
                    <div class="navbar__tool d-none d-lg-flex">
                        <div class="search-bar-container">
                            <div class="search-bar">
                                <button class="search-bar__submit"><i class="fas fa-search search-btn" style="font-size: 1.3rem;"></i></button>
                                <input type="text" class="search-bar__input" placeholder="Search" aria-label="search">
                            </div>
                        </div>
                        <span class="cart-btn">
                            <a style="position: relative;" href="{{ route('cart.index') }}">
                                <i style="font-size: 1.4rem; color: rgb(52,58,64); margin-right: 15px" class="fas fa-shopping-bag"></i>
                                <span class="cart-count" style="color: white; background-color: rgb(52,58,64); font-size: .9rem; top:-12px; line-height: 14px; position: absolute; left: 16px; width: 18px; text-align: center; border: rgb(52,58,64) 2px solid; border-radius: 50%">{{ App\Http\Controllers\CartController::getItemQty() }}</span>
                            </a>
                        </span>
                    </div>
                </nav>
            </header>
            <main>
                @yield('content')
            </main>
            <div class="container-fluid" style="width: 100vw; background: rgb(52,58,64); color: white">
                <div class="row p-md-5 pt-md-3" style="font-size: 1.3rem; font-weight: 200">
                    <div class="col-8 col-md-4 d-flex flex-column pt-4 p-md-0">
                        <img  class="pb-md-4" style="width: 80%; max-width: 300px; margin-left: -10px" src="{{asset('pic/logo2.png')}}">
                        <h3 class="pb-md-3">We Support</h3>
                        <img style="width: 80%; max-width: 250px" src="{{asset('pic/method.png')}}">
                    </div>
                    <div class="col-12 col-md-3 d-flex flex-column pt-5 p-md-0 pt-md-2">
                        <h3 class="pb-md-4">Support</h3>
                        <span class="pb-md-2">FAQs</span>
                        <span class="pb-md-2">Delivery & returns</span>
                        <span class="pb-md-2">Privacy policy</span>
                        <span>Terms of Services</span>
                    </div>
                    <div class="col-12 col-md-3 d-flex flex-column pt-3 p-md-0 pt-md-2">
                        <h3 class="pb-md-4">Contact Us</h3>
                        <span>Email:</span>
                        <span class="pb-md-4">help@beatywine.com</span>
                        <span>Call Us:</span>
                        <span>61 111 222 333</span>
                    </div>
                    <div class="col-12 col-md-2 d-flex flex-column pt-3 p-md-0 pt-md-2">
                        <h3>Folow Us</h3>
                        <div style="font-size: 2.5rem">
                            <span><i class="fab fa-facebook"></i></span>
                            <span><i class="fab fa-instagram"></i></span>
                        </div>
                        <img style="width: 100%; max-width: 250px" src="{{asset('pic/review.png')}}">
                    </div>
                </div>
            </div>
        </div>
        @yield('extra-footer')   
    </body>
</html>