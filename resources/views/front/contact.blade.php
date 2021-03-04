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
                            <li class="breadcrumb-item active" aria-current="page">تماس با ما</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>تماس با ما</h1></div>
            </div>
        </div>
        @if(Session::has('message'))
            <div class="alert alert-success container mt-3" style="width: 100%">
                <div>{{ Session('success') }}</div>
            </div>
        @endif
        <div class="block">
            <div class="container">
                <div class="card mb-0 contact-us">
                    <div class="contact-us__map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1570.3916373664817!2d46.28540920529674!3d38.07542808007086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z2YXYqNiq2qnYsdin2YY!5e0!3m2!1sen!2s!4v1613402024837!5m2!1sen!2s"
                            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="card-body">
                        <div class="contact-us__container">
                            <div class="row">
                                <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                                    <h4 class="contact-us__header card-title">آدرس ما</h4>
                                    <div class="contact-us__address">
                                        <p>دفتر مرکزی : تبریز - چهار راه محققی - پاساژ چهل ستون نو - زیرزمین - پلاک 4
                                            <br>ایمیل: MazTabriz@gmail.com
                                            <br>شماره تلفن: 6982 3557 041
                                            <br> موبایل (تلگرام، واتساپ) : 09364113060
                                            <br>
                                            <small class="text-danger">
                                                ساعات پاسخگویی تلفنی (جز تعطیلات رسمی) : شنبه تا پنجشنبه 11 الی
                                                20</small>

                                        </p>
                                        <p><strong>ساعات کاری</strong>
                                            <br>شنبه تا پنجشنبه: 11 صبح - 19 شب
                                        </p>
                                        <p><strong>مشتریان گرامی</strong><br>
                                            <small class="text-danger">
                                                مشتریان گرامی جهت پرداخت بصورت کارت به کارت میتوانند مبلغ مورد نظر را به
                                                شماره کارت زیر پرداخت نموده، سپس اسکرین شات مربوط به پرداخت را به شماره
                                                موبایل مذکور در بالا ارسال نمایند
                                                (دقت بفرمایید که هزینه ارسال نیز پرداخت شود):</small>
                                            <br>
                                            <strong>شماره کارت بانک ملت :
                                                6104337915729857
                                                بنام علی یزدانی</strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <h4 class="contact-us__header card-title">یک پیام برای ما بگذارید</h4>
                                    <form method="post" action="{{route('contact.messages')}}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="form-name">نام شما</label>
                                                <input type="text" id="form-name" class="form-control"
                                                       placeholder="نام شما" name="name">
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <h6 class="text-danger">{{ $errors->first('name') }}</h6>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="form-email">ایمیل</label>
                                                <input type="email" id="form-email" class="form-control"
                                                       placeholder="آدرس ایمیل" dir="ltr" name="email">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <h6 class="text-danger">{{ $errors->first('email') }}</h6>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="form-subject">موضوع</label>
                                            <input type="text" id="form-subject" class="form-control"
                                                   placeholder="موضوع" name="title">
                                            @if ($errors->has('title'))
                                                <span class="help-block">
                                                        <h6 class="text-danger">{{ $errors->first('title') }}</h6>
                                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="form-message">پیام</label>
                                            <textarea id="form-message" class="form-control" rows="4" name="description"></textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                        <h6 class="text-danger">{{ $errors->first('description') }}</h6>
                                                    </span>
                                            @endif
                                        </div>
                                        {!! NoCaptcha::renderJs() !!}
                                        <div class="row">
                                            <div class="col-md-12">
                                                {!! NoCaptcha::display() !!}
                                            </div>
                                            <div class="col-md-6">
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <span class="help-block">
                                                        <h6 class="text-danger">{{ $errors->first('g-recaptcha-response') }}</h6>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">ارسال پیام</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
