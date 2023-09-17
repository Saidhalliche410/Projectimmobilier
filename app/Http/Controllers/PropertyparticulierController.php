<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactrequest;
use App\Http\Requests\PropretyContactRequest;
use App\Http\Requests\SearchPropertyRequest;
use App\Mail\ContactMail;
use App\Mail\PropretycontactMail;
use App\Models\Proprety;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PropertyparticulierController extends Controller
{
public function index( SearchPropertyRequest $request){
    $properties=Proprety::query()->orderBy('created_at','DESC');
    if($request->validated('price')){
        $properties=$properties->where('price','<=',$request->validated('price'));
    }
    if($request->validated('surface')){
        $properties=$properties->where('surface','>=',$request->validated('surface'));
    }
    if($request->validated('rooms')){
        $properties=$properties->where('rooms','>=',$request->validated('rooms'));
    }
    if($request->validated('title')){
        $properties=$properties->where('title','like',"%{$request->validated('title')}%");
    }
    return view('property.index',[
        'properties'=>$properties->paginate(12),
       'input'=>$request->validated(),
    ]);

}
public function show(string $slug,Proprety $i){
if($slug!==$i->amin()){
    return to_route('property.show',['slug'=>$i->amin(),'said'=>$i]);
}
return view('property.show',[
'i'=>$i,
]);
}
public function contact(Proprety $proprety,PropretyContactRequest $request){

    Mail::send(new PropretycontactMail($proprety , $request->validated()));
    return back()->with('success', 'Votre demande de contact a bien été envoyé');

}
}
