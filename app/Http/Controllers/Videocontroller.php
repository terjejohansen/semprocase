<?php

namespace App\Http\Controllers;

use App\Youtube;
use App\Category;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;


class Videocontroller extends Controller
{
    protected $menuController;
    protected $view;
    
    public function __construct(Menucontroller $menuController)
    {
        $this->menuController = $menuController;
        $this->view = $this->menuController->displayMenu();
    }
    
    public function all() {
        
        $search = DB::table('youtube')->where('youtube.ytHighlighted', 1)->get();
        
        $highlighted = DB::table('youtube')->find($search[0]->id);
        $videos = DB::table('youtube')->where('youtube.ytHighlighted', 0)->paginate(9);
        return $this->view->nest('content', 'video.list', compact('videos', 'highlighted'));
    }
    
    public function listByCategory() {
        $search = str_replace("/", "", $_SERVER["REQUEST_URI"]);

        $category = Category::where("caTitle", $search)->first();

        $category->videos;
        return $this->view->nest('content', 'video.category', compact('category'));

    }
    
    public function showSingle($item) {
        $videos = Youtube::where('ytShowVideoLink', "http://larve.wiso.cloud/video/{$item}")->first();
        $videos->categories;   

        return $this->view->nest('content', 'video.single', compact('videos'));
    }
}
