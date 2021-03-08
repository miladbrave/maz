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
                                <span class="fa fa-product-hunt"></span>
                                لیست محصولات
                                <a href="{{route('product.create')}}" class="btn btn-default btn-rounded pull-right"
                                   type="button">+ محصولات جدید </a>
                                <hr>
                            </h1>
                            <div class="panel-body wt-panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-border table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">شماره محصول</th>
                                            <th class="text-center">نام محصول</th>
                                            <th class="text-center">قیمت</th>
                                            <th class="text-center">وضعیت</th>
                                            <th class="text-center">تعداد</th>
                                            <th class="text-center">موجودیت</th>
                                            <th class="text-center">ابزار</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td class="text-center">{{$product->sku}}</td>
                                                <td class="text-center">{{$product->name}}</td>
                                                <td class="text-center">{{number_format($product->price)}}</td>
                                                <td class="text-center">{{$product->distribute}}</td>
                                                <td class="text-center">
                                                    <form action="{{route('productCount',$product->id)}}" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <input type="text" class="form-control col-md-8"
                                                                   name="count" value="{{$product->count}}"
                                                                   style="height: 25px;width: 60%;margin-right: 5%">
                                                            <button type="submit"
                                                                    class="btn btn-success btn-sm col-md-3 col-md-offset-1">
                                                                ثبت
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" @if($product->exist == 1) checked  @endif
                                                    class="form-group" id="check{{$product->id}}"
                                                           onchange="change({{$product->id}})">
                                                </td>
                                                <td class="text-center">
                                                    <form method="post"
                                                          action="{{route('product.destroy',$product->id)}}"
                                                          style="display: inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-default btn-rounded btn-sm"
                                                                type="submit"><i class="icon-eye"></i> حذف
                                                        </button>
                                                    </form>
                                                    <a href="{{route('product.edit',$product->id)}}">
                                                        <button class="btn btn-default btn-rounded btn-sm"
                                                                type="button"><i class="icon-trash"></i> ویرایش
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="container">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function change($id) {
            let checkbox = $('#check' + $id).is(":checked")
            console.log(checkbox)
            $.post('/api/exist', {
                "_token": "{{ csrf_token() }}",
                "id": $id,
                "checkbox": checkbox,
            })
            // }, res => {
            //     // $('.name').text(res.user.fname + ' ' + res.user.lname)
            //
            // })
        }


    </script>
@endsection
