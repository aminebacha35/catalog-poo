<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Series</title>

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
            <a href="/series?genre={{ $genre->label }}">{{ $genre->label }}</a>
            {{ $loop->last ? "" : "," }}
            @endforeach
        </div>

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

        <div class="all">
            <table>
                @foreach ($series_paginator as $series_item)
                <tr>
                    <td>
                        <img class="list_image" src="{{ $series_item->poster }}" alt="{{ $series_item->primaryTitle }}">
                    </td>
                    <td>
                        <a style="text-decoration: none" href="/series/{{ $series_item->id }}">
                            {{ $series_item->originalTitle }}
                        </a>
                    </td>
                    <td>{{ $series_item->averageRating }}/10</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="link">
            {{ $series_paginator->links('paginator') }}
        </div>
    </div>
</body>
</html>
