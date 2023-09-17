<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionRequest;
use App\Models\Option;


class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options=Option::paginate(25);
        return view('admin.options.index',compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $option=new Option();
        $option->name='';


        return view('admin.options.form',compact('option'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionRequest $request)
    {
        $option=new Option();

        $option->name=$request->name;
        $option->save();

        return to_route('admin.options.index')->with('success',"L'options a été crée");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $option= Option::findorfail($id);
        return view('admin.options.form',compact('option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OptionRequest $request, $id)
    {


        $option= Option::findorfail($id);
        $option->name=$request->name;

        $option->save();

        return to_route('admin.options.index')->with('success',"L'options a été modifiée");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option= Option::findorfail($id);
        $option->delete();
        return to_route('admin.options.index')->with('success',"L'options a été supprimée");
    }
}
