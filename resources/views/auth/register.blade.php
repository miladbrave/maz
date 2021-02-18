@extends('front.layouts.master')
@section('content')

    @if(Session::has('checkout'))
        <div class="alert alert-danger container" style="width: 100%">
            <div>{{ Session('checkout') }}</div>
        </div>
    @endif
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
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex mt-4 mt-md-0">
                        <div class="card flex-grow-1 mb-0">
                            <div class="card-body">
                                <h3 class="card-title">ثبت نام</h3>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="fname" class="col-md-3 text-md-left"> نام<span
                                                class="text-danger">*</span> :</label>
                                        <div class="col-md-6">
                                            <input id="fname" type="text"
                                                   class="form-control @error('fname') is-invalid @enderror text-right"
                                                   name="fname"
                                                   value="{{ old('fname') }}" required autocomplete="fname" autofocus>
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
                                                   value="{{ old('lname') }}" required autocomplete="lname" autofocus>
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
                                                   value="{{ old('email') }}" autocomplete="email">
                                            @error('email')
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
                                                   name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                                   data-mask="99999999999">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-3 text-md-left">رمز عبور<span
                                                class="text-danger">*</span> :</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password"
                                                   required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-3 text-md-left"> تایید رمز عبور <span
                                                class="text-danger">*</span>
                                            :</label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required autocomplete="new-password">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
