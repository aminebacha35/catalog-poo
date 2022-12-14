<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">

    <title>Movies</title>

    <style>
           * {
            margin: 0;
            background-color: white;
            text-align: center;
            font-family: poppins;
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
        .list_image {
            max-width: 2rem;
        }


    .gender{
        margin-left:10%;
        margin-right : 10%;
        margin-top:5%;
        margin-bottom: 5%;
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

        .all{
            margin-bottom :2%;

        }
        .all table {
            padding-left : 30%;
            padding-right:30%;
           width: 100%;
        }

        .link {
            margin-bottom:2%;
        }

    </style>
</head>
<body>
    <div class="container">
    <a href="/"><h1>{{ config('app.name') }}</h1></a>


        <div class="gender" style="margin-bottom: 2rem;">
            <strong>Genres: </strong>
            @foreach ($genres as $genre)
            <a href="/movies?genre={{ $genre->label }}">{{ $genre->label }}</a>
            {{ $loop->last ? "" : "," }}
            @endforeach
        </div>
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
        <div class="all">
            <table>
                @foreach ($movies_paginator as $movie)
                <tr>
                    <td>
                        <img class="list_image" src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
                    </td>
                    <td>
                        <a style="text-decoration: none" href="/movies/{{ $movie->id }}">
                            {{ $movie->originalTitle }}
                        </a>
                    </td>
                    <td>{{ $movie->averageRating }}/10</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="link">
            {{ $movies_paginator->links('paginator') }}
        </div>
    </div>
</body>
</html>
