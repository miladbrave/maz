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
                            <li class="breadcrumb-item active" aria-current="page">دسته بندی ها</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success container mt-3" style="width: 100%">
                <div>{{ Session('success') }}</div>
            </div>
        @endif
        <div class="container">
            <div class="shop-layout shop-layout--sidebar--start">
                <div class="shop-layout__sidebar">
                    <div class="block block-sidebar">
                        <div class="block-sidebar__item">
                            <div class="widget-filters widget" data-collapse
                                 data-collapse-opened-class="filter--opened">
                                <h4 class="widget__title">فیلتر ها</h4>
                                <div class="widget-filters__list">
                                    <div class="widget-filters__item">
                                        <div class="filter filter--opened" data-collapse-item>
                                            <button type="button" class="filter__title" data-collapse-trigger>دسته ها
                                                <svg class="filter__arrow" width="12px" height="7px">
                                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                                </svg>
                                            </button>

                                            <div class="filter__body" data-collapse-content>
                                                <div class="filter__container">
                                                    <div class="filter-categories">
                                                        <ul class="filter-categories__list">
                                                            @foreach($navcategories as $nav)
                                                                <li class="filter-categories__item filter-categories__item--current">
                                                                    <a href="" class="text-danger">{{$nav->title}}</a>
                                                                </li>
                                                                @foreach($maincategories as $main)
                                                                    @if($nav->title == $main->type)
                                                                        <li class="filter-categories__item filter-categories__item--child">
                                                                            <a href="{{route('category',$main->title)}}">{{$main->title}}</a>
                                                                            <div
                                                                                class="text-warning">{{$main->products->count()}}
                                                                            </div>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="block-sidebar__item d-none d-lg-block">
                            <div class="widget-products widget">
                                <h4 class="widget__title">محصولات جدید</h4>
                                <div class="widget-products__list">
                                    @foreach($pro->random(3) as $newpro)
                                        <div class="widget-products__item">
                                            <div class="widget-products__image">
                                                <a href="{{route('product.self',$newpro->slug)}}">
                                                    @if(isset($newpro->photos->first()->path))
                                                        <img src="{{asset($newpro->photos->first()->path)}}"
                                                             alt="{{$newpro->title}}">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="widget-products__info">
                                                <div class="widget-products__name">
                                                    <a href="{{route('product.self',$newpro->slug)}}">
                                                        {{$newpro->name}}
                                                    </a>
                                                </div>
                                                <div class="widget-products__prices">{{number_format($newpro->price)}}
                                                    ریال
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="shop-layout__content">
                    <div class="block">
                        <div class="products-view">
                            <div class="products-view__options">
                                <div class="view-options">
                                    <div class="view-options__control">
                                        <label for="">مرتب‌سازی بر اساس</label>
                                        <div>
                                            <select class="form-control form-control-sm price" name="" id="">
                                                <option value="2">افزایش قیمت</option>
                                                <option value="1">کاهش قیمت</option>
                                                <option value="3">موجود</option>
                                                <option value="0">جدیدترین</option>
                                            </select>
                                        </div>
                                        <input type="hidden" value="{{$id}}" class="namecategory">
                                    </div>
                                </div>
                            </div>
                            <div class="products-view__list products-list" data-layout="list"
                                 data-with-features="false">
                                <div class="products-list__body">
                                    @foreach($products as $product)
                                        <div class="products-list__item">
                                            <div class="product-card">
                                                <button class="product-card__quickview" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image">
                                                    <a href="{{route('product.self',$product->slug)}}"><img
                                                            src="{{$product->photos->first()->path}}"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a
                                                            href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                                    </div>

                                                </div>
                                                <div class="product-card__actions">
                                                    <div class="product-card__availability">موجودی:
                                                        @if($product->exist == 1)
                                                            @if($product->count < 1 )
                                                                <span class="text-warning">اتمام موجودی</span>
                                                            @else
                                                                <span class="text-success">موجود در انبار</span>
                                                            @endif
                                                        @elseif($product->exist == 0)
                                                            <span class="text-danger">ناموجود</span>
                                                        @endif
                                                    </div>
                                                    <div class="product-card__prices">{{number_format($product->price)}}
                                                        ریال
                                                    </div>
                                                    <div class="product-card__buttons">
                                                        @if($product->exist == 1 && $product->count >0)
                                                            <a href="{{route('add.cart',$product->slug)}}"
                                                                class="btn btn-success product-card__addtocart product-card__addtocart--list"
                                                                type="button">افزودن به سبد
                                                            </a>
                                                        @endif
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
        </div>
    </div>

@endsection
@section('js')
    <script>
            $('.price').on('change', function() {
                var title = $('.namecategory').attr('value');
                window.location.href = "/category/" + title + "/" + this.value;
            });
    </script>
@endsection
