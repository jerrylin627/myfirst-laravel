<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getImg($file_path)
    {
        $file_path=str_replace('&','/',$file_path);//斜線不可在URL中傳
        $file=File::get($file_path);
        $type=File::mimeType($file_path);
        
        return response($file)->header("Content-Type",$type);
    }

}
