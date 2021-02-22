<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<h2 style="text-align: center">ثبت نام کاربر</h2><br><br>
<h3 style="text-align: right">
    جناب آقا/خانم

    <strong style="margin-right: 1%;margin-left: 2%;color: red">{{$user->fname}} {{$user->lname}}</strong>

    ثبت نام شما با موفقیت انجام پذیرفت.
</h3>

<table style=" border: 1px solid black;width: 100%;border-collapse: collapse">
    <tr style=" border: 1px solid black">
        <th style=" border: 1px solid black">ایمیل</th>
        <th style=" border: 1px solid black">شماره تماس</th>
    </tr>
    <tr style=" border: 1px solid black">
        <td style=" border: 1px solid black;text-align: center">{{$user->email}}</td>
        <td style=" border: 1px solid black;text-align: center">{{$user->phone}}</td>
    </tr>
</table>


<hr>


<div style="text-align: center">
    <img
        src="{{asset('/front/image/logo1.jpg')}}" alt="" width="60%" height="150px">
</div>


</body>
</html>
