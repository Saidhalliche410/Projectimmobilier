@extends('admin.admin')
@section('title')
    Tous les biens
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1> @yield('title')</h1>
        <a href="{{route('admin.property.create')}}" class="btn btn-primary"> Ajouter un bien</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th class="text-end">Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach($properties as $i)
            <tr>
                <td>{{$i->title}}</td>
                <td>{{$i->surface}}</td>
                <td>{{number_format($i->price)}}</td>
                <td>{{$i->city}}</td>


                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a  class="btn btn-primary" href="{{route('admin.property.edit',$i)}}"> Editer</a>
                        <form action="{{route('admin.property.destroy',$i)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" >Supprimer</button>
                        </form>
                    </div>
                </td>


            </tr>
        @endforeach


        </tbody>
    </table>

    {{$properties->links()}}
@endsection
