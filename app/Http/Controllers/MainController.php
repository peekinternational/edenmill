<?php

namespace Edenmill\Http\Controllers;

use Edenmill\Gallery;
use Edenmill\Products;
use Edenmill\Slider;
use Illuminate\Http\Request;

use Edenmill\Http\Requests;

class MainController extends Controller
{
        public function home_page(Request $request){
                     $slides = Slider::orderBy('order_by','asc')->get();
                $latest_products = Products::latest(12)->get();
                $gallery = Gallery::all();
                return view('index',compact('slides','latest_products','gallery'));
        }

}
