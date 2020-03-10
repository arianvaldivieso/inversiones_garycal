<?php

namespace App\Http\Controllers;

use App\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index(){

        $feactures = Feature::all();

        return view('admin.feactures.index',compact('feactures'));

    }
}
