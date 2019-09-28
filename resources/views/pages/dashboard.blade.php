<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Dashboard</h2>
    @if(Session::has('userid') && Session::has('userrole') && Session::get('userrole')=='teacher')
    <ul>
        <li><a href="">Teacher 1</a></li>
        <li><a href="">Teacher 2</a></li>
        <li><a href="">Teacher 3</a></li>
    </ul>
    @elseif(Session::has('userid') && Session::has('userrole') && Session::get('userrole')=='student')
    <ul>
        <li><a href="">Student 1</a></li>
        <li><a href="">Student 2</a></li>
        <li><a href="">Student 3</a></li>
    </ul>
    @else
    <ul>
        <li><a href="">Admin 1</a></li>
        <li><a href="">Admin 2</a></li>
        <li><a href="">Admin 3</a></li>
    </ul>

    @endif
</body>
</html>