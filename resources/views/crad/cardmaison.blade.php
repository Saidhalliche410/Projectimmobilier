<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .card {
            position: relative;
            width: 350px;
            aspect-ratio: 16/9;
            background-color: #f2f2f2;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            perspective: 1000px;
            box-shadow: 0 0 0 5px #ffffff80;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card svg {
            width: 48px;
            fill: #333;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card__image {
            width: 100%;
            height: 100%;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
        }

        .card__content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
            background-color: #f2f2f2;
            transform: rotateX(-90deg);
            transform-origin: bottom;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card:hover .card__content {
            transform: rotateX(0deg);
        }

        .card__title {
            margin: 0;
            font-size: 20px;
            color: #333;
            font-weight: 700;
        }

        .card:hover svg {
            scale: 0;
        }

        .card__description {
            margin: 10px 0 10px;
            font-size: 12px;
            color: #777;
            line-height: 1.4;
        }

        .card__button {
            padding: 15px;
            border-radius: 8px;
            background: #777;
            border: none;
            color: white;
        }

        .secondary {
            background: transparent;
            color: #777;
            border: 1px solid #777;
        }

    </style>
</head>
<body>
<div class="card" style="margin-bottom: 30px">
<img src="/storage/{{$i->image}}">
    <div class="card__content">
        <h1 class="card__title">Prix :{{$i->price}} $</h1>
        <ul>
            <li> Titre :{{$i->title}}</li>
            <li> Surface :{{$i->surface}}m2</li>
            <li> Cité: {{$i->city}}</li>
        </ul>
       <a href="{{route('bitch.show',['slug'=>$i->amin(),'i'=>$i])}}"> <button class="card__button" >Live Demo</button></a>
        <button class="card__button secondary">Source Code</button>
    </div>
</div>

</body>
</html>






