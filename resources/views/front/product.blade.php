@extends('front.layouts.master')
@section('content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success container" style="width: 100%">
                <div>{{ Session('success') }}</div>
            </div>
        @endif
        <div class="block">
            <div class="container">
                <div class="product product--layout--standard" data-layout="standard">
                    <div class="product__content">
                        <!-- .product__gallery -->
                        <div class="product__gallery">
                            <div class="product-gallery">
                                <div class="product-gallery__featured">
                                    <div class="owl-carousel" id="product-image">
                                        @foreach($product->photos as $photo)
                                            <a href="{{$photo->path}}" target="_blank"><img
                                                    src="{{$photo->path}}" alt=""> </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="product-gallery__carousel">
                                    <div class="owl-carousel" id="product-carousel">
                                        @foreach($product->photos as $photo)
                                            <a href="" class="product-gallery__carousel-item"><img
                                                    class="product-gallery__carousel-image"
                                                    src="{{$photo->path}}" alt="{{$product->name}}"> </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__info">
                            <h1 class="product__name">{{$product->name}}</h1>
                            <div class="product__description">
                                {!!  Str::limit($product->description,150)!!}
                            </div>
                            <hr>
                            <ul class="">
                                <li class="product__meta-availability">موجودی:
                                    @if($product->exist == 1)
                                        @if($product->count < 1 )
                                            <span class="text-warning">اتمام موجودی</span>
                                        @else
                                            <span class="text-success">موجود در انبار</span>
                                        @endif
                                    @elseif($product->exist == 0)
                                        <span class="text-danger">ناموجود</span>
                                    @endif
                                </li>
                                <li> برند: {{\App\Models\Brand::where('id',$product->brand_id)->first()->title}}</li>
                                <li> شناسه: {{$product->sku}}</li>
                            </ul>
                        </div>
                        <div class="product__sidebar">
                            <div class="price">
                                @if($product->discount)
                                    <div class="old_price"> {{number_format($product->price)}} ریال</div>
                                    <div
                                        class="product__prices"> {{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}}
                                        ریال
                                    </div>
                                @else
                                    <div class="product__prices"> {{number_format($product->price)}} ریال</div>
                                @endif
                            </div>
                            <div class="mt-5">
                                <form class="product__options">
                                    <div class="form-group product__option">
                                        {{--                                        <label class="product__option-label" for="product-quantity">تعداد</label>--}}
                                        <div class="product__actions">
                                            {{--                                            <div class="product__actions-item">--}}
                                            {{--                                                <div class="input-number product__quantity">--}}
                                            {{--                                                    <input id="product-quantity"--}}
                                            {{--                                                           class="input-number__input form-control form-control-lg"--}}
                                            {{--                                                           type="number" min="1" value="1">--}}
                                            {{--                                                    <div class="input-number__add"></div>--}}
                                            {{--                                                    <div class="input-number__sub"></div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            <div class="product__actions-item product__actions-item--addtocart">
                                                <a href="{{route('add.cart',$product->slug)}}"
                                                   class="btn btn-primary btn-lg">افزودن به سبد</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="product__footer">

                        </div>
                    </div>
                </div>
                <div class="product-tabs">
                    <div class="product-tabs__list"><a href="#tab-description"
                                                       class="product-tabs__item product-tabs__item--active">توضیحات</a>
                        <a href="#tab-specification" class="product-tabs__item">مشخصات فنی</a>
                    </div>
                    <div class="product-tabs__content">
                        <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                            <div class="typography">
                                <h3>توضیحات کامل محصول</h3>
                                {!! $product->description !!}
                            </div>
                        </div>
                        <div class="product-tabs__pane" id="tab-specification">
                            <div class="spec">
                                <h3 class="spec__header">مشخصات فنی</h3>
                                <div class="spec__section">
                                    @foreach($product->attributevalus as $attributes)
                                        <div class="spec__name">{{$attributes->attribute->title}}</div>
                                        <div class="spec__value">{{$attributes->title}}</div>
                                    @endforeach

                                    <div class="spec__disclaimer">برای اطلاعات بیشتر ویا در صورت داشتن سوالی در مورد
                                        اجناس می توانید با فروشگاه در تماس باشید.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .block-products-carousel -->
            <div class="block block-products-carousel" data-layout="grid-5">
                <div class="container">
                    <div class="block-header">
                        <h3 class="block-header__title">محصولات مرتبط</h3>
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
                    <div class="block-products-carousel__slider">
                        <div class="block-products-carousel__preloader"></div>
                        <div class="owl-carousel">
                            @foreach($relatedProducts as $real)
                                <div class="block-products-carousel__column">
                                    <div class="block-products-carousel__cell">
                                        <div class="product-card">
                                            <div class="product-card__image">
                                                <a href="{{route('product.self',$real->slug)}}"><img
                                                        src="{{$real->photos->first()->path}}" alt=""></a>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__name"><a
                                                        href="{{route('product.self',$real->slug)}}">{{$real->name}}</a>
                                                </div>
                                            </div>
                                            <div class="product-card__actions">
                                                @if($product->exist == 1)
                                                    @if($product->count < 1 )
                                                        <span class="text-warning">اتمام موجودی</span>
                                                    @else
                                                        <span class="text-success">موجود در انبار</span>
                                                    @endif
                                                @elseif($product->exist == 0)
                                                    <span class="text-danger">ناموجود</span>
                                                @endif
                                                <div class="product-card__prices">{{number_format($real->price)}}ریال
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
