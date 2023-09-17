<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Option;
use App\Models\Proprety;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PropretyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.properties.index',[
            'properties'=> Proprety::orderBy('created_at','DESC')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $said=new Proprety();
        $said->description='une petite description svp ';
        $said->rooms=3;
        $said->bedrooms=1;
        $said->floor=0;
        $said->city='Algerie';
        $said->postal_code=16000;
        $said->title='';
        $said->sold=false;


        return view('admin.properties.form',[
            'said'=>$said,
            'options'=>Option::pluck('name','id'),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {

        $said=$request->file('image')->store('images','public');
        $image =Image::make(public_path("storage/{$said}"))->fit(350,200);
        $image->save();
       $said1=Proprety::create([
           'title'=>$request->title,
       'description'=>$request->description,
       'surface'=>$request->surface,
       'rooms'=>$request->rooms,
       'bedrooms'=>$request->bedrooms,
        'floor'=>$request->floor,
        'price'=>$request->price,
        'city'=>$request->city,
        'address'=>$request->address,
        'postal_code'=>$request->postal_code,
        'sold'=>$request->sold,
            'image'=>$said,

        ]);
        $said1->options()->sync($request->validated('options'));

        return to_route('admin.property.index')->with('success','le bien a été crée');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $said= Proprety::findorfail($id);
        return view('admin.properties.form',[
            'said'=>$said,
            'options'=>Option::pluck('name','id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, $id)
    {


        $said1= Proprety::findorfail($id);
        $image=\request('image')->store('images','public');
        $said1->image=$image;
        $said1->title=$request->title;
        $said1->description=$request->description;
        $said1->surface=$request->surface;
        $said1->rooms=$request->rooms;
        $said1->bedrooms=$request->bedrooms;
        $said1->floor=$request->floor;
        $said1->price=$request->price;
        $said1->city=$request->city;
        $said1->address=$request->address;
        $said1->postal_code=$request->postal_code;
        $said1->sold=$request->sold;
        $said1->save();
        $said1->options()->sync($request->validated('options'));

        return to_route('admin.property.index')->with('success','le bien a été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $said= Proprety::findorfail($id);
        $said->delete();
        return to_route('admin.property.index')->with('success','le bien a été supprimée');
    }
}
