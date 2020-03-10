<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Property;
use Illuminate\Http\Request;

class UploadsController extends Controller
{
    function upload(Request $request)
    {
        $principal = ((int) $request->header('dropzone-principal')) ? 1 : 0;

        $property_id = $request->header('dropzone-property_id');

        $property = Property::find($property_id);

        // dd($property);

        $path = $request->file('file')->store('public/properties');

        $path = str_replace('public/','',$path);

        $photo = new Photo([
            'route' => $path,
            'principal' => $principal
        ]);

        $property->photos()->save($photo);

        return response()->json(['photo' => $photo]);
    }

    function delete(Request $request)
    {

        $image = Photo::find($request->id);
        $image->delete();
    }
}
