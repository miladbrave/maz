@extends('front.layouts.master')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success container mt-3" style="width: 100%">
            <div>{{ Session('success') }}</div>
        </div>
    @endif
    <div class="block-slideshow block-slideshow--layout--full block" style="z-index: 0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="block-slideshow__body">
                        <div class="owl-carousel slide">
                            @foreach($sliders->where('number','ویژه') as $slider)
                                <div class="item slider_img"><a href="{{$slider->link}}">
                                        @if(isset($slider->photo()->first()->path))
                                            <img class="img-responsive"
                                                 src="{{asset($slider->photo()->first()->path)}}"
                                                 alt="banner 2"/>
                                        @endif
                                    </a></div>
                            @endforeach
                            @foreach($sliders->where('number',1) as $slider)
                                <div class="item slider_img"><a href="{{$slider->link}}">
                                        @if(isset($slider->photo()->first()->path))
                                            <img class="img-responsive"
                                                 src="{{asset($slider->photo()->first()->path)}}"
                                                 alt="banner 2"/>
                                        @endif
                                    </a></div>
                            @endforeach
                            @foreach($sliders->where('number',2) as $slider)
                                <div class="item slider_img"><a href="{{$slider->link}}">
                                        @if(isset($slider->photo()->first()->path))
                                            <img class="img-responsive"
                                                 src="{{asset($slider->photo()->first()->path)}}"
                                                 alt="banner 2"/>
                                        @endif
                                    </a></div>
                            @endforeach
                            @foreach($sliders->where('number',3) as $slider)
                                <div class="item slider_img"><a href="{{$slider->link}}">
                                        @if(isset($slider->photo()->first()->path))
                                            <img class="img-responsive"
                                                 src="{{asset($slider->photo()->first()->path)}}"
                                                 alt="banner 2"/>
                                        @endif
                                    </a></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block block-features block-features--layout--boxed">
        <div class="container">
            <div class="block-features__list">
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <svg width="48px" height="48px">
                            <use xlink:href="/front/images/sprite.svg#fi-free-delivery-48"></use>
                        </svg>
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">ارسال سریع</div>
                        {{--                        <div class="block-features__subtitle">لورم ایپسوم متن ساختگی</div>--}}
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <svg width="48px" height="48px">
                            <use xlink:href="/front/images/sprite.svg#fi-24-hours-48"></use>
                        </svg>
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">پشتیبانی قدرتمند</div>
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <svg width="48px" height="48px">
                            <use xlink:href="/front/images/sprite.svg#fi-payment-security-48"></use>
                        </svg>
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">تنوع در انتخاب نحوه ارسال</div>
                        {{--                        <div class="block-features__subtitle">پرداخت های امن</div>--}}
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <svg width="48px" height="48px">
                            <use xlink:href="/front/images/sprite.svg#fi-tag-48"></use>
                        </svg>
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">سوالات علمی خود را بپرسید</div>
                        {{--                        <div class="block-features__subtitle">تخفیف تا 90%</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block block-products-carousel" data-layout="grid-4">
        <div class="container">
            <div class="block-header vitrine">
                <h3 class="block-header__title">محصولات ویژه</h3>
                <div class="block-header__divider"></div>
                <ul class="nav nav-pills mb-3 block-header__groups-list" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"
                           id="pills-motor-tab" data-toggle="pill"
                           href="#pills-motor" role="tab"
                           aria-controls="pills-motor" aria-selected="true">موتور ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-mechanic-tab" data-toggle="pill"
                           href="#pills-mechanic" role="tab"
                           aria-controls="pills-mechanic" aria-selected="false">سازه های مکانیکی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-robotic-tab" data-toggle="pill"
                           href="#pills-robotic" role="tab"
                           aria-controls="pills-robotic" aria-selected="false">بسته های رباتیک</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-fly-tab" data-toggle="pill" href="#pills-fly"
                           role="tab"
                           aria-controls="pills-fly" aria-selected="false">پروازی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-other-tab" data-toggle="pill"
                           href="#pills-other" role="tab"
                           aria-controls="pills-other" aria-selected="false">سایر موارد</a>
                    </li>
                </ul>
            </div>

            <div class="block-products-carousel__slider">
                <div class="block-products-carousel__preloader"></div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-motor" role="tabpanel"
                         aria-labelledby="pills-motor-tab">
                        <div class="owl-carousel">
                            @if(isset($products))
                                @foreach($products->where('type','3') as $product)
                                    <div class="block-products-carousel__column">
                                        <div class="block-products-carousel__cell">
                                            <div class="product-card">
                                                @if($product->photos->first()->path)
                                                    <div class="product-card__image">
                                                        <a href="{{route('product.self',$product->slug)}}"><img
                                                                style="height: 160px"
                                                                src="{{asset($product->photos->first()->path)}}"
                                                                alt="{{$product->name}}"></a>
                                                    </div>
                                                @else
                                                    <div class="product-card__image">
                                                        <a href="{{route('product.self',$product->slug)}}"><img
                                                                src="{{asset('/front/image/pro.jpg')}}"
                                                                alt="{{$product->name}}"></a>
                                                    </div>
                                                @endif
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a
                                                            href="{{route('product.self',$product->slug)}}">
                                                            {{$product->name}}
                                                        </a></div>
                                                </div>
                                                <div class="product-card__actions">
                                                    @if($product->exist)
                                                        @if($product->discount)
                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <div class="old_price"
                                                                         style="font-size: 15px"> {{number_format($product->price)}}
                                                                        ریال
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 text-center">
                                                                    <div class="product__prices"
                                                                         style="font-size: 20px"> {{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}}
                                                                        ریال
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="product__prices"
                                                                 style="font-size: 25px"> {{number_format($product->price)}}
                                                                ریال
                                                            </div>
                                                        @endif
                                                        <div class="product-card__buttons">
                                                            @if($product->exist == 1 && $product->count >0)
                                                                <a href="{{route('add.cart',$product->slug)}}"
                                                                   class="btn btn-primary product-card__addtocart"
                                                                   type="button">
                                                                    افزودن به
                                                                    سبد
                                                                </a>
                                                            @else
                                                                <span class="text-danger">عدم موجودی</span>
                                                            @endif
                                                        </div>
                                                    @else
                                                        <span class="text-danger">عدم موجودی</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-mechanic" role="tabpanel" aria-labelledby="pills-mechanic-tab">
                        <div class="owl-carousel">
                            @if(isset($products))
                                @foreach($products->where('type','2') as $product)
                                    <div class="product-card">
                                        @if($product->photos->first()->path)
                                            <div class="product-card__image">
                                                <a href="{{route('product.self',$product->slug)}}"><img
                                                        style="height: 160px"
                                                        src="{{asset($product->photos->first()->path)}}"
                                                        alt="{{$product->name}}"></a>
                                            </div>
                                        @else
                                            <div class="product-card__image">
                                                <a href="{{route('product.self',$product->slug)}}"><img
                                                        src="{{asset('/front/image/pro.jpg')}}"
                                                        alt="{{$product->name}}"></a>
                                            </div>
                                        @endif
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a
                                                    href="{{route('product.self',$product->slug)}}">
                                                    {{$product->name}}
                                                </a></div>
                                        </div>
                                        <div class="product-card__actions">
                                            @if($product->exist)
                                                @if($product->discount)
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <div class="old_price text-center"
                                                                 style="font-size: 15px"> {{number_format($product->price)}}
                                                                ریال
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-center">
                                                            <div
                                                                class="product__prices"
                                                                style="font-size: 20px"> {{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}}
                                                                ریال
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="product__prices"
                                                         style="font-size: 25px"> {{number_format($product->price)}}
                                                        ریال
                                                    </div>
                                                @endif
                                                <div class="product-card__buttons">
                                                    @if($product->exist == 1 && $product->count >0)
                                                        <a href="{{route('add.cart',$product->slug)}}"
                                                           class="btn btn-primary product-card__addtocart"
                                                           type="button">
                                                            افزودن به
                                                            سبد
                                                        </a>
                                                    @else
                                                        <span class="text-danger">عدم موجودی</span>
                                                    @endif
                                                </div>
                                            @else
                                                <span class="text-danger">عدم موجودی</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-robotic" role="tabpanel" aria-labelledby="pills-robotic-tab">
                        <div class="owl-carousel">
                            @if(isset($products))
                                @foreach($products->where('type','1') as $product)
                                    <div class="product-card">
                                        @if($product->photos->first()->path)
                                            <div class="product-card__image">
                                                <a href="{{route('product.self',$product->slug)}}"><img
                                                        style="height: 160px"
                                                        src="{{asset($product->photos->first()->path)}}"
                                                        alt="{{$product->name}}"></a>
                                            </div>
                                        @else
                                            <div class="product-card__image">
                                                <a href="{{route('product.self',$product->slug)}}"><img
                                                        src="{{asset('/front/image/pro.jpg')}}"
                                                        alt="{{$product->name}}"></a>
                                            </div>
                                        @endif
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a
                                                    href="{{route('product.self',$product->slug)}}">
                                                    {{$product->name}}
                                                </a></div>
                                        </div>
                                        <div class="product-card__actions">
                                            @if($product->exist)
                                                @if($product->discount)
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <div class="old_price"
                                                                 style="font-size: 15px"> {{number_format($product->price)}}
                                                                ریال
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-center">
                                                            <div
                                                                class="product__prices"
                                                                style="font-size: 20px"> {{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}}
                                                                ریال
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="product__prices"
                                                         style="font-size: 25px"> {{number_format($product->price)}}
                                                        ریال
                                                    </div>
                                                @endif
                                                <div class="product-card__buttons">
                                                    @if($product->exist == 1 && $product->count >0)
                                                        <a href="{{route('add.cart',$product->slug)}}"
                                                           class="btn btn-primary product-card__addtocart"
                                                           type="button">
                                                            افزودن به
                                                            سبد
                                                        </a>
                                                    @else
                                                        <span class="text-danger">عدم موجودی</span>
                                                    @endif
                                                </div>
                                            @else
                                                <span class="text-danger">عدم موجودی</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-fly" role="tabpanel" aria-labelledby="pills-fly-tab">
                        <div class="owl-carousel">
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    @if(isset($products))
                                        @foreach($products->where('type','4') as $product)
                                            <div class="product-card">
                                                @if($product->photos->first()->path)
                                                    <div class="product-card__image">
                                                        <a href="{{route('product.self',$product->slug)}}"><img
                                                                style="height: 160px"
                                                                src="{{asset($product->photos->first()->path)}}"
                                                                alt="{{$product->name}}"></a>
                                                    </div>
                                                @else
                                                    <div class="product-card__image">
                                                        <a href="{{route('product.self',$product->slug)}}"><img
                                                                src="{{asset('/front/image/pro.jpg')}}"
                                                                alt="{{$product->name}}"></a>
                                                    </div>
                                                @endif
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a
                                                            href="{{route('product.self',$product->slug)}}">
                                                            {{$product->name}}
                                                        </a></div>
                                                </div>
                                                <div class="product-card__actions">
                                                    @if($product->exist)
                                                        @if($product->discount)
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="old_price text-center"
                                                                         style="font-size: 15px"> {{number_format($product->price)}}
                                                                        ریال
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div
                                                                        class="product__prices text-center"
                                                                        style="font-size: 20px"> {{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}}
                                                                        ریال
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="product__prices"
                                                                 style="font-size: 25px"> {{number_format($product->price)}}
                                                                ریال
                                                            </div>
                                                        @endif
                                                        <div class="product-card__buttons">
                                                            @if($product->exist == 1 && $product->count >0)
                                                                <a href="{{route('add.cart',$product->slug)}}"
                                                                   class="btn btn-primary product-card__addtocart"
                                                                   type="button">
                                                                    افزودن به
                                                                    سبد
                                                                </a>
                                                            @else
                                                                <span class="text-danger">عدم موجودی</span>
                                                            @endif
                                                        </div>
                                                    @else
                                                        <span class="text-danger">عدم موجودی</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-other" role="tabpanel" aria-labelledby="pills-other-tab">
                        <div class="owl-carousel">
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    @if(isset($products))
                                        @foreach($products->where('type','5') as $product)
                                            <div class="product-card">
                                                @if($product->photos->first()->path)
                                                    <div class="product-card__image">
                                                        <a href="{{route('product.self',$product->slug)}}"><img
                                                                style="height: 160px"
                                                                src="{{asset($product->photos->first()->path)}}"
                                                                alt="{{$product->name}}"></a>
                                                    </div>
                                                @else
                                                    <div class="product-card__image">
                                                        <a href="{{route('product.self',$product->slug)}}"><img
                                                                src="{{asset('/front/image/pro.jpg')}}"
                                                                alt="{{$product->name}}"></a>
                                                    </div>
                                                @endif
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a
                                                            href="{{route('product.self',$product->slug)}}">
                                                            {{$product->name}}
                                                        </a></div>
                                                </div>
                                                <div class="product-card__actions">
                                                    @if($product->exist)
                                                        @if($product->discount)
                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <div class="old_price"
                                                                         style="font-size: 15px"> {{number_format($product->price)}}
                                                                        ریال
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 text-center">
                                                                    <div
                                                                        class="product__prices"
                                                                        style="font-size: 20px"> {{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}}
                                                                        ریال
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="product__prices"
                                                                 style="font-size: 25px"> {{number_format($product->price)}}
                                                                ریال
                                                            </div>
                                                        @endif
                                                        <div class="product-card__buttons">
                                                            @if($product->exist == 1 && $product->count >0)
                                                                <a href="{{route('add.cart',$product->slug)}}"
                                                                   class="btn btn-primary product-card__addtocart"
                                                                   type="button">
                                                                    افزودن به
                                                                    سبد
                                                                </a>
                                                                <strong> در انبار : </strong><span
                                                                    class="text-danger">{{$product->count}}</span>
                                                            @else
                                                                <span class="text-danger">عدم موجودی</span>
                                                            @endif
                                                        </div>
                                                    @else
                                                        <span class="text-danger">عدم موجودی</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="block block-banner">
        <div class="container">
            @foreach($banners->where('number',1) as $banner)
                <a href="{{$banner->link}}" class="block-banner__body">
                    <div class="block-banner__image block-banner__image--desktop"
                         style="background-image: url('{{($banner->photo->path)}}')"></div>
                    <div class="block-banner__image block-banner__image--mobile"
                         style="background-image: url('{{asset($banner->photo->first()->path)}}')"></div>
                    <div class="block-banner__title text-danger">{{$banner->title}}</div>
                    <div class="block-banner__button"><span class="btn btn-sm btn-primary">هم اکنون بخرید</span></div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="block block-products block-products--layout--large-last">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title">پرفروش ترین ها</h3>
                <div class="block-header__divider"></div>
            </div>
            <div class="block-products__body">
                <div class="block-products__list">
                    @foreach($products->take(6) as $product)
                        <div class="block-products__list-item mt-5">
                            <div class="product-card">
                                <div class="product-card__image">
                                    <a href="{{route('product.self',$product->slug)}}">
                                        <img
                                            src="{{asset($product->photos->first()->path)}}"
                                            alt="{{$product->name}}"></a>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="{{route('product.self',$product->slug)}}">
                                            {{$product->name}}
                                        </a></div>
                                </div>
                                @if($product->exist)
                                    @if($product->discount)
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div class="old_price"
                                                     style="font-size: 15px"> {{number_format($product->price)}}
                                                    ریال
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <div class="product__prices"
                                                     style="font-size: 20px"> {{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}}
                                                    ریال
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="product__prices text-center"
                                             style="font-size: 25px"> {{number_format($product->price)}}
                                            ریال
                                        </div>
                                    @endif
                                    <div class="product-card__buttons">
                                        @if($product->exist == 1 && $product->count >0)
                                            <a href="{{route('add.cart',$product->slug)}}"
                                               class="btn btn-primary product-card__addtocart"
                                               type="button">
                                                افزودن به
                                                سبد
                                            </a>
                                        @else
                                            <span class="text-danger">عدم موجودی</span>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-danger">عدم موجودی</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="block-products__featured">
                    @if(count($products)>0)
                        @foreach($products->random(1) as $product)
                            <div class="block-products__featured-item mt-5">
                                <div class="product-card">
                                    <div class="product-card__image img">
                                        <a href="{{route('product.self',$product->slug)}}"><img
                                                src="{{$product->photos->first()->path}}" alt=""></a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a
                                                href="{{route('product.self',$product->slug)}}"
                                                style="font-size: 25px">
                                                {{$product->name}}</a>
                                        </div>
                                    </div>
                                    <div class="product-card__actions"></div>
                                    @if($product->exist)
                                        @if($product->discount)
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <div class="old_price"
                                                         style="font-size: 25px"> {{number_format($product->price)}}
                                                        ریال
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <div class="product__prices"
                                                         style="font-size: 35px"> {{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}}
                                                        ریال
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="product__prices text-center"
                                                 style="font-size: 35px"> {{number_format($product->price)}}
                                                ریال
                                            </div>
                                        @endif
                                        <div class="product-card__buttons">
                                            @if($product->exist == 1 && $product->count >0)
                                                <a href="{{route('add.cart',$product->slug)}}"
                                                   class="btn btn-primary product-card__addtocart"
                                                   type="button">
                                                    افزودن به
                                                    سبد
                                                </a>
                                            @else
                                                <span class="text-danger">عدم موجودی</span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-danger">عدم موجودی</span>
                                    @endif
                                </div>
                            </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="block block-posts block-posts--layout--grid-nl" data-layout="grid-nl">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title">ویدیو های آموزشی</h3>
                <div class="block-header__divider"></div>
                <div class="block-header__arrows-list">
                    <button class="block-header__arrow block-header__arrow--left" type="button">
                        <svg width="7px" height="11px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                        </svg>
                    </button>
                    <button class="block-header__arrow block-header__arrow--right" type="button">
                        <svg width="7px" height="11px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                        </svg>
                    </button>
                </div>
            </div>


            <div class="block-posts__slider row">
                <div class="col-lg-5 col-sm-12 col-xs-12">
                    <a href="{{route('downloadvideo',1)}}">
                        <div class="post-card videoimage">
                            <div class="post-card__image">

                                <img src="{{('/front/image/m1.jpg')}}" alt="" style="height:280px;width:100%;border-radius: 15px">

                            </div>
                            <div class="post-card__info">
                                <div class="post-card__name"><a href="{{route('downloadvideo',2)}}">دانلود ویدیو آموزشی
                                        سیستم ساده
                                        حرکتی</a></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-5 col-sm-12 col-xs-12">
                    <a href="{{route('downloadvideo',2)}}">
                        <div class="post-card videoimage">
                            <div class="post-card__image text-center">

                                <img src="{{('/front/image/B.jpg')}}" alt="" style="height:280px;width:100%;border-radius: 10px">

                            </div>
                            <div class="post-card__info">
                                <div class="post-card__name text-center"><a href="{{route('downloadvideo',1)}}">دانلود
                                        ویدیو
                                        آموزشی ساخت
                                        جرثقیل</a></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


            {{--            <div class="block-posts__slider">--}}
            {{--                <div class="owl-carousel">--}}
            {{--                    @foreach($blogs as $blog)--}}
            {{--                        <div class="post-card">--}}
            {{--                            <div class="post-card__image">--}}
            {{--                                <a href=""><img src="{{$blog->photo->first()->path}}" alt=""></a>--}}
            {{--                            </div>--}}
            {{--                            <div class="post-card__info">--}}
            {{--                                <div class="post-card__category"><a href="">پیشنهادهای ویژه</a></div>--}}
            {{--                                <div class="post-card__name"><a href="">{{$blog->title}}</a></div>--}}
            {{--                                <div--}}
            {{--                                    class="post-card__date">{{Verta::instance($blog->created_at)->format('Y-m-d')}}</div>--}}
            {{--                                <div class="post-card__content">{{$blog->description}}</div>--}}
            {{--                                <div class="post-card__read-more"><a href="" class="btn btn-secondary btn-sm">بیشتر--}}
            {{--                                        بخوانید</a></div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    @endforeach--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>


    <div class="block block-product-columns d-lg-block d-none">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="block-header">
                        <h3 class="block-header__title">محصولات تولیدی مبتکران</h3>
                        <div class="block-header__divider"></div>
                    </div>
                    @foreach($products->where('type',1)->take(4) as $product)
                        <div class="block-product-columns__column mt-2">
                            <div class="block-product-columns__item">
                                <div class="product-card product-card--layout--horizontal">
                                    <button class="product-card__quickview" type="button">
                                        <span class="fake-svg-icon"></span></button>
                                    <div class="product-card__image img">
                                        <a href="{{route('product.self',$product->slug)}}">
                                            <img class="homeimg"
                                                 src="{{asset($product->photos->first()->path)}}"
                                                 alt="{{$product->name}}"></a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a
                                                href="{{route('product.self',$product->slug)}}">
                                                {{$product->name}}
                                            </a></div>
                                    </div>
                                    @if($product->exist && $product->count >0)
                                        <div class="product-card__actions">
                                            @if($product->discount)
                                                <div class="old_price"
                                                     style="font-size: 15px">{{number_format($product->price)}} ریال
                                                </div>
                                                <span class="product-card__prices" style="font-size: 18px"> {{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}} ریال </span>
                                            @else
                                                <div class="product-card__prices">{{number_format($product->price)}}
                                                    ریال
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-danger">عدم موجودی</span>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-4">
                    <div class="block-header">
                        <h3 class="block-header__title">پیشنهادهای ویژه</h3>
                        <div class="block-header__divider"></div>
                    </div>
                    @foreach($products->where('discount','>',0)->take(4) as $product)
                        <div class="block-product-columns__column mt-2">

                            <div class="block-product-columns__item">
                                <div class="product-card product-card--layout--horizontal">
                                    <button class="product-card__quickview" type="button">
                                        <span class="fake-svg-icon"></span></button>
                                    <div class="product-card__image img">
                                        <a href="{{route('product.self',$product->slug)}}">
                                            <img class="homeimg"
                                                 src="{{asset($product->photos->first()->path)}}"
                                                 alt="{{$product->name}}"></a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a
                                                href="{{route('product.self',$product->slug)}}">
                                                {{$product->name}}
                                            </a></div>
                                    </div>
                                    @if($product->exist && $product->count >0)
                                        <div class="product-card__actions">
                                            @if($product->discount)
                                                <div class="old_price"
                                                     style="font-size: 15px">{{number_format($product->price)}} ریال
                                                </div>
                                                <span class="product-card__prices" style="font-size: 18px"> {{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}} ریال </span>
                                            @else
                                                <div class="product-card__prices">{{number_format($product->price)}}
                                                    ریال
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-danger">عدم موجودی</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-4">
                    <div class="block-header">
                        <h3 class="block-header__title">پرفروش ترین ها</h3>
                        <div class="block-header__divider"></div>
                    </div>
                    @if(count($products)>0)
                        @foreach($products->random(4)->take(4) as $product)
                            <div class="block-product-columns__column mt-2">
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--layout--horizontal">
                                        <button class="product-card__quickview" type="button">
                                            <span class="fake-svg-icon"></span></button>
                                        <div class="product-card__image img">
                                            <a href="{{route('product.self',$product->slug)}}">
                                                <img class="homeimg"
                                                     src="{{asset($product->photos->first()->path)}}"
                                                     alt="{{$product->name}}"></a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a
                                                    href="{{route('product.self',$product->slug)}}">
                                                    {{$product->name}}
                                                </a></div>
                                        </div>
                                        @if($product->exist && $product->count >0)
                                            <div class="product-card__actions">
                                                @if($product->discount)
                                                    <div class="old_price"
                                                         style="font-size: 15px">{{number_format($product->price)}} ریال
                                                    </div>
                                                    <span class="product-card__prices" style="font-size: 18px"> {{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}} ریال </span>
                                                @else
                                                    <div class="product-card__prices">{{number_format($product->price)}}
                                                        ریال
                                                    </div>
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-danger">عدم موجودی</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
