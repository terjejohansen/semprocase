<?php

use App\Navigation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class navigationMenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('navigation')->delete();
        
        /*
         * Top menu
         */
        
        Navigation::create(array(
            'meName' => '',
            'meClass' => '',
            'parent_id' => '',
            'meLink' => 'http://www.facebook.com/GEkraft',
            'meTitle' => utf8_encode('GE.no på Facebook'),
            'meTarget' => '_blank',
            'meSpecial' => '',
            'meImageName' => 'facebook.png',
            'meState' => 1
        ));
        
        Navigation::create(array(
            'meName' => '',
            'meClass' => '',
            'parent_id' => '',
            'meLink' => 'https://twitter.com/gudbrenergi',
            'meTitle' => utf8_encode('GE.no på Twitter'),
            'meTarget' => '_blank',
            'meSpecial' => '',
            'meImageName' => 'twitter.png',
            'meState' => 1
        ));
        
        Navigation::create(array(
            'meName' => '',
            'meClass' => '',
            'parent_id' => '',
            'meLink' => 'https://plus.google.com/109609120776536429089/',
            'meTitle' => utf8_encode('GE.no på Google Plus'), 
            'meTarget' => '_blank',
            'meSpecial' => '',
            'meImageName' => 'googleplus.png',
            'meState' => 1
        ));
        
        Navigation::create(array(
            'meName' => '',
            'meClass' => '',
            'parent_id' => '',
            'meLink' => 'https://www.linkedin.com/company/gudbrandsdal-energi-as',
            'meTitle' => utf8_encode('GE.no på LinkedIn'),
            'meTarget' => '_blank',
            'meSpecial' => '',
            'meImageName' => 'linkedin.png',
            'meState' => 1
        ));
        
        Navigation::create(array(
            'meName' => '',
            'meClass' => '',
            'parent_id' => '',
            'meLink' => 'href="http://www.youtube.com/user/GudbrEnergi"',
            'meTitle' => utf8_encode('GE.no på Youtube'),
            'meTarget' => '_blank',
            'meSpecial' => '',
            'meImageName' => 'youtube.png',
            'meState' => 1
        ));
        
        Navigation::create(array(
            'meName' => '',
            'meClass' => '',
            'parent_id' => '',
            'meLink' => 'https://instagram.com/gudbrenergi/',
            'meTitle' => utf8_encode('GE.no på Instagram'),
            'meTarget' => '_blank',
            'meSpecial' => '',
            'meImageName' => 'instagram.png',
            'meState' => 1
        ));
        
        /*
         * Middle menu
         */
        Navigation::create(array(
            'meName' => '',
            'meClass' => 'logo',
            'parent_id' => '',
            'meLink' => 'https://www.ge.no',
            'meTitle' => '',
            'meTarget' => '_blank',
            'meSpecial' => '',
            'meImageName' => 'logo.png',
            'meState' => 2
        ));
        
        Navigation::create(array(
            'meName' => utf8_encode('Bestill strøm'),
            'meClass' => 'btn btn-secondary',
            'parent_id' => '',
            'meLink' => 'https://www.ge.no',
            'meTitle' => '',
            'meTarget' => '_blank',
            'meSpecial' => '',
            'meImageName' => '',
            'meState' => 2
        ));
        
    
    }
    

}
