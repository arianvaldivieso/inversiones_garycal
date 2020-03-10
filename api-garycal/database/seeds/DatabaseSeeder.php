<?php

use App\Feature;
use App\Photo;
use App\User;
use App\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(PropertiesTableSeeder::class);
        $this->seedAdmin();
        $this->seedProperties();
        $this->seedFeactures();
    }

    function seedAdmin(){
        User::create([
            'name' => 'admin',
            'email' => 'inversionesgarycal@gmail.com',
            'password' => Hash::make('123456789')
        ]);
    }


    function seedProperties(){
        global $properties;
        global $photos;


        include 'data/properties.php';
        include 'data/photos.php';

        $rows = count($properties);

        echo $rows;
        echo "\n";
        $number = 0;

        $photos = collect($photos);


        foreach ($properties as $property) {

            $code = $property['codigo'];
            $photo = $property['foto_principal'];

            $property = [
                'address' => str_replace('"','',$property['direccion_exacta']),
                'description' => str_replace('<br />',' ',$property['especificaciones']),
                'referral_point' => str_replace('<br />',' ',$property['observaciones_direccion']),
                'type' => $property['tipo'],
                'status' => $property['status'],
                'price' => -1,
                'latitude' => '',
                'longitude' => '',
            ];

            $property_photos = collect($photos->where('codigo',$code)->all());

            // dd($property_photos);

            $property = Property::create($property);

            $photo = new Photo([
                'route' => $photo,
                'principal' => true
            ]);

            $property->photos()->save($photo);

            $property_photos->each(function($photo) use($property){

                $explode = explode('/',$photo['ruta_foto']);


                $photo = new Photo([
                    'route' => $explode[count($explode) - 1],
                    'principal' => false
                ]);

                $property->photos()->save($photo);
            });

            // break;






            $number += 1;
            echo round(($number/$rows) * 100,2) . '% -> Properties';
            echo "\n";

        }
    }


    function seedFeactures(){

        $feactures = [
            [
                'name' => 'Aire acondicionado',
                'icon' => ''
            ],
            [
                'name' => 'Piscina',
                'icon' => ''
            ],
            [
                'name' => 'Terraza',
                'icon' => ''
            ]
        ];

        foreach ($feactures as $feacture) {
            $feacture = Feature::create($feacture);
        }


    }
}
