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
                            <li class="breadcrumb-item active" aria-current="page">سوالات متداول</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>سوالات متداول</h1></div>
            </div>
        </div>
        <div class="block faq" style="text-align: justify">
            <div class="container">
                <div class="faq__section">
                    <div class="faq__section-title">
                        <h3>ثبت و پیگیری سفارش</h3></div>
                    <div class="faq__section-body">
                        <div class="row">
                            <div class="faq__section-column col-12 col-lg-6">
                                <div class="typography">
                                    <h6 class="text-danger">آیا برای خرید از تبریز ربات، حتماً باید در سایت عضو
                                        باشم؟</h6>
                                    <p>
                                        بلی، تبریز ربات برای اعضای خود امتیازات ویژه‌ای در نظر گرفته است که عبارتند از :
                                        امکان ارسال خبرنامه و اطلاعیه های سایت
                                        اطلاع بودن و بهره مندی از تخفیفات ویژه
                                        پیگیری و کنترل سفارشات
                                    </p>
                                    <h6 class="text-danger">آیا در تمام ساعات شبانه روز‌‌ می‌توانم سفارش خود را ثبت
                                        کنم؟</h6>
                                    <p>
                                        بلی، در 24 ساعت شبانه روز و 7 روز هفته‌‌ می‌توانید سفارش خود را ثبت کنید.
                                    </p>
                                </div>
                            </div>
                            <div class="faq__section-column col-12 col-lg-6">
                                <div class="typography">
                                    <h6 class="text-danger">اگر به دلیل قطعی برق یا اینترنت نتوانم سفارشم را تکمیل کنم،
                                        امکان برگشت لیست
                                        سفارش وجود دارد؟</h6>
                                    <p>
                                        بلی، بعد از رفع مشکل پیش آمده، با ورود مجدد به پنل کاربری خود‌‌ می‌توانید لیست
                                        انتخاب شده را در قسمت سمت راست مشاهده نمایید و نسبت به تکمیل و نهایی کردن سفارش
                                        خود اقدام فرمایید. این لیست تا نهایی شدن سفارش در پنل شما باقی خواهد ماند
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="faq__section">
                    <div class="faq__section-title">
                        <h3>چگونگی ارسال سفارشات</h3></div>
                    <div class="faq__section-body">
                        <div class="row">
                            <div class="faq__section-column col-12 col-lg-6">
                                <div class="typography">
                                    <h6 class="text-danger">به چه روشی سفارش من ارسال‌‌ می‌شود؟</h6>
                                    <p>
                                        در سرتاسر کشور، سفارش‌ها از طریق شرکت پست ارسال‌‌ می‌شوند
                                    </p>
                                </div>
                            </div>
                            <div class="faq__section-column col-12 col-lg-6">
                                <div class="typography">
                                    <h6 class="text-danger">هزینه ارسال سفارش به چه صورت محاسبه و اخذ‌‌ می‌شود؟</h6>
                                    <p>هزینه ارسال مطابق قیمتهای مصوب اداره پست و بر حسب وزن مرسوله محاسبه و در فاکتور
                                        نهایی لحاظ‌‌ می‌گردد</p>
                                </div>
                            </div>
                            <div class="faq__section-column col-12 col-lg-6">
                                <div class="typography">
                                    <h6 class="text-danger">آیا‌‌ می‌توانم سفارشم را در روز و ساعت معینی تحویل
                                        بگیرم؟</h6>
                                    <p>خیر، در ارسالهای پستی امکان تنظیم روز و ساعت در حال حاضر وجود ندارد</p>
                                </div>
                            </div>
                            <div class="faq__section-column col-12 col-lg-6">
                                <div class="typography">
                                    <h6 class="text-danger">پس از ثبت سفارش، چقدر طول‌‌ می‌کشد که به دستم برسد؟</h6>
                                    <p>سفارشاتی که در شهر تبریز انجام‌‌ می‌شود، در همان روز نیز قابل ارسال‌‌ می‌باشد.
                                        زمان ارسال به دیگر شهرهای کشور معمولاً 48 تا 72 ساعت‌‌ می‌باشد</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="faq__section">
                    <div class="faq__section-title">
                        <h3>نحوه پرداخت</h3></div>
                    <div class="faq__section-body">
                        <div class="row">
                            <div class="faq__section-column col-12 col-lg-6">
                                <div class="typography">
                                    <h6 class="text-danger">مبلغ سفارشم را چگونه‌‌ می‌توانم پرداخت کنم؟</h6>
                                    <p>شما به صورت اینترنتی می‏‌توانید پرداخت خود را انجام دهید و هنگام ثبت سفارش در
                                        مرحله پرداخت، روش پرداخت خود را انتخاب کنید.
                                        همه کاربران می‌توانند از طریق درگاه اینترنتی و با استفاده از همه کارت‏‌های بانکی
                                        عضو شبکه شتاب در سایت تبریز ربات، هزینه سفارش را به صورت آنلاین پرداخت کنند</p>
                                </div>
                            </div>
                            <div class="faq__section-column col-12 col-lg-6">
                                <div class="typography">
                                    <h6 class="text-danger">ممکن است پرداخت اینترنتی ناموفق باشد، ولی مبلغ از حساب من کم
                                        شده باشد؟</h6>
                                    <p>گاهی ممکن است در هنگام پرداخت شبکه بانکی قطع شود و پرداخت ناموفق انجام شود. اما
                                        در این مواقع جای نگرانی وجود ندارد. در این حالت معمولاً پول شما در حساب‏‌های
                                        میانی بانک است و خود بانک مغایرت‏‌ها را رفع کرده و مبلغ را به صورت خودکار به
                                        حساب شما برگشت می‌‏دهد. اگر تا 72 ساعت پول به حسابتان برگشت نخورد، آنگاه با بانک
                                        عامل پرداخت اینترنتی تماس بگیرید تا مغایرت برطرف شود</p>
                                </div>
                            </div>
                            <div class="faq__section-column col-12 col-lg-6">
                                <div class="typography">
                                    <h6 class="text-danger">آیا پرداخت اینترنتی وجه سفارش در سایت تبریز ربات امن
                                        است؟</h6>
                                    <p>پرداخت اینترنتی به گونه‏‌ای طراحی شده که امن و راحت باشد. با وجود این شما نه تنها
                                        برای خرید از تبریز ربات که هنگام هرگونه پرداخت اینترنتی برای اطمینان از امنیت
                                        پرداخت خود</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="faq__section">
                    <div class="faq__section-title">
                        <h3>خدمات پس از فروش</h3></div>
                    <div class="faq__section-body">
                        <div class="row">
                            <div class="faq__section-column col-12 col-lg-12">
                                <div class="typography">
                                    <h6 class="text-danger">اگر کالایی که خریداری کرده ام، ایراد فنی یا آسیب دیدگی داشت،
                                        چه کار باید انجام دهم؟</h6>
                                    <p>
                                        با خدمات پس از فروش تماس بگیرید (طی تماس تلفنی یا ارسال پیام از طریق صفحه تماس
                                        با ما) کارشناسان تبریز ربات در اسرع وقت مشکل شما را پیگیری‌‌ می‌نمایند
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
