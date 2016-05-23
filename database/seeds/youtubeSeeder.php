<?php

use App\Youtube;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class youtubeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('youtube')->delete();
        $url = "http://larve.wiso.cloud";
        Youtube::create(array(
            'ytTitle' => 'MARKEDSKOMMENTAR APRIL 2016',
            'ytDescription' => utf8_encode('Vi st�r foran den kommende sn�smeltingen i fjellet, s� hvordan ligger det an med tanke p� hydrologisk balanse og ressurs-situasjonen generelt i kraftmarkedet?'),
            'ytVideoLink' => 'https://youtu.be/1ZkjZVogTCc',
            'ytShowVideoLink' => $url."/video/markedskommentarapril2016",
            'ytBackgroundLink' => 'http://i2.ytimg.com/vi/1ZkjZVogTCc/maxresdefault.jpg',
            'ytHighlighted' => 1
        ));
        
        Youtube::create(array(
            'ytTitle' => 'MARKEDSKOMMENTAR JANUAR 2016',
            'ytDescription' => utf8_encode("Jan Jansrud og Thomas Mathisen gir deg �rets f�rste markedskommentar fra nyrenoverte kontorlokaler p� Vinstra. De g�r igjennom hva kuldeperioden vi hadde i januar gjorde med str�mprisene og ressurssituasjonen i markedet. Du f�r ogs� en pekepin p� hvordan str�mregningen din kan se ut i tiden fremover."),
            'ytVideoLink' => 'https://youtu.be/helm4DbH_AE',
            'ytShowVideoLink' => $url."/video/Markedskommentarjanuar2016",
            'ytBackgroundLink' => 'http://i2.ytimg.com/vi/helm4DbH_AE/maxresdefault.jpg',
            'ytHighlighted' => 0
        ));
        
        Youtube::create(array(
            'ytTitle' => 'MARKEDSKOMMENTAR DESEMBER 2015',
            'ytDescription' => utf8_encode("I v�r markedskommentar for desember 2015 gir vi deg en oppsummering p� prisniv�et og ressurssituasjonen i �ret som har g�tt. Vi snakker om forbrukerens totale str�mregning, hydrologisk balanse, magasinfyllinger, vindkraft og mer som p�virker deg som forbruker."),
            'ytVideoLink' => 'https://youtu.be/nBnj7wu8mG8',
            'ytShowVideoLink' => $url."/video/Markedskommentardesember2015",
            'ytBackgroundLink' => 'http://i2.ytimg.com/vi/nBnj7wu8mG8/maxresdefault.jpg',
            'ytHighlighted' => 0
        ));

        Youtube::create(array(
            'ytTitle' => 'MARKEDSKOMMENTAR FEBRUAR 2015',
            'ytDescription' => utf8_encode("Vi har tatt turen til sj�s og gir deg m�nedens markedskommentar fra dekk 13 p� Color Fantasy. Kraftprisene er lave, og det er ingen tegn til at vi f�r noen ny kuldeperiode i vinter som hever prisniv�ene. Produksjonen er god og vi prater utdypende om vindkraft og solenergi og hvordan dette vil p�virke kraftmarkedet etterhvert som utbyggingen blir st�rre."),
            'ytVideoLink' => 'https://youtu.be/QFGWAWQ5Ej0',
            'ytShowVideoLink' => $url."/video/Markedskommentarfebruar2015",
            'ytBackgroundLink' => 'http://i2.ytimg.com/vi/QFGWAWQ5Ej0/maxresdefault.jpg',
            'ytHighlighted' => 0
        ));

    }
}
