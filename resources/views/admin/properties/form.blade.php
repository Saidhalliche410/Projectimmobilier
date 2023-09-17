@extends('admin.admin')
@section('title')
   {{$said->exists ? "Editer un bien":"Créer un bien"}}
@endsection


@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{route($said->exists ? 'admin.property.update':'admin.property.store',$said)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method($said->exists ? 'PUT':'post')
       <div class="row">
           @include('shared.input',['class'=>'col', 'label'=>'Titre', 'name'=> 'title' ,'value'=>$said->title] )
        <div class="col row">
            @include('shared.input',['class'=>'col', 'name'=> 'surface' ,'value'=>$said->surface] )
            @include('shared.input',['class'=>'col','label'=>'Prix', 'name'=> 'price' ,'value'=>$said->price] )
        </div>
           <div class="col row">
               @include('shared.input',['class'=>'col','type'=>'file','label'=>'Photo', 'name'=> 'image' ,'value'=>$said->image] )
           </div>
       </div>
        @include('shared.input',['class'=>'col','type'=>'textarea', 'name'=> 'description' ,'value'=>$said->description] )
        <div class="row">
            @include('shared.input',['class'=>'col', 'name'=> 'rooms','label'=>'Pieces' ,'value'=>$said->rooms] )
            @include('shared.input',['class'=>'col', 'name'=> 'bedrooms','label'=>'Chambres' ,'value'=>$said->bedrooms] )
            @include('shared.input',['class'=>'col', 'name'=> 'floor','label'=>'Étage' ,'value'=>$said->floor] )

        </div>
        <div class="row">
            @include('shared.input',['class'=>'col', 'name'=> 'address','label'=>'Addresse' ,'value'=>$said->address] )
            @include('shared.input',['class'=>'col', 'name'=> 'city','label'=>'Ville' ,'value'=>$said->city] )
            @include('shared.input',['class'=>'col', 'name'=> 'postal_code','label'=>'Code postal' ,'value'=>$said->postal_code] )

        </div>
        @include('shared.select',[ 'name'=> 'options','label'=>'Options' ,'value'=>$said->options()->pluck('id'),'multiple'=>true] )
        @include('shared.checkbox',[ 'name'=> 'sold','label'=>'Vendu' ,'value'=>$said->sold, 'options'=>$options] )
        <div>
            <button class="btn btn-primary">
                @if($said->exists)
                Modifier
                @else
                Créer
                @endif
            </button>
        </div>


    </form>
@endsection
