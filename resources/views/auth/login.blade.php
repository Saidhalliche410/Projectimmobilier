@extends('base')

@section('title', 'Se connecter')

@section('content')
    <h2>Se connecter</h2>

    @include('shared.said')

    <form method="post " action="{{route('login')}}" class="vstac gap-3"  >
        @csrf

        @include('shared.input',['type'=>'email', 'class'=>'col','name'=>'email','label'=>'Email'])
        @include('shared.input',['type'=>'email', 'class'=>'col','name'=>'password','label'=>'Mot de passe'])
        <div class="btn btn-primary">
            <button>Se connecter</button>
        </div>



    </form>
