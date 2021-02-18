@extends('front.layouts.master')
@section('content')

    <div class="site__body" id="app3">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="/front/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">فاکتور پرداخت</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>فاکتور پرداخت</h1></div>
            </div>
        </div>
        <div class="checkout block">
            <div class="container">
                <form action="{{route('updateuser')}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-7">
                            <div class="card mb-lg-0">
                                <div class="card-body">
                                    <h3 class="card-title">جزئیات پرداخت</h3>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="checkout-first-name">نام</label>
                                            <input type="text" class="form-control" id="checkout-first-name"
                                                   name="fname" value="{{$user->fname}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="checkout-last-name">نام خانوادگی</label>
                                            <input type="text" class="form-control" id="checkout-last-name"
                                                   name="lname" value="{{$user->lname}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-street-address">آدرس </label>
                                        <input type="text" class="form-control" id="checkout-street-address"
                                               name="address" value="{{$user->address}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-city">شهر / شهرستان</label>
                                        <input type="text" class="form-control" id="checkout-city"
                                               name="city" value="{{$user->city}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-state">استان</label>
                                        <input type="text" class="form-control" id="checkout-state"
                                               name="province" value="{{$user->province}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-postcode">کد پستی</label>
                                        <input type="text" class="form-control" id="checkout-postcode"
                                               name="postcode" value="{{$user->postcode}}">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="checkout-email">آدرس ایمیل</label>
                                            <input type="email" class="form-control" id="checkout-email"
                                                   name="email" value="{{$user->email}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="checkout-phone">تلفن</label>
                                            <input type="text" class="form-control" id="checkout-phone"
                                                   name="phone" value="{{$user->phone}}">
                                        </div>
                                    </div>
                                    <i class="fa fa-exclamation-circle"></i>
                                    <small class="text-danger">لطفا از صحت اطلاعات وارد شده اطمینان به عمل
                                        آورید.</small>
                                    <br>
                                    <i class="fa fa-exclamation-circle"></i>
                                    <small class="text-success">
                                        کلیه سفارشات در روز های کاری در صورت تکمیل خرید قبل از ساعت 12 ظهر ، در همان روز ارسال خواهد شد.
                                        </small>
                                </div>
                                <div class="card-divider"></div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <h3 class="card-title">سفارش شما</h3>
                                    <table class="checkout__totals">
                                        <thead class="checkout__totals-header">
                                        <tr>
                                            <th class="text-danger text-center">محصول</th>
                                            <th class="text-danger text-center">تعداد</th>
                                            <th class="text-danger text-center">جمع کل</th>
                                        </tr>
                                        </thead>
                                        <tbody class="checkout__totals-products">
                                        @if($cart)
                                            @foreach($cart->items as $product)
                                                <tr>
                                                    <td class="text-center">{{$product['item']->name}}</td>
                                                    <td class="text-center">{{$product['qty']}}</td>
                                                    @if($product['item']->discount)
                                                        <td> {{number_format(\App\Helpers\Helpers::discount($product['item']->price,$product['item']->discount))}}
                                                            ریال
                                                        </td>
                                                    @else
                                                        <td>{{number_format($product['price'])}} ریال</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                        <tbody>
                                        <tr>
                                            <th>جمع کل :</th>
                                            <td>{{number_format(Session::get('cart')->totalPurePrice)}} ریال</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th>تخفیف :</th>
                                            <td>{{number_format(Session::get('cart')->totalDiscountPrice)}} - ریال</td>
                                        </tr>
                                        </tbody>
                                        <tfoot class="cart__totals-footer">
                                        <tr>
                                            <th>جمع کل :</th>
                                            <td class="text-success" v-html=" paytotal + ' ریال '"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <samll class="text-danger">جمع کل با احتساب هزینه حمل می باشد.</samll>

                                    <div class="payment-methods">
                                        <ul class="payment-methods__list">
                                            <li class="payment-methods__item payment-methods__item--active">
                                                <label class="payment-methods__item-header"><span
                                                        class="payment-methods__item-radio input-radio"><span
                                                            class="input-radio__body">
                                                            <input class="input-radio__input"
                                                                   name="checkout_payment_method"
                                                                   v-model="selected"
                                                                   value="170000"
                                                                   type="radio" checked
                                                            >
                                                            <span
                                                                class="input-radio__circle"></span> </span>
													</span><span
                                                        class="payment-methods__item-title">پست سفارشی</span></label>
                                                <div class="payment-methods__item-container">
                                                    <div class="payment-methods__item-description text-muted">
                                                        زمان ارسال 3 الی 7 روز کاری
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="payment-methods__item">
                                                <label class="payment-methods__item-header"><span
                                                        class="payment-methods__item-radio input-radio"><span
                                                            class="input-radio__body"><input class="input-radio__input"
                                                                                             name="checkout_payment_method"
                                                                                             v-model="selected"
                                                                                             value="250000"
                                                                                             type="radio"> <span
                                                                class="input-radio__circle"></span> </span>
													</span><span
                                                        class="payment-methods__item-title">پست پیشتاز</span></label>
                                                <div class="payment-methods__item-container">
                                                    <div class="payment-methods__item-description text-muted">
                                                        زمان ارسال 2 الی 4 روز کاری

                                                    </div>
                                                </div>
                                            </li>
                                            <li class="payment-methods__item">
                                                <label class="payment-methods__item-header"><span
                                                        class="payment-methods__item-radio input-radio"><span
                                                            class="input-radio__body"><input class="input-radio__input"
                                                                                             name="checkout_payment_method"
                                                                                             v-model="selected"
                                                                                             value="30000"
                                                                                             type="radio"> <span
                                                                class="input-radio__circle"></span> </span>
													</span><span
                                                        class="payment-methods__item-title">تیپاکس (پس کرایه)</span></label>
                                                <div class="payment-methods__item-container">
                                                    <div class="payment-methods__item-description text-muted">
                                                        هزینه بسته بند ی 3000 تومان می باشد و مابقی هزینه به صورت پس
                                                        کرایه است.
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="payment-methods__item">
                                                <label class="payment-methods__item-header"><span
                                                        class="payment-methods__item-radio input-radio"><span
                                                            class="input-radio__body"><input class="input-radio__input"
                                                                                             name="checkout_payment_method"
                                                                                             v-model="selected"
                                                                                             value="150000"
                                                                                             type="radio"> <span
                                                                class="input-radio__circle"></span> </span>
													</span><span
                                                        class="payment-methods__item-title">پیک موتوری تبریز (پس کرایه)</span></label>
                                                <div class="payment-methods__item-container">
                                                    <div class="payment-methods__item-description text-muted">
                                                        پیک موتوری مخصوص داخل شهر تبریز می باشد
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="payment-methods__item">
                                                <label class="payment-methods__item-header">
                                                <span class="payment-methods__item-radio input-radio"><span
                                                        class="input-radio__body"><input class="input-radio__input"
                                                                                         name="checkout_payment_method"
                                                                                         v-model="selected"
                                                                                         value="0"
                                                                                         type="radio"> <span
                                                            class="input-radio__circle"></span> </span>
													</span><span
                                                        class="payment-methods__item-title">دریافت حضوری </span></label>
                                                <div class="payment-methods__item-container">
                                                    <div class="payment-methods__item-description text-muted">
                                                        لطفا قبل از حضور در فروشگاه هماهنگی لازم را با شماره تماس فروشگاه انجام دهید.
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="checkout__agree form-group">
                                        <div class="form-check"><span class="form-check-input input-check"><span
                                                    class="input-check__body"><input class="input-check__input"
                                                                                     type="checkbox"
                                                                                     id="checkout-terms"> <span
                                                        class="input-check__box"></span>
											<svg class="input-check__icon" width="9px" height="7px">
												<use xlink:href="/front/images/sprite.svg#check-9x7"></use>
											</svg>
											</span>
											</span>
                                            <label class="form-check-label" for="checkout-terms">من <a target="_blank"
                                                                                                       href="terms-and-conditions.html">قوانین
                                                    و مقررات</a> را خوانده و موافقم *</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-xl btn-block">پرداخت</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.esm.browser.js"></script>
    <script>
        vm = new Vue({
            el: '#app3',
            data: {
                selected: "150000"
            },
            computed: {
                paytotal: function () {
                    if (this.selected) {
                        return (parseInt(this.selected) + parseInt({{Session::get('cart')->totalPrice}})).toLocaleString("fi-FI")
                    } else {
                        return 0;
                    }
                }
            }
        });
    </script>

@endsection
