<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <title>{{ $series_item->originalTitle }}</title>



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

    .epi{
        margin-bottom: 5vh;
    }
    .epi h2{
        margin-top: 10vh;
        margin-bottom :7vh;
        text-align: center;
        font-size: 3.5vw;

    }
.epii{
    margin-left: 8vw;
    display: flex;
    flex-direction: row;
}
.epiis{
    display: flex;
    flex-direction: column;
}


    </style>
</head>
<body>
    <div class="container">
    <a href="/"><h1>{{ config('app.name') }}</h1></a>

            <div class="video">
            <div class="img">
            <img src="{{ $series_item->poster }}" alt="{{ $series_item->originalTitle }}">
        </div>

        <div class="detail">
        <h2>Details</h2>
        <table>
            <tr>
                <th>Title</th>
                <td>{{ $series_item->primaryTitle }} ({{ $series_item->originalTitle }})</td>
            <tr>
                <th>Genres</th>
                <td>
                    @foreach ($series_item->genres as $genre)
                    <a href="/series?genre={{ $genre->label }}">{{ $genre->label }}</a>
                    {{ $loop->last ? "" : "," }}
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Release</th>
                <td>{{ $series_item->startYear }}</td>
            </tr>
            <tr>
                <th>Runtime</th>
                <td>{{ $series_item->runtimeMinutes }} minutes</td>
            </tr>
            <tr>
                <th>Note</th>
                <td>{{ $series_item->averageRating }} ({{ $series_item->numVotes }} votes)</td>
            </tr>
        </table>
</div></div>
        <div class="plot">
        <h2>Plot</h2>
        <p>
            {{ $series_item->plot }}
        </p>
        </div>



    <div class="epi">
        <h2>Episodes</h2>
      
            @foreach ($series_item->seasons() as $seasonNumber => $episodes)
            <div class="epii">
            
            <h3>Season {{ $seasonNumber }}</h3>
            <div class="epiis">
                @foreach ($episodes->sortBy('episodeNumber') as $episodeNumber => $episode)
                   <p>{{ $episodeNumber }}</p>
                    <img src="{{ $episode->poster }}" alt="{{ $episode->originalTitle }}" style="width: 2rem">
                  <p>{{ $episode->originalTitle }}</p> 
                  

                @endforeach
                </div>
            @endforeach
           
        </div>



    </div>
</body>
</html>