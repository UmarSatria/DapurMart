<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dk Grocery</title>

    <!-- Google Font -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>
            </ul>
            <div class="header__cart__price"><span></span></div>
        </div>
        <div class="humberger__menu__widget">
            {{-- <div class="header__top__right__auth">
                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>

            </div> --}}
        </div>

        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <!-- USERNAME -->
                <li><i class="fa fa-envelope"></i></li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <!-- USERNAME -->
                                {{-- <li><i class="fa fa-envelope"></i></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>

                            <div class="header__top__right__auth">
                                <div class="d-flex">
                                    @guest

                                    @if (Route::has('login'))
                                            <a class="mx-3"  href="{{ route('login') }}"><i class="fa fa-user"></i>{{ __('Login') }}</a>
                                    @endif

                                    @if (Route::has('register'))
                                            <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif

                                    @else
                                        <a role="button" class="mx-3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre > <i class="fa-solid fa-user"></i>
                                            {{ Auth::user()->name }}
                                        </a>

                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    @endguest

                                </div>


                                {{-- <a href="{{route('login')}}"><i class="fa fa-user"></i>Login</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href=""><img src="img/img_logo.png" alt="" width="58%"
                                height="55"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{route('grosir.index')}}">Home</a></li>
                            <li><a href="{{route('shop.index')}}">Shop</a></li>
                            <li class="active"><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    {{-- <li><a href="">Shop Details</a></li> --}}
                                    <li class="active"><a href="{{route('chart.index')}}">Shoping Cart</a></li>
                                    <li><a href="">Check Out</a></li>
                                    {{-- <li><a href="">Blog Details</a></li> --}}
                                </ul>
                            </li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="{{route('chart.index')}}"><i class="fa fa-shopping-bag"></i></a></li>
                        </ul>
                        <div class="header__cart__price"><span></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Keranjang Saya</span>
                        </div>
                        <ul>
                            <li><a href="">Total Item : </a></li>
                            <li><a href="">Total Harga : Rp. 30.000</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                                    <div class="col-lg-9">
                    @foreach ($cart as $item)
                        <a href="#" class="relative flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-md md:flex-row md:max-w-xl hover:shadow-lg dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 transition duration-300">
                            <img class="object-contain w-full h-48 md:h-full md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg ml-3 mt-2 mb-2" src="{{ asset('storage/'.$item->barang->gambar_produk) }}" alt="">
                            <div class="flex flex-col justify-between p-4 flex-grow">
                                <div>
                                    <h5 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">{{$item->barang->nama_produk}}</h5>
                                    <p class="mb-3 text-gray-700 dark:text-gray-400">Kategori : {{$item->barang->kategori->kategori}} </p>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <div class="flex items-center">
                                        <span class="text-lg font-bold text-gray-900 dark:text-white">Rp.{{$item->barang->harga_satuan}}</span>
                                    </div>
                                    <div class="flex items-center">
                                        {{-- <span class="mr-2 text-gray-700 dark:text-gray-400">Qty:</span> --}}
                                        {{-- <input type="number" class="w-16 px-2 py-1 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300" value="1"> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="absolute top-0 right-0 m-2">
                                <form action="{{route('chart.destroy',$item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="barang_id" value="{{$item->id}}">
                                    <button type="submit" class="text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500 focus:outline-none">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </a>
                        <br>

                    @endforeach
                        <!-- Tombol Checkout -->
                        <div class="mt-4">
                        <a href="" class="block w-full md:max-w-xl text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Checkout</a>
                        </div>

                </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Hero Section End -->



    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>
