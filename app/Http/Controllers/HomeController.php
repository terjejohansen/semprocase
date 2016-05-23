<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use App\Category;
use App\Youtube;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }
    
//     public function showWelcome()
//     {
//         return view('home');    
//     }
     
    /**
     * Displays all categories
     */
    public function category()
    {
        $category = DB::table('category')->paginate(10);
        return view('admin.category.all', compact('category'));    
    }

    /**
     * @param Category category object id
     * @return Display edit category webGUI form
     */
    public function edit(Category $category) {
        return view('admin.category.edit', compact('category'));
    }
    
    /**
     * Displays a view containing create category form
     */
    public function create() { 
       return view('admin.category.create', compact('category'));    
    }
    
    /**
     * @param $request:
     * The Request input from the form
     * A method to store a new category
     */
    public function storeCategory(Request $request) {
        $messages = [
            'caName.required' => utf8_encode('Kategorien må ha et navn.'),
        ];
        
        $required = ['caName' => 'required'];
        $this->validate($request, $required, $messages);
        
        $title = str_replace(" ", "", $request->caName);
        $title = strtolower($title);
        $category = new Category;
        $category->caName = $request->caName;
        $category->caTitle = $title;
        $category->save();
        return redirect()->action('HomeController@category');  
    }
    
    /**
     * @param $request:
     * The Request input from the form
     * A method to store a new category
     */
    public function deleteCategory(Category $category, Request $request) {

        if(!empty($request->newId)) {
            
            $id = $request->oldId;
            $youtube = Youtube::whereHas('categories', function ($query) use ($id) {
               $query->where('category_id', $id);
            })->get();
            
            foreach ($youtube as $item) {
                $item->categories()->detach();
                $item->categories()->attach($request->newId);
            }
            
        }
        $category->delete();
        
        return redirect()->action('HomeController@category'); 
    }
        
    /**
     * function to show form picker to keep the old category while you select a new one
     * Pass through array of all categories and currently selected id
     */
    public function newCategory(Category $category) {
        $allCategories = Category::all();
        
        return view('admin.category.keep', compact('category', 'allCategories'));
    }
    
    /**
     * Function that updates a category
     */
    public function updateCategory(Category $category, Request $request) {
        $messages = [
            'caName.required' => utf8_encode('Kategorien må ha et navn.'),
        ];
        
        $required = ['caName' => 'required'];
        $this->validate($request, $required, $messages);
        
        $title = str_replace(" ", "", $request->caName);
        $title = strtolower($title);
        
        $category->caName = $request->caName;
        $category->caTitle = $title;
        $category->save();

        return redirect()->back();
    }
    
    /*
     * Video handling
     */
    
    /**
     * Display all videos 10 at the time
     */
    public function video()
    {
        $video = DB::table('youtube')->paginate(10);
        return view('admin.video.all', compact('video'));
    }
    
    /**
     * Function to display video WEBgui form
     */
    public function createVideo()
    {
        $category = Category::all();
        return view('admin.video.create', compact('category'));  
    }
    
    /**
     * Function to create a new video
     */
    public function storeVideo(Request $request) {
        $messages = [
            'ytTitle.required' => utf8_encode('Filmen må ha en tittel.'),
            'ytVideoLink.required' => utf8_encode('Filmen må ha en link til videoen.'),
            'ytDescription.required' => utf8_encode('Filmen må ha en beskrivelse.'),
        ];
    
        
        $required = ['ytTitle' => 'required', "ytVideoLink" => "required", "ytDescription" => "required"];
        $this->validate($request, $required, $messages);
    
        $ytShowVideoLink = str_replace(" ", "", $request->ytTitle);
        $ytShowVideoLink = strtolower($ytShowVideoLink);
        
        $youtube = new Youtube;
        $youtube->ytTitle = $request->ytTitle;
        $youtube->ytVideoLink = $request->ytVideoLink;
        $youtube->ytShowVideoLink = "http://larve.wiso.cloud/video/".$ytShowVideoLink;
        $youtube->ytBackgroundLink = $request->ytBackgroundLink;
        $youtube->ytDescription = $request->ytDescription;
        $youtube->updated_at = date("Y-m-d H:i:s");
        $youtube->created_at = date("Y-m-d H:i:s");

        /*
         * Set highlighted = 0 if this is chosen for video
         */
        if(!empty($request->ytHighlighted)) {
            $affected = DB::table('youtube')->where('ytHighlighted', '=', 1)->update(array('ytHighlighted' => 0));
            $youtube->ytHighlighted = 1;
        }
        
        
        if($youtube->save()) {
            $youtube->categories()->attach([$request->idCategory]);
            
        }
        
        
        return redirect()->action('HomeController@video');
    }
    
    /**
     * Update video form:
     */
    public function editVideo(Youtube $youtube) {
        $category = Category::all();
        return view('admin.video.edit', compact('category', 'youtube'));
    }

    /**
     * Updates a video:
     */
    public function updateVideo(Youtube $youtube, Request $request) {
        $messages = [
            'ytTitle.required' => utf8_encode('Filmen må ha en tittel.'),
            'ytVideoLink.required' => utf8_encode('Filmen må ha en link til videoen.'),
            'ytDescription.required' => utf8_encode('Filmen må ha en beskrivelse.'),
        ];
    
        
        $required = ['ytTitle' => 'required', "ytVideoLink" => "required", "ytDescription" => "required"];
        $this->validate($request, $required, $messages);
    
        $ytShowVideoLink = str_replace(" ", "", $request->ytTitle);
        $ytShowVideoLink = strtolower($ytShowVideoLink);
        
        $youtube->ytTitle = $request->ytTitle;
        $youtube->ytVideoLink = $request->ytVideoLink;
        $youtube->ytShowVideoLink = "http://larve.wiso.cloud/video/".$ytShowVideoLink;
        $youtube->ytBackgroundLink = $request->ytBackgroundLink;
        $youtube->ytDescription = $request->ytDescription;
        $youtube->updated_at = date("Y-m-d H:i:s");
        $youtube->created_at = date("Y-m-d H:i:s");

        /*
         * Set highlighted = 0 if this is chosen for video
         */
        if(!empty($request->ytHighlighted)) {
            $affected = DB::table('youtube')->where('ytHighlighted', '=', 1)->update(array('ytHighlighted' => 0));
            $youtube->ytHighlighted = 1;
        }
        
        
        if($youtube->save()) {
            $youtube->categories()->attach([$request->idCategory]);
            
        }
        
        
        return redirect()->action('HomeController@video');
    }
    
    /**
     * @param $request:
     * The Request input from the form
     * A method to store a new category
     */
    public function deleteVideo(Youtube $youtube) {
        $youtube->delete();
            
        return redirect()->action('HomeController@video');
    }
}