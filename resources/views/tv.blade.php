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
            padding:30px;
            border-radius:10px;
        }
        .news .outer:hover
        {
            box-shadow:0 0 10px black;
        }
        .news .outer .title{
            
        }
        .news .outer .des{
            font-family: Arial, Helvetica, sans-serif;
        }
        .news .outer .date{
            font-family: Arial, Helvetica, sans-serif;
        }
        img{
            width:100%;
            height:300px;
            object-fit:cover;
        }
    </style>
</head>
<body>
@include('header')
    <h1 class="head">TODAY'S NEWS</h1>
  <hr>
<div class="news">

    @foreach($data as $d)

        <div class="outer">

            <h1 class="title">
                {{$d['title']}}
            </h1>

            <p class="des">
                {{$d ['description']}}
            </p>
            <img src="{{$d['image']}}" alt="">
            <p class="date">
                {{$d ['pubDate']}}
            </p>

        </div>

    @endforeach
</div>
</body>
</html>