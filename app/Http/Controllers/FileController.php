<?php

namespace Edenmill\Http\Controllers;

use Illuminate\Http\Request;

use Edenmill\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified file.
     *
     * @param  string file_name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Display the specified file.
     *
     * @param  string file_name
     * @return \Illuminate\Http\Response
     */
    public function getFile($file)
    {
        $paths = explode('.',$file);
        $path = 'public';
        $file_name = $paths[count($paths)-2].'.'.$paths[count($paths)-1];
        if(count($paths)>2){
            foreach($paths as $index=>$_path){
                if($index < count($paths) -2){
                    $path = $path.'/'.$_path;
                }
            }
        }
        $directories = Storage::allDirectories('public');
        if(in_array($path,$directories)){
            $file_path = storage_path('app/'.$path.'/'.$file_name);
        }else{
            $file_path = storage_path('app/public/').$file;
        }

        //dd($file_path);
        //$path = storage_path() . '/app/public/' . $file;
        if(!File::exists($file_path)) abort(404);
        $file = File::get($file_path);
        $type = File::mimeType($file_path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function images($image){
        $paths = explode('.',$image);
        $path = 'public/images';
        $image_name = $paths[count($paths)-2].'.'.$paths[count($paths)-1];
        if(count($paths)>2){
            foreach($paths as $index=>$_path){
                if($index < count($paths) -2){
                    $path = $path.'/'.$_path;
                }
            }
        }
         $directories = Storage::allDirectories('public/images/');
        if(in_array($path,$directories)){
            $image_name = storage_path('app/'.$path.'/'.$image_name);
        }else{
            $image_name = config('image.path').$image;
        }
       return  Image::make($image_name)->response();
    }
}
