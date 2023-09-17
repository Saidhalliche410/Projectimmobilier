@extends('base')
@section('title ', 'Tous nos biens')

@section('content')
<div class="bg-light p-5 mb-5 text-center">
    <form action="" method="get" class="container d-flex gap-2">
<input type="number" name="surface"  placeholder="Surface minimum " class="form-control" value="{{$input['surface'] ?? ''}}">
<input type="number" name="rooms"  placeholder=" Nombre de piece minimum " class="form-control" value="{{$input['rooms'] ?? ''}}">
<input type="number" name="price"  placeholder="Budget max " class="form-control" value="{{$input['price'] ?? ''}}">
<input type="text" name="title"  placeholder="Mot clef" class="form-control" value="{{$input['title'] ?? ''}}">
        <button class="btn btn-primary btn-sm flex-grow-0">
Recherche
        </button>

    </form>

</div>


<div class="container">
    <div class="row">
        @forelse($properties as $i)

            <div class="col-4" style="margin-top: 20px">
                @include('crad.cardmaison')
            </div>
        @empty
            <div class="col" style="margin-top: 20px">
              <h1> Acun bien ne correspond a votre recherche</h1>
            </div>
        @endforelse
    </div>
    <div class="container my4">
        {{$properties->links()}}
    </div>
</div>




@endsection
