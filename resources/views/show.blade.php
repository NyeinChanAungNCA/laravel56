<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Array Information</title>
</head>
<body>
<h1>Show Student Information</h1>
    <ul>
<!--        --><?php
//            foreach($students as $s){
//                echo "<li>{$s}</li>";
//            }
//        ?>
        @if(count($students)>0)
            @foreach($students as $s)
                <li>{{$s}}</li>
            @endforeach
        @endif
    </ul>
</body>
</html>