<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use App\Navigation;
use App\Category;
use Illuminate\Http\Request;

class Menucontroller extends Controller
{
    public function displayMenu() {
        $items = DB::table('navigation')->get();
        
        
        $toppmenu = "";
        $middlemenu = "";
        
        $target = "";
        $title = "";
        
        foreach ($items as $item) {
            if(empty($item->meTarget)) {
                $target = "";
            } else {
                $target = "target='{$item->meTarget}'";
            }
            
            if(empty($item->meTitle)) {
                $title = "";
            } else {
                $title = "title='{$item->meTitle}'";
            }
                        
            if($item->meState == 1) {
                $toppmenu .= "  <a href='". $item->meLink ."' {$target} {$title} class='small-icon-link'>
                                    <img src='/assets/media/{$item->meImageName}' class='top-icon-small'>
                                </a>";
            } elseif ($item->meState == 2) {            
                if(empty($item->meName)) {
                    $middlemenu .= "
                                    <a href='{$item->meLink}' {$target} class='{$item->meClass}'>";
                } else {
                    $middlemenu .= "<a href='{$item->meLink}' {$target} class='{$item->meClass}' id='btn-more-power'>";
                }
            
                if(!empty($item->meImageName)) {
                    $middlemenu .= "<img src='/assets/media/{$item->meImageName}' class='icon-logo-header hide-mobile-md' style='width:167px; height: 45px;'>";
                }
                    
                $middlemenu .= "{$item->meName}</a>";
            } 
                
        }
        
        $path =  "{$_SERVER['REQUEST_URI']}";
        $temp = explode("?", $path);
        
        $path = $temp[0];
        
        // Build the category navigation;
        $items = DB::table('category')->get();
        
        if($path == "/") {
            $class = "active";
        } else {
                $class = "btn-transparent";
        }
        
        $bottommenu = "<li>
                            <a href='/' class='{$class}' id='btn-more-power'>ALLE</a>
                        </li>
                    ";
        foreach ($items as $item) {

            if($path == $item->caTitle || (str_replace("/", "", $path) == $item->caTitle)) {
                $class = "active";
            } else {
                $class = "btn-transparent";
            }
            
            if($item->caTitle == "/") {
                $bottommenu .= "    <li>
                                        <a href='{$item->caTitle}' class='{$class}' id='btn-more-power'>{$item->caName}</a>
                                    </li>
                                ";
            } else {
                $bottommenu .= "    <li>
                                        <a href='/{$item->caTitle}' class='{$class}' id='btn-more-power'>{$item->caName}</a>
                                    </li>
                                ";
            }
        }
        
        
        $menu = array("topMenu" => $toppmenu, "middleMenu" => $middlemenu, "bottomMenu" => $bottommenu);
        
        
        return view('layouts.menuLayout', compact('menu'));
    }
}
