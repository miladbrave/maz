<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{asset('/front/image/r1.png')}}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/front/image/r1.png')}}"/>
    <title>مبتکران آذر ذهن</title>
    <meta name="keywords" content="tabrizrobot,مبتکران آذر ذهن">
    <meta name="description"
          content="فروش قطعات و پک های رباتیک، ربات های پروازی، ربات های دانش آموزی و انواع موتور ها"/>
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
    <link rel="canonical" href="http://www.tabrizrobot.ir/"/>
    <meta name="subject" content="مبتکران آذر ذهن,robotic">
    <meta name="copyright" content="tabrizrobot,مبتکران آذر ذهن">
    <meta name="language" content="FA">
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="مبتکران آذر ذهن tabrizrobot"/>
    <meta property="og:description"
          content="فروش قطعات و پک های رباتیک، ربات های پروازی، ربات های دانش آموزی و انواع موتور ها"/>
    <meta property="og:url" content="http://tabrizrobot.ir/"/>
    <meta property="og:site_name" content="مبتکران آذر ذهن | tabrizrobot"/>

    <link rel="stylesheet" href="/front/vendor/bootstrap-4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/front/vendor/lightgallery-1.6.12/css/lightgallery.min.css">
    <link rel="stylesheet" href="/front/css/style.css">
    <link rel="stylesheet" href="/front/css/custom.css">
    <link rel="stylesheet" href="/front/vendor/fontawesome-5.6.3/css/all.min.css">
    <link rel="stylesheet" href="/front/fonts/stroyka/stroyka.css">
    {{--    <link rel="stylesheet" href="/front/css/nav.css">--}}
</head>
<body>
<div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content"></div>
    </div>
</div>
@php($navcategories = \App\Models\Category::where('type','null')->get())
@php( $maincategories = \App\Models\Category::where('type', '!=', 'null')->get())
<div class="mobilemenu">
    <div class="mobilemenu__backdrop"></div>
    <div class="mobilemenu__body">
        <div class="mobilemenu__content">
            <ul class="mobile-links mobile-links--level--0" data-collapse
                data-collapse-opened-class="mobile-links__item--open">
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a href="{{route('home')}}" class="mobile-links__item-link">خانه</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a href="" class="mobile-links__item-link">محصولات</a>
                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                <use xlink:href="/front/images/sprite.svg#arrow-rounded-down-12x7"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="mobile-links__item-sub-links" data-collapse-content>
                        <ul class="mobile-links mobile-links--level--1">
                            <li class="mobile-links__item" data-collapse-item>
                                @foreach($navcategories as $nav)
                                    <div class="mobile-links__item-title"><a href="" class="mobile-links__item-link">
                                            {{$nav->title}}</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use
                                                    xlink:href="/front/images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            @foreach($maincategories as $main)
                                                @if($main->type == $nav->title)
                                                    <li class="mobile-links__item" data-collapse-item>
                                                        <div class="mobile-links__item-title"><a
                                                                href="{{route('category',$main->title)}}"
                                                                class="mobile-links__item-link">{{$main->title}}</a>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a href="{{route('fag')}}"
                                                             class="mobile-links__item-link">سوالات شما</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a href="{{route('about')}}"
                                                             class="mobile-links__item-link">درباره ما</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a href="{{route('contact')}}"
                                                             class="mobile-links__item-link">تماس با ما</a>
                    </div>
                </li>
                @guest

                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title"><a href="{{route('login')}}"
                                                                 class="mobile-links__item-link">ورود</a>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title"><a href="{{route('register')}}"
                                                                 class="mobile-links__item-link">ثبت نام</a>
                        </div>
                    </li>
                @else
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title"><a href="" class="mobile-links__item-link text-danger">
                                {{ auth()->user()->fname . '  ' . auth()->user()->lname }}</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use
                                        xlink:href="/front/images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--2">
                                @if(auth()->user()->admin == "admin")
                                    <li class="mobile-links__item" data-collapse-item>
                                        <div class="mobile-links__item-title">
                                            <a href="{{route('administrator')}}" style="padding:5%"
                                               class="mobile-links__item-link text-warning">دشبورد</a>
                                        </div>
                                    </li>
                                @endif
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="{{route('profile')}}" style="padding:5%"
                                           class="mobile-links__item-link text-warning">پروفایل</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="mobile-links__item-title">
                                        <a class="text-warning" href="{{route('logout')}}" onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();" style="padding:5%" >خروج</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                @endguest

            </ul>
        </div>
    </div>
</div>


