<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .head{
            text-align:center;
        }
        .news{
            display:flex;
            flex-wrap:wrap;
            gap:20px;
            
        }
        .news .outer{
            border:2px solid black;
            margin-top:10px;
            flex: 1 1 20rem;
            padding:10px;
        }
        .news .outer .title{
            
        }
        .news .outer .des{
            font-family: Arial, Helvetica, sans-serif;
        }
        .news .outer .date{
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>

    <h1 class="head">TODAYS NEWS</h1>

<div class="news">

    @foreach($data as $d)

        <div class="outer">

            <h1 class="title">
                {{$d['title']}}
            </h1>

            <p class="des">
                {{$d ['description']}}
            </p>

            <p class="date">
                {{$d ['pubDate']}}
            </p>

        </div>

    @endforeach
</div>
</body>
</html>