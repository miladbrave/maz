@extends('back.layout.master')

@section('content')
    @include('back.layout.sidebar')
    <div class="main-container gray-bg" id="app">
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12 animatedParent animateOnce z-index-46">
                    <div class="panel panel-default animated fadeInUp">
                        <div class="panel-body min-height-100">
                            <h1 class="page-title">
                                <span class="icon-users"></span>
                                لیست کاربران
                                <hr>
                            </h1>
                            <div class="panel-body wt-panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-border table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">نام</th>
                                            <th class="text-center">نام خانوادگی</th>
                                            <th class="text-center">ایمیل</th>
                                            <th class="text-center">تغییر رمز</th>
                                            <th class="text-center">وضعیت</th>
                                            <th class="text-center">ابزار</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{$user->fname}}</td>
                                                <td>{{$user->lname}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    <form method="post"
                                                          action="{{route('admin.update',$user->id)}}"
                                                          style="display: inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="row">
                                                            <input class="form-group" name="password" type="text">
                                                            <input class="btn btn-success" type="submit" value="ثبت">
                                                        </div>
                                                    </form>
                                                </td>
                                                <td>
                                                    @if($user->admin == 'user')
                                                        <a href="{{route('admin.edit',['admin' => $user->id])}}">
                                                            <button class="btn btn-default btn-rounded btn-sm"
                                                                    type="button"><i class="fa fa-gear"></i>ادمین
                                                            </button>
                                                        </a>
                                                    @elseif($user->admin == 'admin')
                                                        <span class="badge badge-pill badge-danger" style="margin-right: 2%">Admin</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form method="post"
                                                          action="{{route('admin.destroy',$user->id)}}"
                                                          style="display: inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-default btn-rounded btn-sm"
                                                                type="submit"><i class="icon-trash"></i> حذف
                                                        </button>
                                                    </form>
                                                    <button class="btn btn-default btn-rounded btn-sm" data-toggle="modal"
                                                            data-target="#user{{$user->id}}"><i class="icon-eye"></i>مشاهده
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="container">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @foreach($users as $user)
        <div class="modal fade" id="user{{$user->id}}" tabindex="-1" role="dialog"
             aria-labelledby="user{{$user->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">مشخصات کاربر</h5>
                    </div>
                    <div class="modal-body">
                        <strong>نام و نام خانوادگی : </strong>
                        <span class="text-danger">{{$user->fname}} {{$user->lname}}</span>
                        <br>
                        <hr>
                        <strong>ایمیل : </strong>
                        <span class="text-danger">{{$user->email}}</span>
                        <br>
                        <hr>
                        <strong>شهر : </strong>
                        <span class="text-danger">{{$user->city}}</span>
                        <br>
                        <hr>
                        <strong>استان : </strong>
                        <span class="text-danger">{{$user->province}}</span>
                        <br>
                        <hr>
                        <strong>آدرس : </strong>
                        <span class="text-danger">{{$user->address}}</span>
                        <br>
                        <hr>
                        <strong>کدپستی : </strong>
                        <span class="text-danger">{{$user->postcode}}</span>
                        <br>
                        <hr>
                        <strong>تلفن : </strong>
                        <span class="text-danger">{{$user->phone}}</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



@endsection
