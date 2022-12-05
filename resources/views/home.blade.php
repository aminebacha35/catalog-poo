<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        * {
            margin: 0;
            background-color: white;
            text-align: center;
            font-family: poppins;
        }

        .wrapper {
            padding-left: 13vw;
            padding-right: 13vw;
            display: flex;
            flex-direction: row;
            gap : 5%;
        }

        .poster {
            object-fit: cover;
            width: 12vw;
            height : 40vh;
           
        }
        h1{
            color : white;
            background-color : black;
            text-align: center;
            font-size: 4vw;
            padding:5%;
        }
        a{
            text-decoration: none;
        }
        h3{
            margin-top: 5%;

            font-size: 3vw;
            margin-bottom: 5vh;

        }
        
        .list{
            font-size:2vw;
            display: flex;
            flex-direction: row;
            gap:2%;
            text-align: center;
            justify-content: center;
            margin-bottom: 5%;
        }

        .show{
            background-color: green;
            padding : 3px;
            border-radius: 15px;
            color : white;

        }

        .new{
            background-color: blue;
            padding : 3px;
            border-radius: 15px;
            color : white;

        }

        .best{
            background-color: purple;
            padding : 3px;
            border-radius: 15px;
            color : white;

        }
        
        .random{
            background-color: red;
            padding : 5px;
            border-radius: 15px;
            color : white;

        }

    </style>
</head>
<body>
    <div class="container">
        <a href="/"><h1>{{ config('app.name') }}</h1></a>

        <div>
            <h3>Movies</h3>

            <div class="list">
                <a class="show" href="/movies">
                    Show all movies
                </a>
                <a class="new" href="/movies?order_by=startYear&order=asc">
                    Newest movies
                </a>
                <a class="best" href="/movies?order_by=averageRating&order=desc">
                    Best rated movies
                </a>
                <a class="random" href="/movies/random">
                    Random movie
                </a>
            </div>

            <div class="wrapper">
                @foreach ($movies as $movie)
                <div>
                    <a href="/movies/{{ $movie->id }}">
                        <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}" class="poster">
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div>
            <h3>Series</h3>

            <div class="list">
                <a class="show" href="/series">
                    Show all series
                </a>
                <a class="new" href="/series?order_by=startYear&order=asc">
                    Newest series
                </a>
                <a class="best" href="/series?order_by=averageRating&order=desc">
                    Best rated series
                </a>
            </div>

            <div class="wrapper">
                @foreach ($series as $series_item)
                <div>
                    <a href="/series/{{ $series_item->id }}">
                        <img src="{{ $series_item->poster }}" alt="{{ $series_item->primaryTitle }}" class="poster">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <br><br><br>

</body>
</html>
