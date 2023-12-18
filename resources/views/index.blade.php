<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        
        h1{
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
            color:rgb(34, 66, 48);
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
        <h1>TODAY'S NEWS</h1>
        <hr>
    <div class=news>
   
            
        @foreach($tech as $t)

            <div class="outer">
            

                <h1 class="title">
                    {{$t['title']}}
                </h1>

                <p class="des">
                    {{$t['description']}}
                </p>
               
                <img src="{{$t['image']}}" alt="">
                <p class="date">
                    {{$t['date']}}
                </p>
            


            </div>

        @endforeach

        </div>
        <div class=news>
            

        @foreach($game as $g)

            <div class="outer">
            

                <h1 class="title">
                    {{$g['title']}}
                </h1>

                <p class="des">
                    {{$g ['description']}}
                </p>
                <img src="{{$g['image']}}" alt="">
                <p class="date">
                    {{$g ['date']}}
                </p>
            


            </div>

        @endforeach

        </div>
        <div class=news>
           
        @foreach($tv as $tv )

            <div class="outer">
            

                <h1 class="title">
                    {{$tv['title']}}
                </h1>

                <p class="des">
                    {{$tv ['description']}}
                </p>
                <img src="{{$tv['image']}}" alt="">
                <p class="date">
                    {{$tv ['date']}}
                </p>
            


            </div>

        @endforeach

        </div>
        <div class=news>
           

        @foreach($web as $w)

            <div class="outer">
            

                <h1 class="title">
                    {{$w['title']}}
                </h1>

                <p class="des">
                    {{$w['description']}}
                </p>
                <img src="{{$w['image']}}" alt="">
                <p class="date">
                    {{$w['date']}}
                </p>
            


            </div>

        @endforeach

    </div>
</body>
</html>