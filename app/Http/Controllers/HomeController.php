<?php

namespace App\Http\Controllers;

use App\Models\Proprety;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $properties=Proprety::orderBy('created_at','DESC')->limit(100)->get();
        return view('home',compact('properties'));
    }
}
