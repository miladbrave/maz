@extends('front.layouts.master')
@section('content')

    @if(Session::has('checkout'))
        <div class="alert alert-danger container" style="width: 100%">
            <div>{{ Session('checkout') }}</div>
        </div>
    @endif
    <div class="back2">
        <div class="container">
            <div class="justify-content-center">
                <div class="card2">
                    <div class="card-header" style="padding-bottom: 3%;">ورود</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label text-md-left">ایمیل
                                    :</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-left">
                                    پسوورد :</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="col-md-8 text-center">
                                    <div >
                                        <button type="submit" class="btn btn-primary">
                                            ورود
                                        </button>
                                        <a href="{{route('register')}}"  class="btn btn-primary">
                                            ثبت نام
                                        </a>
                                        <div class="form-check">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link ml-3" href="{{ route('password.request') }}">
                                                    فراموشی رمز
                                                </a>
                                            @endif
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label order-md-2" for="remember">
                                                به یاد بسپار
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
