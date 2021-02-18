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
                            <li class="breadcrumb-item active" aria-current="page">سبد خرید</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>سبد خرید</h1></div>
            </div>
        </div>
        <div class="cart block">
            <div class="container">
                <table class="cart__table cart-table">
                    <thead class="cart-table__head">
                    <tr class="cart-table__row">
                        <th class="cart-table__column cart-table__column--image">تصویر</th>
                        <th class="cart-table__column cart-table__column--product">محصول</th>
                        <th class="cart-table__column cart-table__column--price">قیمت</th>
                        <th class="cart-table__column cart-table__column--price">با تخفیف</th>
                        <th class="cart-table__column cart-table__column--quantity">تعداد</th>
                        <th class="cart-table__column cart-table__column--total">جمع کل</th>
                        <th class="cart-table__column cart-table__column--remove"></th>
                    </tr>
                    </thead>
                    <tbody class="cart-table__body">

                    @foreach(Session::get('cart')->items as $product)
                        <tr class="cart-table__row">
                            <td class="cart-table__column cart-table__column--image">
                                @if(isset($product['item']->photos->first()->path))
                                    <a href="{{route('product.self',$product['item']->id)}}">
                                        <img
                                            src="{{asset($product['item']->photos->first()->path)}}"
                                            alt="{{$product['item']->name}}">
                                    </a>
                                @else
                                    <a href="{{route('product.self',$product['item']->id)}}">
                                        <img
                                            src="{{asset('front/image/pro.jpg')}}"
                                            alt="{{$product['item']->name}}">
                                    </a>
                                @endif
                            </td>
                            <td class="cart-table__column cart-table__column--product">
                                <div class="dropcart__product-name"><a
                                        href="{{route('product.self',$product['item']->id)}}">
                                        {{$product['item']->name}}
                                    </a>
                                </div>
                            </td>
                            <td class="cart-table__column cart-table__column--price"
                                data-title="قیمت"> {{number_format($product['item']->price)}} ریال
                            </td>
                            <td class="cart-table__column cart-table__column--price"
                                data-title="قیمت با تخفیف"> {{number_format(\App\Helpers\Helpers::discount($product['item']->price,$product['item']->discount))}}
                                ریال
                            </td>
                            <td class="cart-table__column cart-table__column--quantity" data-title="تعداد">
                                <form action="{{route('add.qty',$product['item'])}}" method="post">
                                    @csrf
                                    <div class="input-number">
                                        <input class="form-control input-number__input" type="number" min="1"
                                             name="quantity"   value="{{$product['qty']}}">
                                        <div class="input-number__add"></div>
                                        <div class="input-number__sub"></div>
                                    </div>
                                    <button type="submit"
                                       class="badge badge-sm badge-success rounded">اعمال</button>
                                </form>
                            </td>
                            <td class="cart-table__column cart-table__column--total"
                                data-title="جمع کل">{{number_format($product['price'])}}</td>
                            <td class="cart-table__column cart-table__column--remove">
                                <a href="{{route('remove.product',$product['item'])}}" type="button"
                                   class="btn btn-light btn-sm btn-svg-icon">
                                    <svg width="12px" height="12px">
                                        <use xlink:href="/front/images/sprite.svg#cross-12"></use>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-end pt-5">
                    <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">مجموع سبد</h3>
                                <table class="cart__totals">
                                    <thead class="cart__totals-header">
                                    <tr>
                                        <th>جمع کل</th>
                                        <td>{{number_format(Session::get('cart')->totalPurePrice)}} ریال</td>
                                    </tr>
                                    </thead>
                                    <tbody class="cart__totals-body">
                                    <tr>
                                        <th>تخفیف</th>
                                        <td>{{number_format(Session::get('cart')->totalDiscountPrice)}} ریال</td>
                                    </tr>
                                    </tbody>
                                    <tfoot class="cart__totals-footer">
                                    <tr>
                                        <th>جمع کل</th>
                                        <td>{{number_format(Session::get('cart')->totalPrice)}} ریال</td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <a class="btn btn-primary btn-xl btn-block cart__checkout-button" href="{{route('checkout')}}">ثبت سفارش</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
