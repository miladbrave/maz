@extends('front.layouts.master')
@section('content')
    <div class="site__body">
        <div class="block about-us">
            <div class="about-us__image"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-10">
                        <div class="about-us__body">
                            <h1 class="about-us__title">درباره ما</h1>
                            <div class="about-us__text typography">
                                <strong> تبریز ربات ؛ فروشگاه آنلاین انواع قطعات رباتیک
                                </strong>
                                <p style="text-align: justify">
                                    این فروشگاه اینترنتی به مدیریت دکتر علی یزدانی دکترای مدیریت تکنولوژی و کارشناسی
                                    ارشد رشته مکاترونیک و سرپرست تیم پر افتخار رباتیک ایلدیریم تبریز مفتخر است قطعات
                                    کامل رباتیک در تبریز را بصورت آنلاین و همچنین حضوری ارائه نماید. انواع قطعات رباتیک،
                                    بدنه های رباتیک، سازه های دانش آموزی، پک های آموزشی رباتیک در تبریز قابل ارائه‌‌
                                    می‌باشند.
                                </p>
                            </div>
                            <hr>
                            <div class="about-us__team">
                                @foreach($tags as $tag)
                                    <a href="{{route('tags',$tag->title)}}" class="badge badge-danger">{{$tag->title}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
