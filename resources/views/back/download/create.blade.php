@extends('back.layout.master')

@section('content')
    @include('back.layout.sidebar')
    <div class="main-container gray-bg" id="app">
        <div class="main-content">
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 animatedParent animateOnce z-index-46">
                        <div class="panel panel-default animated fadeInUp">
                            <div class="panel-body min-height-100">
                                <h1 class="page-title">
                                    <span class="fa fa-download"></span>
                                    افزودن محصول دانلود جدید
                                    <a href="{{url()->previous()}}" class="btn btn-default btn-rounded pull-right mob"
                                       type="button"> بازگشت <span class="icon-left-open"></span></a>
                                    <hr>
                                </h1>
                                <form action="{{route('download.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group @if($errors->has('description')) has-error @endif">
                                                <label>توضیح</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                                    <input type="text" class="form-control" name="description" required
                                                           value="{{old('description')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group @if($errors->has('price')) has-error @endif">
                                                <label>قیمت (تومان)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                                    <input type="text" class="form-control" name="price" required
                                                           value="{{old('price')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="col-sm-9 control-label">نوع فایل</label>
                                                <select class="select2 form-control" name="type">
                                                    <option value="ویدیو">ویدیو</option>
                                                    <option value="تصویر">تصویر</option>
                                                    <option value="نقشه">نقشه</option>
                                                    <option value="سایر">سایر</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group @if($errors->has('title')) has-error @endif">
                                            <label>نام</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                                <input type="text" class="form-control" name="title" required
                                                       value="{{old('titel')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">تصویر</label>
                                        <input type="file" class="form-control-file" id="image" name="file">
                                    </div>
                                    <hr>
                                    <input class="btn btn-success" type="submit" value="ثبت">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="animatedParent animateOnce z-index-10">
                <div class="footer-main animated fadeInUp slow">&copy; 2020 <strong><a target="_blank"
                                                                                       href="i7v.ir">Logic</a></strong>
                    Admin Theme by <a target="_blank" href="i7v.ir">Logic</a></div>
            </footer>
        </div>
    </div>
@endsection

