<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">

    <title>{{ $movie->originalTitle }}</title>

    <style>
    * {
            margin: 0;
            background-color: white;
            font-family: poppins;
        }

  
        h1{
            color : white;
            text-align: center;
            background-color : black;
            text-align: center;
            font-size: 4vw;
            padding:5%;
        }
        a{
            text-decoration: none;
        }
       
        .video{
            margin-top: 10vh;
            display: flex;
            flex-direction: row;
            gap:10%;
            align-items: center;
            justify-content: center;
            margin-bottom: 6vh;
        }

        .video img{
            height: auto;
            width :25vw;
        }

    .detail h2{
        font-size: 3vw;
        margin-bottom: 5vh;
    }

    .detail th{
        font-size: 1.5vw;
        text-align: left;
    }

    .plot{
        text-align: center;
        margin-left: 6vw;
        margin-right: 6vw;
        margin-bottom: 6vh;

    }

    .plot h2{
        font-size: 3.5vw;

    }

    </style>
</head>
<body>
    <div class="container">
    <a href="/"><h1>{{ config('app.name') }}</h1></a>

        <div class="video">
            <div class="img">
            <img src="{{ $movie->poster }}" alt="{{ $movie->originalTitle }}">
        
            </div>
            <div class="detail">
        <h2>Details</h2>
        <table>
            <tr>
                <th>Title :</th>
                <td>{{ $movie->primaryTitle }} ({{ $movie->originalTitle }})</td>
            <tr>
                <th>Genres :</th>
                <td>
                    @foreach ($movie->genres as $genre)
                    <a href="/movies?genre={{ $genre->label }}">{{ $genre->label }}</a>
                    {{ $loop->last ? "" : "," }}
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Release :</th>
                <td>{{ $movie->startYear }}</td>
            </tr>
            <tr>
                <th>Runtime :</th>
                <td>{{ $movie->runtimeMinutes }} minutes</td>
            </tr>
            <tr>
                <th>Note :</th>
                <td>{{ $movie->averageRating }} ({{ $movie->numVotes }} votes)</td>
            </tr>
        </table>
        </div>
        </div>
        <div class="plot">
        <h2>Plot</h2>
        <p>
            {{ $movie->plot }}
        </p>
        </div>
    </div>
</body>
</html>
