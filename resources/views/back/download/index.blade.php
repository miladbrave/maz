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
                                <span class="fa fa-download"></span>
                                لیست دانلود ها
                                <a href="{{route('download.create')}}" class="btn btn-default btn-rounded pull-right"
                                   type="button">+ ایجاد دانلود جدید </a>
                                <hr>
                            </h1>
                            <div class="panel-body wt-panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-border table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">دانلود</th>
                                            <th class="text-center">نام</th>
                                            <th class="text-center">متن</th>
                                            <th class="text-center">نوع</th>
                                            <th class="text-center">ابزار</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($downloads as $download)
                                            <tr>
                                                <td class="text-center" width="25%">
                                                    <a
                                                        href="{{route('download.show',['download' => $download->id])}}" class="badge badge-pill badge-info">
                                                        دانلود
                                                    </a>

                                                </td>
                                                <td class="text-center">{{$download->title}}</td>
                                                <td class="text-center">{{Str::limit($download->description,50)}}</td>
                                                <td class="text-center">{{$download->type}}</td>
                                                <td class="text-center">
                                                    <form method="post"
                                                          action="{{route('download.destroy',$download->id)}}"
                                                          style="display: inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-default btn-rounded btn-sm"
                                                                type="submit"><i class="icon-trash"></i> حذف
                                                        </button>
                                                    </form>
                                                    <a href="{{route('download.edit',$download->id)}}">
                                                        <button class="btn btn-default btn-rounded btn-sm"
                                                                type="button"><i class="icon-eye"></i> ویرایش
                                                        </button>
                                                    </a>
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
@endsection
