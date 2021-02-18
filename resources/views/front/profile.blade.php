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
                            <li class="breadcrumb-item active" aria-current="page">حساب کاربری</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>حساب کاربری</h1></div>
            </div>
        </div>


        <div class="container m-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="side-btn">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <a class="nav-link active account-nav__item" id="v-pills-home-tab" data-toggle="pill"
                               href="#v-pills-home"
                               role="tab"
                               aria-controls="v-pills-home" aria-selected="true">داشبورد</a>
                            <a class="nav-link account-nav__item" id="v-pills-profile-tab" data-toggle="pill"
                               href="#v-pills-profile"
                               role="tab"
                               aria-controls="v-pills-profile" aria-selected="false">ویرایش مشخصات</a>
                            <a class="nav-link account-nav__item" id="v-pills-list-tab" data-toggle="pill"
                               href="#v-pills-list"
                               role="tab"
                               aria-controls="v-pills-list" aria-selected="false">لیست خرید ها</a>
                            <a class="nav-link account-nav__item" id="v-pills-message-tab" data-toggle="pill"
                               href="#v-pills-message"
                               role="tab"
                               aria-controls="v-pills-message" aria-selected="false">پیام ها</a>
                            <a class="nav-link account-nav__item"
                               href="{{route('logout')}}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                               >خروج</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content side-btn" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">

                            <div class="dashboard">
                                <div class="dashboard__profile card profile-card">
                                    <div class="card-body profile-card__body">
                                        <div class="profile-card__avatar"><img src="/front/images/avatars/avatar-3.jpg"
                                                                               alt=""></div>
                                        <div class="profile-card__name">{{auth()->user()->fname}}</div>
                                        <div class="profile-card__email">{{auth()->user()->email}}</div>
                                        <div class="profile-card__edit"><a class="btn btn-secondary btn-sm"
                                                                           id="v-pills-profile-tab" data-toggle="pill"
                                                                           href="#v-pills-profile"
                                                                           role="tab"
                                                                           aria-controls="v-pills-profile"
                                                                           aria-selected="false">ویرایش پروفایل</a>
                                        </div>

                                    </div>
                                </div>
                                <div class="dashboard__address card address-card address-card--featured">
                                    <div class="address-card__badge">مشخصات</div>
                                    <div class="address-card__body">
                                        <div
                                            class="address-card__name">{{auth()->user()->fname}} {{auth()->user()->lname}}</div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">شهر</div>
                                            <div class="address-card__row-content"><span
                                                    class="ltr_text">{{auth()->user()->city}}</span></div>
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">شماره تلفن</div>
                                            <div class="address-card__row-content"><span
                                                    class="ltr_text">{{auth()->user()->phone}}</span></div>
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">آدرس ایمیل</div>
                                            <div class="address-card__row-content">{{auth()->user()->email}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                             aria-labelledby="v-pills-profile-tab">

                            <form method="POST" action="{{ route('userUpdate') }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="fname" class="col-md-3 text-md-left"> نام<span
                                            class="text-danger">*</span> :</label>
                                    <div class="col-md-6">
                                        <input id="fname" type="text"
                                               class="form-control @error('fname') is-invalid @enderror text-right"
                                               name="fname"
                                               value="{{ auth()->user()->fname }}" required autocomplete="fname"
                                               autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-md-3 text-md-left "> نام خانوادگی<span
                                            class="text-danger">*</span> :</label>
                                    <div class="col-md-6 ">
                                        <input id="lname" type="text"
                                               class="form-control @error('lname') is-invalid @enderror text-right"
                                               name="lname"
                                               value="{{auth()->user()->lname }}" required autocomplete="lname"
                                               autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-3 text-md-left"> ایمیل :</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email"
                                               value="{{ auth()->user()->email }}" autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="city" class="col-md-3 text-md-left"> شهر :</label>
                                    <div class="col-md-6">
                                        <input id="city" type="text"
                                               class="form-control @error('city') is-invalid @enderror"
                                               name="city"
                                               value="{{ auth()->user()->city }}" autocomplete="email">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="province" class="col-md-3 text-md-left"> استان :</label>
                                    <div class="col-md-6">
                                        <input id="province" type="text"
                                               class="form-control @error('province') is-invalid @enderror"
                                               name="province"
                                               value="{{ auth()->user()->province }}" autocomplete="province">
                                        @error('province')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-3 text-md-left"> آدرس :</label>
                                    <div class="col-md-6">
                                        <input id="address" type="text"
                                               class="form-control @error('address') is-invalid @enderror"
                                               name="address"
                                               value="{{ auth()->user()->address }}" autocomplete="address">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="postcode" class="col-md-3 text-md-left"> کدپستی :</label>
                                    <div class="col-md-6">
                                        <input id="postcode" type="text"
                                               class="form-control @error('postcode') is-invalid @enderror"
                                               name="postcode"
                                               value="{{ auth()->user()->postcode }}" autocomplete="postcode">
                                        @error('postcode')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-3 text-md-left"> شماره موبایل<span
                                            class="text-danger">*</span> :</label>
                                    <div class="col-md-6">
                                        <input id="phone" type="text"
                                               class="form-control @error('mobile') is-invalid @enderror"
                                               name="phone" value="{{ auth()->user()->phone }}" required
                                               autocomplete="phone"
                                               data-mask="99999999999">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-7">
                                        <button type="submit" class="btn btn-primary">
                                            ثبت نام
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="tab-pane fade" id="v-pills-list" role="tabpanel"
                             aria-labelledby="v-pills-list-tab">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center" scope="col">شماره فاکتور</th>
                                    <th class="text-center" scope="col">مبلغ فاکتور</th>
                                    <th class="text-center" scope="col">هزینه کرایه</th>
                                    <th class="text-center" scope="col">وضعیت</th>
                                    <th class="text-center" scope="col">تاریخ</th>
                                    <th class="text-center" scope="col">نمایش جزیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($userlists))
                                    @foreach($userlists as $userlist)
                                        <tr>
                                            <td class="text-center">{{$userlist->factor}}</td>
                                            <td class="text-center">{{$userlist->totalprice}}</td>
                                            <td class="text-center">{{$userlist->receiveprice}}</td>
                                            <td class="text-center">{{$userlist->status}}</td>
                                            <td class="text-center">{{Verta::instance($userlist->created_at)->format('%B %d، %Y')}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#myModal-{{$userlist['id']}}"><i
                                                        class="fa fa-envelope"></i>
                                                    نمایش
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>


                        </div>
                        <div class="tab-pane fade" id="v-pills-message" role="tabpanel"
                             aria-labelledby="v-pills-message-tab">


                            <div class="card-header">
                                <h5>پیام های دریافتی</h5></div>
                            <div class="card-divider"></div>
                            <div class="card-table">
                                <div class="table-responsive-sm">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="text-center">فرستنده</th>
                                            <th class="text-center">موضوع</th>
                                            <th class="text-center">تاریخ</th>
                                            <th class="text-center">مشاهده</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($messages as $message)
                                            <tr>
                                                <td class="text-center">{{$message->name}}</td>
                                                <td class="text-center">{{Str::limit($message->description,20)}}</td>
                                                <td class="text-center">{{Verta::instance($message->created_at)}}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                            data-target="#my-{{$message['id']}}"><i
                                                            class="fa fa-envelope"></i>
                                                        نمایش
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($userlists))
        @foreach($userlists as $userlist)
            <div class="modal fade" id="myModal-{{$userlist['id']}}" tabindex="-1" role="dialog"
                 aria-labelledby="{{$userlist['id']}}"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{$userlist['id']}}">شماره فاکتور : {{$userlist->factor}}</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @if(isset($purchlist))
                                    @foreach($purchlist as $purch)
                                        @foreach($purch->where('factor_number',$userlist->id) as $pur)
                                            @foreach($purchl->where('id',$pur->product_id) as $p)
                                                <div class="col-md-3">
                                                    <img src="{{asset($p->photos->first()->path)}}" alt="" width="100%"
                                                         height="100px">
                                                    {{$p->name}}<br>
                                                    <span
                                                        class="text-danger">{{number_format($p->price)}} ریال</span><br>
                                                    تعداد : {{$pur->count}}
                                                </div>
                                            @endforeach
                                            @foreach($downloads as $download)
                                                @if("download".$download->id == $pur->product_id)
                                                    <div class="col-md-3">
                                                        <img src="{{asset('/front/img/download.png')}}" alt=""
                                                             width="100%"
                                                             height="100px">
                                                        <strong>{{$download->title}}</strong><br><br>
                                                        <a
                                                            href="{{route('download.show',['download' => $download->id])}}"
                                                            class="badge badge-pill"
                                                            style="background-color: green;font-size:15px;">
                                                            دانلود
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    @if(isset($messages))
        @foreach($messages as $message)
            <div class="modal fade" id="my-{{$message['id']}}" tabindex="-1" role="dialog"
                 aria-labelledby="{{$message['id']}}"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{$message['id']}}">فرستنده : {{$message->name}}</h5>
                        </div>
                        <div class="modal-body">
                                {{$message->description}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection
