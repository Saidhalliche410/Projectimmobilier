
@extends('base')
@section('title',$i->title)
<style>
    .form {
        margin-left: 320px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-width:650px;
        padding: 20px;
        border-radius: 20px;
        position: relative;
        background-color: #1a1a1a;
        color: #fff;
        border: 1px solid #333;
    }

    .title {
        font-size: 28px;
        font-weight: 600;
        letter-spacing: -1px;
        position: relative;
        display: flex;
        align-items: center;
        padding-left: 30px;
        color: #00bfff;
    }

    .title::before {
        width: 18px;
        height: 18px;
    }

    .title::after {
        width: 18px;
        height: 18px;
        animation: pulse 1s linear infinite;
    }

    .title::before,
    .title::after {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        border-radius: 50%;
        left: 0px;
        background-color: #00bfff;
    }

    .message,
    .signin {
        font-size: 14.5px;
        color: rgba(255, 255, 255, 0.7);
    }

    .signin {
        text-align: center;
    }

    .signin a:hover {
        text-decoration: underline royalblue;
    }

    .signin a {
        color: #00bfff;
    }

    .flex {
        display: flex;
        width: 100%;
        gap: 6px;
    }

    .form label {
        position: relative;
    }

    .form label .input {
        background-color: #333;
        color: #fff;
        width: 100%;
        padding: 20px 05px 05px 10px;
        outline: 0;
        border: 1px solid rgba(105, 105, 105, 0.397);
        border-radius: 10px;
    }

    .form label .input + span {
        color: rgba(255, 255, 255, 0.5);
        position: absolute;
        left: 10px;
        top: 0px;
        font-size: 0.9em;
        cursor: text;
        transition: 0.3s ease;
    }

    .form label .input:placeholder-shown + span {
        top: 12.5px;
        font-size: 0.9em;
    }

    .form label .input:focus + span,
    .form label .input:valid + span {
        color: #00bfff;
        top: 0px;
        font-size: 0.7em;
        font-weight: 600;
    }

    .input {
        font-size: medium;
    }

    .submit {
        border: none;
        outline: none;
        padding: 10px;
        border-radius: 10px;
        color: #fff;
        font-size: 16px;
        background-color: #00bfff;
    }

    .submit:hover {
        background-color: #00bfff96;
    }

    @keyframes pulse {
        from {
            transform: scale(0.9);
            opacity: 1;
        }

        to {
            transform: scale(1.8);
            opacity: 0;
        }
    }
</style>

@section('content')
<div style="margin-left: 320px">
<h1>{{$i->title}}</h1>
<h2>{{$i->rooms}} pièce -  {{$i->surface}} Mètre carré</h2>
<div class="text-primary fw-bold" style="font-size: 4rem">
    {{number_format($i->price)}} $
</div>
</div>
<hr>

    <div class="mt-4">
        <h1 style="margin-left:440px "> intéressé par ce bien ?</h1>

<div style="text-align: center;align-items: center">
        @include('shared.said')
</div>
        <form action="{{route('said.contact',$i) }}" class="form" method="post" >
            @csrf
            <p class="title">Contact Nous</p>
            <p class="message"> Svp entrer des vrais identités </p>
            <div class="flex">
                <label>
                    <input style="width: 301px" class="input" value="john" name="firstname" type="text" placeholder="" required="">
                    <span>Firstname</span>
                </label>

                <label>
                    <input style="width: 301px"  class="input" value="doe" type="text" name="lastname" placeholder="" required="">
                    <span>Lastname</span>
                </label>
            </div>

            <label>
                <input class="input" name="email" value="john@deopublic.fr" type="email" placeholder="" required="">
                <span>Email</span>
            </label>

            <label>
                <input class="input" name="phone" value="06000606000" type="text" placeholder="" required="">
                <span>Télephone</span>
            </label>
            <label>
                <textarea class="input" name="message"   placeholder="" style="max-height: 200px;min-height: 40px"></textarea>
                <span>Votre message</span>
            </label>
            <button class="btn btn-primary"  >Nous contacter</button>
        </form>


        <div class="row" style="margin-left: 30px" >
            <div class="col-7">
                <h2>Caractéristique</h2>
                <table  class="table table-striped" style="width:700px ">
                    <tr>
                        <td> Surface habitable</td>
                        <td>{{$i->surface}} Mètre carré</td>
                    </tr>
                    <tr>
                        <td>  Pièces</td>
                        <td>{{$i->rooms}}</td>
                    </tr>
                    <tr>
                        <td> Chambres</td>
                        <td>{{$i->bedrooms}}</td>
                    </tr>
                    <tr>
                        <td> Étage</td>
                        <td>{{$i->floor ?: 'Rez de chaussé'}} </td>
                    </tr>
                    <tr>
                        <td > Localisation</td>
                        <td> address:{{$i->address }}
                            <hr>

                       cité:   {{$i->city}}
                            <hr>
                           code postal:  {{$i->postal_code}}
                        </td>
                    </tr>

                </table>
            </div>

        <div class="col-4" >
       <h2>Spécificités</h2>
            <ul class="list-group">
                @foreach($i->options as $d)
                    <li class="list-group-item">{{$d->name}}</li>

                @endforeach

            </ul>
        </div>
    </div>
    </div>


@endsection
