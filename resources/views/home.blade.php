@extends('base')
@section('title','Mon agence')
@section('content')
<div class="bg-light p-5 mb-5 text-center">
<div class="container">
     <h1>Agence immobiliere</h1>
<p> Description</p>
</div>

</div>
    <div class="container ">
        <h1 style="margin: 10px;margin-bottom: 30px;color: #1d47b3">Nos derniers biens</h1>
        <div class="row">
            @foreach($properties as $i)

            <div class="col">
@include('crad.cardmaison')
            </div>
            @endforeach
        </div>
    </div>

@endsection