<div class="site">
    <header class="site__header d-lg-none">
        <div class="mobile-header mobile-header--sticky mobile-header--stuck">
            <div class="mobile-header__panel">
                <div class="container">
                    <div class="mobile-header__body">
                        <button class="mobile-header__menu-button">
                            <svg width="18px" height="14px">
                                <use xlink:href="/front/images/sprite.svg#menu-18x14"></use>
                            </svg>
                        </button>
                        <a class="mobile-header__logo" href="{{route('home')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="120px" height="20px">
                                <img src="{{asset('front/image/logo2.png')}}" alt="" style="width: 95%;margin-top: -8%">
                            </svg>
                        </a>
                        <div class="mobile-header__search">
                            <div class="col-lg-3 col-md-2 col-sm-12 col-xs-12 inner" id="app2">
                                <div id="search" class="input-group">
                                    <input id="filter_name" type="text" v-model="search" name="search"
                                           placeholder="جستجو"
                                           @keyup="change()"
                                           class="form-control input-lg search"/>
                                    <ul class="search" style="margin-top: 19%;overflow: hidden;">
                                        <li v-if="flag" v-for="pro in filteredpeoples"
                                            class="list-group-item"><a :href="/product/ + pro.slug"
                                                                       v-html="pro.name"></a>
                                        </li>
                                    </ul>
                                    <button class="mobile-header__search-button mobile-header__search-button--close"
                                            type="button">
                                        <svg width="20px" height="20px">
                                            <use xlink:href="/front/images/sprite.svg#cross-20"></use>
                                        </svg>
                                    </button>

                                </div>
                            </div>
                        </div>


                        <div class="mobile-header__indicators">
                            <div class="indicator indicator--mobile-search indicator--mobile d-sm-none">
                                <button class="indicator__button"><span class="indicator__area"><svg width="20px"
                                                                                                     height="20px"><use
                                                xlink:href="/front/images/sprite.svg#search-20"></use></svg></span>
                                </button>
                            </div>
                            <div class="indicator indicator--trigger--click">
                                <a href=""
                                   class="indicator__button">
                                            <span
                                                class="indicator__area"><svg width="20px" height="20px"><use
                                                        xlink:href="/front/images/sprite.svg#cart-20"></use></svg>
                                                @if(Session::has('cart'))
                                                    <span
                                                        class="indicator__value"> {{Session::get('cart')->totalQty}}
                                                </span>
                                                @endif
                                        </span>
                                </a>
                                <div class="indicator__dropdown">
                                    <div class="dropcart">
                                        @if(Session::has('cart'))
                                            <div class="dropcart__products-list">
                                                @foreach(Session::get('cart')->items as $product)
                                                    <div class="dropcart__product">
                                                        <div class="dropcart__product-image">
                                                            @if(isset($product['item']->photos->first()->path))
                                                                <a href="{{route('product.self',$product['item']->slug)}}">
                                                                    <img
                                                                        src="{{asset($product['item']->photos->first()->path)}}"
                                                                        alt="{{$product['item']->name}}">
                                                                </a>
                                                            @else
                                                                <a href="{{route('product.self',$product['item']->slug)}}">
                                                                    <img
                                                                        src="{{asset('front/image/pro.jpg')}}"
                                                                        alt="{{$product['item']->name}}">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="dropcart__product-info">
                                                            <div class="dropcart__product-name"><a
                                                                    href="{{route('product.self',$product['item']->slug)}}">
                                                                    {{$product['item']->name}}
                                                                </a>
                                                            </div>
                                                            <div class="dropcart__product-meta"><span
                                                                    class="dropcart__product-quantity">{{$product['qty']}}</span>
                                                                ×
                                                                <span
                                                                    class="dropcart__product-price">{{$product['item']->price}} ریال</span>
                                                            </div>
                                                        </div>
                                                        <button type="button"
                                                                class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                                            <svg width="10px" height="10px">
                                                                <use
                                                                    xlink:href="/front/images/sprite.svg#cross-10"></use>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="dropcart__totals">
                                                <table>
                                                    <tr>
                                                        <th>جمع کل</th>
                                                        <td>{{number_format(Session::get('cart')->totalPurePrice)}}
                                                            ریال
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>تخفیف</th>
                                                        <td>{{number_format(Session::get('cart')->totalDiscountPrice)}}
                                                            ریال
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>جمع کل</th>
                                                        <td>{{number_format(Session::get('cart')->totalPrice)}}
                                                            ریال
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="dropcart__buttons"><a class="btn btn-secondary"
                                                                              href="{{route('cart.self')}}">مشاهده
                                                    سبد</a> <a
                                                    class="btn btn-primary" href="{{route('checkout')}}">پرداخت</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header class="site__header d-lg-block d-none">
        <div class="site-header">
            <div class="site-header__topbar topbar">
                <div class="topbar__container container">
                    <div class="topbar__row">
                        <span> <i class="fa fa-phone text-danger"> </i> 09364113060</span>
                        <span> <i class="fa fa-envelope text-danger mr-3"> </i> MazTabriz@Gmail.com</span>
                        <span class="mr-4 text-danger"> |</span>
                        <a href="https://www.instagram.com/tabrizrobot.ir/"> <i class="fab fa-instagram text-danger mr-3" aria-hidden="true"> </i></a>
                        <a href="https://t.me/TabrizRobotSupport"> <i class="fab fa-telegram mr-3" aria-hidden="true"> </i></a>
                        <a href="https://wa.me/message/GTZGGPWARSS7M1"> <i class="fab fa-whatsapp text-success mr-3" aria-hidden="true"> </i></a>
                        <div class="topbar__spring"></div>
                        <div class="topbar__item">
                            <div class="topbar-dropdown">
                                @guest
                                    <ul class="menu menu--layout--topbar" style="display: inline">
                                        <li style="display: inline-block"><a href="{{route('register')}}">ثبت نام</a>
                                        </li>
                                        |
                                        <li style="display: inline-block"><a href="{{route('login')}}">ورود</a></li>
                                    </ul>
                                @else
                                    <button class="topbar-dropdown__btn text-danger"
                                            type="button">{{ auth()->user()->fname . '  ' . auth()->user()->lname }}
                                        <svg width="7px" height="5px">
                                            <use xlink:href="/front/images/sprite.svg#arrow-rounded-down-7x5"></use>
                                        </svg>
                                    </button>
                                    <div class="topbar-dropdown__body" style="background-color: rgba(0,0,0,0.5)">
                                        <ul class="menu menu--layout--topbar">
                                            @if(auth()->user()->admin == "admin")
                                                <li><a class="text-white" href="{{route('administrator')}}">دشبورد</a></li>
                                            @endif
                                            <li><a class="text-white" href="{{route('profile')}}">پروفایل</a></li>
                                            <li><a class="text-white" href="{{route('logout')}}" onclick="event.preventDefault();
                                                                                     document.getElementById('logout-form').submit();">خروج</a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>

                                @endguest
                            </div>
                        </div>
                        <div class="topbar__item">
                        </div>
                        <div class="topbar__item">
                            <div class="topbar-dropdown">
                                <div class="topbar-dropdown__body">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-header__nav-panel mb-3">
                <div class="nav-panel">
                    <div class="nav-panel__container container">
                        <div class="nav-panel__row">
                            <div class="nav-panel__logo" style="width: 22%">
                                <a href="{{route('home')}}">
                                    <img src="{{asset('front/image/logo2.png')}}" alt="" style="width: 90%">
                                </a>
                            </div>
                            <div class="nav-panel__nav-links nav-links">
                                <ul class="nav-links__list">
                                    <li class="nav-links__item nav-links__item--with-submenu"><a
                                            href="{{route('home')}}"><span>خانه <svg class="nav-links__arrow"
                                                                                     width="9px"
                                                                                     height="6px">
                                                </svg></span></a>
                                    </li>
                                    <li class="nav-links__item nav-links__item--with-submenu"><a href=""><span>محصولات<svg
                                                    class="nav-links__arrow" width="9px" height="6px"><use
                                                        xlink:href="/front/images/sprite.svg#arrow-rounded-down-9x6"></use></svg></span></a>
                                        <div class="nav-links__megamenu nav-links__megamenu--size--nl">
                                            <div class="megamenu">
                                                <div class="row">
                                                    @foreach($navcategories as $nav)
                                                        <div class="col-md-3">
                                                            <ul class="megamenu__links megamenu__links--level--0">
                                                                <li class="megamenu__item megamenu__item--with-submenu">
                                                                    <a href="">{{$nav->title}}</a>
                                                                    <ul class="megamenu__links megamenu__links--level--1">
                                                                        @foreach($maincategories as $main)
                                                                            @if($main->type == $nav->title)
                                                                                <li class="megamenu__item"><a
                                                                                        href="{{route('category',$main->title)}}">{{$main->title}}</a>
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-links__item nav-links__item--with-submenu"><a
                                            href="{{route('fag')}}"><span>سوالات شما <svg class="nav-links__arrow"
                                                                                          width="9px" height="6px"><use
                                                        xlink:href="/front/images/sprite.svg#arrow-rounded-down-9x6"></use></svg></span></a>
                                    </li>
                                    <li class="nav-links__item nav-links__item--with-submenu"><a
                                            href="{{route('about')}}"><span> درباره ما <svg class="nav-links__arrow"
                                                                                            width="9px" height="6px"><use
                                                        xlink:href="/front/images/sprite.svg#arrow-rounded-down-9x6"></use></svg></span></a>
                                    </li>
                                    <li class="nav-links__item nav-links__item--with-submenu"><a
                                            href="{{route('contact')}}"><span> تماس با ما <svg class="nav-links__arrow"
                                                                                               width="9px" height="6px"><use
                                                        xlink:href="/front/images/sprite.svg#arrow-rounded-down-9x6"></use></svg></span></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-md-2 col-sm-12 col-xs-12 inner" id="app" style="z-index: 0">
                                <div id="search" class="input-group">
                                    <input id="filter_name" type="text" v-model="search" name="search"
                                           placeholder="جستجو"
                                           @keyup="change()"
                                           class="form-control input-lg search"/>
                                    <ul class="search" style="margin-top: 19%;overflow: hidden">
                                        <li v-if="flag" v-for="pro in filteredpeoples"
                                            class="list-group-item"><a :href="/product/ + pro.slug"
                                                                       v-html="pro.name"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="indicator indicator--trigger--click">
                                <a href="cart.html"
                                   class="indicator__button">
                                            <span
                                                class="indicator__area"><svg width="20px" height="20px"><use
                                                        xlink:href="/front/images/sprite.svg#cart-20"></use></svg>
                                                @if(Session::has('cart'))
                                                    <span
                                                        class="indicator__value"> {{Session::get('cart')->totalQty}}
                                                </span>
                                                @endif
                                        </span>
                                </a>
                                <div class="indicator__dropdown">
                                    <!-- .dropcart -->
                                    <div class="dropcart">
                                        @if(Session::has('cart'))
                                            <div class="dropcart__products-list">
                                                @foreach(Session::get('cart')->items as $product)
                                                    <div class="dropcart__product">
                                                        <div class="dropcart__product-image">
                                                            @if(isset($product['item']->photos->first()->path))
                                                                <a href="{{route('product.self',$product['item']->slug)}}">
                                                                    <img
                                                                        src="{{asset($product['item']->photos->first()->path)}}"
                                                                        alt="{{$product['item']->name}}">
                                                                </a>
                                                            @else
                                                                <a href="{{route('product.self',$product['item']->slug)}}">
                                                                    <img
                                                                        src="{{asset('front/image/pro.jpg')}}"
                                                                        alt="{{$product['item']->name}}">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="dropcart__product-info">
                                                            <div class="dropcart__product-name"><a
                                                                    href="{{route('product.self',$product['item']->slug)}}">
                                                                    {{$product['item']->name}}
                                                                </a>
                                                            </div>
                                                            <div class="dropcart__product-meta"><span
                                                                    class="dropcart__product-quantity">{{$product['qty']}}</span>
                                                                <span
                                                                    class="dropcart__product-price">{{$product['item']->price}} ریال</span>
                                                            </div>
                                                        </div>
                                                        <a href="{{route('remove.product',$product['item'])}}" type="button"
                                                                class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                                            <svg width="10px" height="10px">
                                                                <use
                                                                    xlink:href="/front/images/sprite.svg#cross-10"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="dropcart__totals">
                                                <table>
                                                    <tr>
                                                        <th>جمع کل</th>
                                                        <td>{{number_format(Session::get('cart')->totalPurePrice)}}
                                                            ریال
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>تخفیف</th>
                                                        <td>{{number_format(Session::get('cart')->totalDiscountPrice)}}
                                                            ریال
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>جمع کل</th>
                                                        <td>{{number_format(Session::get('cart')->totalPrice)}}
                                                            ریال
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="dropcart__buttons"><a class="btn btn-secondary"
                                                                              href="{{route('cart.self')}}">مشاهده
                                                    سبد</a> <a
                                                    class="btn btn-primary" href="{{route('checkout')}}">پرداخت</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </header>
    @section('js2')
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.9/vue.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script>
            new Vue({
                el: '#app',
                data: {
                    search: '',
                    products: [],
                    flag: false,
                },
                mounted() {
                    axios.post('/api/searchProducts').then(res => {
                        this.products = res.data.products;
                    }).catch(err => {
                        console.log(err)
                    })
                },
                computed: {
                    filteredpeoples: function () {
                        var self = this;
                        return self.products.filter(function (product) {
                            return product.name.indexOf(self.search) > -1
                        });
                    }
                },
                methods: {
                    change: function () {
                        if (this.search.length) {
                            this.flag = true;
                        }
                        if (this.search.length < 1) {
                            this.flag = false
                        }
                    }
                }
            });
        </script>

        <script>
            new Vue({
                el: '#app2',
                data: {
                    search: '',
                    products: [],
                    flag: false,
                },
                mounted() {
                    axios.post('/api/searchProducts').then(res => {
                        this.products = res.data.products;
                    }).catch(err => {
                        console.log(err)
                    })
                },
                computed: {
                    filteredpeoples: function () {
                        var self = this;
                        return self.products.filter(function (product) {
                            return product.name.indexOf(self.search) > -1
                        });
                    }
                },
                methods: {
                    change: function () {
                        if (this.search.length) {
                            this.flag = true;
                        }
                        if (this.search.length < 1) {
                            this.flag = false
                        }
                    }
                }
            });
        </script>

@endsection
