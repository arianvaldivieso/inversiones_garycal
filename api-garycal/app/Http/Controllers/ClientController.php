<?php

namespace App\Http\Controllers;

use App\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;

class ClientController extends Controller
{
    public function index(){

        $sliders = Property::limit(4)->orderBy('created_at')->get();

        $sliders = $sliders->map(function($p,$i){

            return [
                'address' => $p->address,
                'type' => $p->type,
                'image' => collect($p->photos->where('principal',1)->all())->first()
            ];

        })->all();

        $last_properties = Property::limit(8)->orderBy('created_at')->get();

        $last_properties = $last_properties->map(function($p,$i){

            $p->image = collect($p->photos->where('principal',1)->all())->first()->route;

            $aux = (strpos($p->image, 'properties') === false) ? 'https://www.inversionesgarycal.com.ve/imagenes/casas' : url('storage');

            $p->image = $aux .'/'.$p->image;

            return $p;

        })->all();

        return view('welcome',compact('sliders','last_properties'));
    }

    public function properties(){

        $properties = Property::paginate(10);

        return view('properties',compact('properties'));
    }

    public function showProperty($id){
        $property = Property::where('id',$id)->first();


        $similars = Property::whereNotIn('id',[$id])->limit(3)->orderBy('created_at')->get();

        return view('property',compact('property','similars'));
    }

    public function about(){

        $firstDate = Carbon::parse('first day of January 2008');
        $dueDate = Carbon::parse(Carbon::today());

        $days = $dueDate->diffInDays($firstDate);


        $data = [
            'properties' => Property::all()->count(),
            'solds' => Property::where('status','vendida')->count(),
            'days' => $days
        ];


        return view('about',compact('data'));

    }
}
