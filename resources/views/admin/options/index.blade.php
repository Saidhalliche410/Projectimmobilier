@extends('admin.admin')
@section('title')
    Tous les options
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1> @yield('title')</h1>
        <a href="{{route('admin.options.create')}}" class="btn btn-primary"> Ajouter une option</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>


        </tr>
        </thead>
        <tbody>
        @foreach($options as $i)
            <tr>
                <td>{{$i->name}}</td>



                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a  class="btn btn-primary" href="{{route('admin.options.edit',$i)}}"> Editer</a>
                        <form action="{{route('admin.options.destroy',$i)}}" method="post">
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

    {{$options->links()}}
@endsection
