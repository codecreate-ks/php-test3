<html>
<head>
    <title>Hello/Index</title>
    <style>
        body {
            font-size: 16px;
            color: #999;
        }
        h1 {
            font-size: 120px;
            text-align: right;
            color: #f6f6f6;
            margin: 0px 0px -120px 0px;
        }
    </style>
</head>
<body>
    <h1>Blade/Index</h1>
    <ol>
    @php
    $counter = 0;
    @endphp
    @while ($counter < count($data))
        <li>{{$data[$counter]}}</li>
    @php
    $counter++;
    @endphp
    @endwhile
    </ol>
</body>
</html>