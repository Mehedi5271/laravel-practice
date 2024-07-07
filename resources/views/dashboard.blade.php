<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


       <ul>
        <li>Allah is great</li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <a  onclick="event.preventDefault();
            this.closest('form').submit();" >Logout</a>
            </form>
        </li>
        <li> <a href="{{route('index.user')}}">All Type User </a> </li>
        <li> <a href="{{route('product.index')}}">All Products </a> </li>
       </ul>
</body>
</html>
