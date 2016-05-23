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
            'caTitle' => utf8_encode('læromstrøm'),
            'caName' => utf8_encode('Lær om strøm'),
            'caActive' => 1
        ));
        
        Category::create(array(
            'caTitle' => utf8_encode('snøogførerapport'),
            'caName' => utf8_encode("Snø og førerapport"),
            'caActive' => 1
        ));
        
        Category::create(array(
            'caTitle' => 'energiqflyt',
            'caName' => 'Energiq- flyt',
            'caActive' => 1
        ));
        
    }
}
