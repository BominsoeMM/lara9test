<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body>
<div class="p-3">
    <h1>YOUR {{$amount}} {{ strtoupper($formCurrency) }} RESULT IS => {{$result}}</h1>
    <a @class('btn btn-primary') href="{{route('exchange-result')}}">TRY ONE</a>
</div>
<div class="list-group p-3 w-50">
    <h3> Exchange History</h3>
    <ul>
        @foreach($records as $rec)
            <li class="list-group-item">
                YOUR {{$rec->input}} RESULT IS => {{$rec->output}}
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
