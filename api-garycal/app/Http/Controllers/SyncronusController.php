<?php

namespace App\Http\Controllers;

use App\Feature;
use App\FeatureProperty;
use App\Photo;
use App\Property;
use Goutte\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\collect;




class SyncronusController extends Controller
{


	function getIdMl(string $string):string{
		$id = explode('/',$string);
		$id = $id[count($id) - 1];
		$id = explode('-',$id);
		$id =  Arr::only($id,[0,1]);
		return implode('',$id);
	}

	public function syncronus()
	{

		$this->insertProperties();

		$properties = Property::where('ml','!=',null)->get();

		$client = new Client();

		$properties->each(function($property) use ($client){
			$id = $this->getIdMl($property->ml);

			$propertyResponse =	$this->getDataOfApi('/items/'.$id);

			$attributes = collect($propertyResponse->attributes);
			$surface = ($attributes->where('id','TOTAL_AREA')->first()) ? $attributes->where('id','TOTAL_AREA')->first() : false;
			$property->address = $propertyResponse->location->address_line;
			$property->ml_id = $propertyResponse->id;
			$property->referral_point = $propertyResponse->title;
			$property->type = ($attributes->where('id','PROPERTY_TYPE')->first()) ? $attributes->where('id','PROPERTY_TYPE')->first()->value_name : 'casa';
			$property->status = ($propertyResponse->status == 'active') ? 1 : 0;
			$property->price = $propertyResponse->price;

			if ($surface) {
				$property->surface = $surface->value_struct->number;
			}

			$property->baths = ($attributes->where('id','FULL_BATHROOMS')->first()) ? $attributes->where('id','FULL_BATHROOMS')->first()->value_name : 0;
			$property->rooms = ($attributes->where('id','BEDROOMS')->first()) ? $attributes->where('id','BEDROOMS')->first()->value_name : 0;
			$property->garages = ($attributes->where('id','PARKING_LOTS')->first()) ? $attributes->where('id','PARKING_LOTS')->first()->value_name : 0;

			if (isset($propertyResponse->geolocation)) {
				$property->latitude = $propertyResponse->geolocation->latitude;
				$property->longitude = $propertyResponse->geolocation->longitude;
			}

			
			$property->principal = false;
			$property->city = $propertyResponse->location->city->name;

			$descriptions = $this->getDataOfApi('/items/'.$id.'/descriptions');

			
			$property->description = $descriptions[0]->plain_text;

			Photo::where('property_id',$property->id)->delete();

			if (!Photo::where('route',$propertyResponse->pictures[0]->secure_url)->count()) {
				$photo = new Photo([
          'route' => $propertyResponse->pictures[0]->secure_url,
          'principal' => true
      	]);

      	$property->photos()->save($photo);
			}

			
			foreach ($propertyResponse->pictures as $key => $picture) {

				if (!Photo::where('route',$picture->secure_url)->count()){
					$photo = new Photo([
            'route' => $picture->secure_url,
            'principal' => false
	        ]);

	        $property->photos()->save($photo);
				}
				
			}

			FeatureProperty::where('property_id',$property->id)->delete();

			$property->save();

			foreach ($attributes as $feacture) {
				$f = Feature::where('name',$feacture->name);
				if (!$f->count()) {
					$feacture = Feature::create([
	          'name' => $feacture->name,
	          'icon' => ''
	        ]);
				}

				FeatureProperty::create([
          'feature_id' => $f->first()->id,
          'property_id' => $property->id
        ]);
      	
      }

		});

		echo ('success');

	}

	public function insertProperties()
	{
    $page = env('ML_USER');
       
    $client = new Client();
       
    $crawler = $client->request('GET', $page);

    $crawler->filter('.ui-search-layout__item')->each(function ($property) {
        
      $mlLink = $property->filter('a.ui-search-link')->first();	
      $id = $this->getIdMl($mlLink->attr('href'));

      if (!Property::where('ml_id',$id)->count()) {
      	Property::create([
	        'ml' => $mlLink->attr('href'),
	        'ml_id' => $id
	      ]);
      }      
    });
	}


	public function getDataOfApi(string $url)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => env('ML_ENDPOINT').$url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return json_decode($response);
	}

}
