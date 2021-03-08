@extends('back.layout.master')
@section('content')
    @include('back.layout.sidebar')
    <div class="main-container gray-bg">
        @include('back.layout.mainheader')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-3 animatedParent animateOnce z-index-50">
                            <div class="panel minimal panel-default animated fadeInUp">
                                <div class="panel-heading clearfix">
                                    <div class="panel-title"> اعضا</div>
                                </div>
                                <div class="panel-body">
                                    <div class="row col-with-divider">
                                        <div class="col-xs-6 text-center stack-order">
                                            <h3 class="no-margins">{{$users->count()}}</h3>
                                            <small>نفر</small>
                                        </div>
                                        <div class="col-xs-6 text-center stack-order">
                                            <h3 class="no-margins">{{$online->count()}}</h3>
                                            <small>آنلاین</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 animatedParent animateOnce z-index-48">
                            <div class="panel minimal panel-default animated fadeInUp">
                                <div class="panel-heading clearfix">
                                    <div class="panel-title">تعداد بازدید</div>
                                </div>
                                <div class="panel-body">
                                    <div class="stack-order">
                                        <h3 class="no-margins">{{(int)($visit/2)}} عدد </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 animatedParent animateOnce z-index-49">
                            <div class="panel minimal panel-default animated fadeInUp">
                                <div class="panel-heading clearfix">
                                    <div class="panel-title">مجموع فروش</div>
                                </div>
                                <div class="panel-body">
                                    <div class="stack-order">
                                        <h2 class="no-margins">{{number_format($totalrecive->sum('totalprice'))}}
                                            ریال </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 animatedParent animateOnce z-index-48">
                            <div class="panel minimal panel-default animated fadeInUp">
                                <div class="panel-heading clearfix">
                                    <div class="panel-title"> فاکتور و اقلام فروخته شده</div>
                                </div>
                                <div class="panel-body">
                                    <div class="row col-with-divider">
                                        <div class="col-xs-6 text-center stack-order">
                                            <h3 class="no-margins">{{$totalrecive->count()}} </h3>
                                            <small>عدد فاکتور</small>
                                        </div>
                                        <div class="col-xs-6 text-center stack-order">
                                            <h3 class="no-margins">{{array_sum($purchlists)}} </h3>
                                            <small>عدد جنس</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-8 animatedParent animateOnce z-index-49">
                    <div class="panel panel-default animated fadeInUp">
                        <div class="panel-heading clearfix">
                            <div class="panel-title">Bar Chart Example</div>
                            <ul class="panel-tool-options">
                                <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                                <li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
                                <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <canvas id="myChart"></canvas>
                        </div>

                    </div>
                </div>

            </div>
            <footer class="animatedParent animateOnce z-index-10 fixed-bottom">
                <div class="footer-main animated fadeInUp slow">&copy; 2020 <strong><a target="_blank" href="i7v.ir">Logic</a></strong>
                    Admin Theme by <a target="_blank" href="i7v.ir">Logic</a></div>
            </footer>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

@endsection

<script>
    window.onload = function () {
        char();
    };

    function char() {
        $.ajax({
            type: 'get',
            url: '/api/chart',
            dataType: "json",
            success: function (result, textStatus, jqXHR) {
                console.log(result);
                var data = [];
                data.push(result.price);
                console.log(data[0]);
                labels = ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];
                renderChart(data[0], labels);
            }
        });
        // data = [20000, 14000, 12000, 15000, 18000, 19000, 22000];
        // labels = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
        // labels = ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];
        // renderChart(data, labels);
    }

    function renderChart(data, labels) {
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    backgroundColor: 'rgba(249,0,94,0.45)',
                    borderColor: 'rgb(249,8,0)',
                    label: 'This week',
                    data: data,
                }]
            },
        });
    }


</script>
