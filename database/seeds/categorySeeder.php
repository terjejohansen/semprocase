<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->delete();
        
        Category::create(array(
            'caTitle' => 'markedskommentar',
            'caName' => 'Markedskommentar',
            'caActive' => 1
        ));
        
        Category::create(array(
            'caTitle' => 'norwayfreeride',
            'caName' => 'Norway freeride',
            'caActive' => 1
        ));
        
        Category::create(array(
            'caTitle' => 'kvitfjellworldcup',
            'caName' => 'Kvitefjell world cup',
            'caActive' => 1
        ));
        
        Category::create(array(
            'caTitle' => 'elbil',
            'caName' => 'Elbil',
            'caActive' => 1
        ));
        
        Category::create(array(
            'caTitle' => utf8_encode('l�romstr�m'),
            'caName' => utf8_encode('L�r om str�m'),
            'caActive' => 1
        ));
        
        Category::create(array(
            'caTitle' => utf8_encode('sn�ogf�rerapport'),
            'caName' => utf8_encode("Sn� og f�rerapport"),
            'caActive' => 1
        ));
        
        Category::create(array(
            'caTitle' => 'energiqflyt',
            'caName' => 'Energiq- flyt',
            'caActive' => 1
        ));
        
    }
}
