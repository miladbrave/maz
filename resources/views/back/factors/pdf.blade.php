<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>میلاد</title>
</head>
<body style="font-family: 'iransans'">

<h5 style="text-align: center">فاکتور فروش</h5>
<h3 style="text-align: center">فروشگاه تبریز ربات </h3>

<table style=" border: 0px solid black;width: 100%;border-collapse: collapse">
    <tr style=" border: 0px">
        <th style=" border: 0px ;text-align: left;;padding: 10px">{{Verta::instance($userlists->created_at)->format('%B %d، %Y')}}</th>
        <th style=" border: 0px ;text-align: right;;padding: 10px"> نام خریدار : {{$user->fname}} {{$user->lname}} </th>
    </tr>
</table>

<div>
    <hr>
    <table style=" border: 1px solid black;width: 100%;border-collapse: collapse;font-size: 16px">
        <tr style=" border: 1px solid black;font-size: 16px">
            <th style=" border: 1px solid black;padding: 5px">قیمت محصول</th>
            <th style=" border: 1px solid black;padding: 5px">تعداد محصول</th>
            <th style=" border: 1px solid black;padding: 5px">نام محصول</th>
        </tr>
        @foreach($purchlists as $purch)
            @foreach($purch->where('factor_number',$userlists->id) as $pur)
                @foreach($purchl->where('id',$pur->product_id) as $p)
                    <tr style=" border: 1px solid black">
                        <td style=" border: 1px solid black;text-align: center;width: 30%">
                            <span style="color: red">  {{number_format($p->price)}} ریال </span>
                        </td>
                        <td style=" border: 1px solid black;text-align: center;width: 20%">{{$pur->count}}</td>
                        <td style=" border: 1px solid black;text-align: center;width: 20%"> {{$p->name}}</td>
                    </tr>
                @endforeach
            @endforeach
        @endforeach
        <tr style=" border: 1px solid black;padding: 10px">
            <td style=" text-align: center">{{$userlists->receiveprice}}</td>
            <td style=" text-align: center"></td>
            <td style=" text-align: center;font-weight: 900">هزینه ارسال</td>
        </tr>
    </table>

    <table>
        <tr style=" border: 1px solid black">
            <td style=" border: 1px solid black;padding: 5px">{{number_format($userlists->totalprice)}} ریال </td>
            <th style=" border: 1px solid black;padding: 5px">قیمت کل</th>
        </tr>
        <tr style=" border: 1px solid black">
            <td style=" border: 1px solid black;padding: 5px">{{number_format($userlists->totalprice + $userlists->receiveprice) }} ریال </td>
            <th style=" border: 1px solid black;padding: 5px">مبلغ پرداخت شده (با حمل و نقل)</th>
        </tr>
    </table>
</div>
<hr>


<div>
    <h5 style="text-align: right">
        <strong>نشانی : </strong>
        <span>تبریز - چهارراه محققی - پاساژ چهلستون نو - زیر زمین - پلاک 4 فروشگاه مبتکران</span><br>
        <strong>تلفن : </strong>
        <span>041 35576982 - 09148413695</span>
    </h5>
</div>

<hr style="height: 10px;margin-top: 1%;margin-bottom: 1%">

<div>
    <table style=" border: 1px solid black;width: 100%;border-collapse: collapse">
        <tr style=" border: 1px solid black">
            <th style=" border: 0px ;text-align: left;">
                <img style="height: 100px;width: 50%" src="{{public_path() . '/front/image/logo1.jpg'}}" alt="">
            </th>
            <th style=" border: 0px ;text-align: right;padding: 10px"> فروشگاه تبریز ربات (مبتکران آذر ذهن) </th>
        </tr>
    </table>
</div>


<div>
    <h5 style="text-align: right"> : فرستنده</h5>
    <h4 style="text-align: right">تبریز - چهارراه محققی - پاساژ چهلستون نو - زیر زمین - پلاک 4 - فروشگاه مبتکران</h4>
    <h4 style="text-align: right">   5133647991 : کدپستی</h4>
    <h4 style="text-align: right"> 041 35576982 - 09148413695 :  شماره تماس</h4>

    <hr>

    <h5 style="text-align: right"> : گیرنده</h5>
    <h4 style="text-align: right">{{$user->fname}} {{$user->lname}}  </h4>
    <h4 style="text-align: right">{{$user->province}} - {{$user->city}} - {{$user->address}} </h4>
    <h4 style="text-align: right">{{$user->postcode}} : کد پستی  </h4>
    <h4 style="text-align: right">{{$user->phone}} : شماره تماس  </h4>

</div>

</body>
</html>
