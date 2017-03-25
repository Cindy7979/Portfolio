<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Libraries\AjaxResponse;
use App\Menu;
use App\Content;
use App\Image;
use App\Career;
use App\Portfolio;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menus'] = Menu::where('status', 1)->get();
        $data['portfolios'] = DB::table('contents')
            ->where('contents.type', 1)
            ->where('images.type', 1)
            ->join('images', 'contents.id', '=', 'images.content_id')
            ->select('contents.*', 'images.img_name')
            ->get();
        $data['skills'] = Content::where('type', 3)->get();
        $data['interests'] = DB::table('contents')
            ->where('contents.type', 4)
            ->join('images', 'contents.id', '=', 'images.content_id')
            ->select('contents.*', 'images.img_name')
            ->get();
        $data['introduce'] = Content::where('type', 5)->get();
        $data['career'] = Career::all();
        
        $text = (new \App\Documentation)->get('resume.md');
        $data['resume'] = markdown($text);

        return view('home', $data);
    }

    public function login() 
    {
        $data['menus'] = Menu::where('status', 1)->get();

        return view('auth.login', $data);
    }

    public function show($id) {

        $rsp = new AjaxResponse();

        $data['portfolio'] = DB::table('contents')
            ->where('contents.id', '=', $id)
            ->where('images.type', '=', 2)
            ->join('images', 'contents.id', '=', 'images.content_id')
            ->join('portfolios', 'contents.id', '=', 'portfolios.content_id')
            ->select('portfolios.*', 'images.img_name')
            ->get();

        if($data['portfolio'] == null) abort(404, $id."Model has not found");
        $data['html'] = \View::make('layouts.popup')->with('portfolio', $data['portfolio'])->render();

        $rsp->success=1;
        $rsp->data = $data;

        return $rsp -> toArray();
       
    }
}
