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
    <form method="post" action="{{route('exchange-to-mmk')}}" enctype="multipart/form-data">
        @csrf
        <div class="">
            <label @class('form-label') for="">File</label>
            <input @class('form-control') name="photo" type="file" formenctype="multipart/form-data">
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Amount</label>
            <input class="form-control" name="amount" type="text">
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Currency</label>
            <input class="form-control" name="currency" type="text">
        </div>
        <button class="btn btn-outline-primary">Calculate</button>
    </form>
</div>
</body>
</html>
