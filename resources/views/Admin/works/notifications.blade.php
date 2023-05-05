<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1 style="margin: 87px">الاشعارات <span class="badge badge-success">{{$unread->count()}}</span></h1>
<table class="table" style="transform: translate(0%,40%); height:202px">
    @foreach($notifications as $notification)
<tr>
    <td>{{$notification->data['message']}}</td>
    <td>{{$notification->created_at}}</td>
    <td>{{$user->notifications()}}</td>
</tr>
@php
    $notification->markAsRead();
@endphp
@endforeach

</table>

</body>
</html>
