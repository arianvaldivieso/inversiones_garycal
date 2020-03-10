<?php

namespace App\Http\Controllers;

use App\Feature;
use App\FeatureProperty;
use App\Property;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\collect;
use Illuminate\Support\Facades\Auth;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $for_delete = Property::where('address','')->get();

        Photo::whereIn('property_id',$for_delete->pluck('id')->all())->delete();
        FeatureProperty::whereIn('property_id',$for_delete->pluck('id')->all())->delete();
        Property::where('address','')->delete();
        $properties = Property::all();

        return view('admin/properties/index',[
            'properties' => $properties
        ]);
    }

    public function create(){

        $types = Property::types();
        $feactures = Feature::all();


        $property = Property::create([
            'address' => '',
            'description' => '',
            'referral_point' => '',
            'type' => 'casas',
            'status' => 'espera',
            'price' => '-1',
            'latitude' => '',
            'longitude' => ''
        ]);

        return redirect('admin/propiedades/'.$property->id)->with('status', 'Inserte los datos la propiedad!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Properties  $properties
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);
        $types = Property::types();
        $feactures = Feature::all();
        $property->imagePrincipal = collect($property->photos->where('principal',1)->all())->first();
        $property->photos = $property->photos->where('principal',0)->all();


        // dd($property->feactures->where('id',$feactures[0]->id)->count());

        return view('admin.properties.edit',compact('property','types','feactures'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Properties  $properties
     * @return \Illuminate\Http\Response
     */
    public function show(Properties $properties)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Properties  $properties
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {

        $rules = [
            'surface' => 'required|numeric',
            'rooms' => 'required|numeric',
            'baths' => 'required|numeric',
            'garages' => 'required|numeric',
            'address' => 'required',
            'referral_point' => 'required',
        ];


        $messages = [
            'surface.required' => 'La superficie cuadrada es requerida',
            'rooms.required' => 'El número de cuartos es requerido',
            'baths.required' => 'El número de baños es requerido',
            'garages.required' => 'El número de garages es requerido',
            'address.required' => 'La dirección es requerida',
            'referral_point.required' => 'el punto de referencia es requerido',


            'surface.numeric' => 'La superficie debe ser un numero',
            'rooms.numeric' => 'Los cuartos deben ser un numero',
            'baths.numeric' => 'Los baños deben ser un numero',
            'garages.numeric' => 'Los garages deben ser un numero',
        ];

        $this->validate($request,$rules,$messages);


        $property = Property::where('id', $request->id)
            ->update($request->only([
                "surface",
                "rooms",
                "baths",
                "garages",
                "address",
                "referral_point",
                "type",
                'status'
            ]));

        FeatureProperty::where('property_id',$request->id)->delete();

        if ($request->feactures) {
            foreach ($request->feactures as $feacture) {
                FeatureProperty::create([
                    'feature_id' => $feacture,
                    'property_id' => $request->id
                ]);
            }
        }

        return redirect('admin/propiedades/'.$request->id)->with('status', 'Propiedad editada correctamente!');



        // dd($validateData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Properties  $properties
     * @return \Illuminate\Http\Response
     */
    public function destroy(Properties $properties)
    {
        //
    }

    public function getPrincipals(){

        $properties = Property::where('principal',1)->get();

        $properties = $properties->map(function($p,$i){

            return [
                'address' => $p->address,
                'type' => $p->type,
                'image' => collect($p->photos->where('principal',1)->all())->first()
            ];

        })->all();


        return response()->json($properties);

    }
}
