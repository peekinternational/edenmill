<?php

namespace Edenmill\Http\Controllers;

use Edenmill\Gallery;
use Edenmill\Settings;
use Illuminate\Http\Request;

use Edenmill\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view('dashboard.gallery.index',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'title' => 'required|max:255',
                'image' =>'is_image'
        ]);
        if($request->has('categories')){
            $request->merge(['categories'=>implode(',',$request->input('categories'))]);
        }
        $galleryItem = Gallery::create($request->all());
        if($galleryItem->id && $request->hasFile('image')){
            $extension = $request->image->getClientOriginalExtension();
            $filename = md5(str_shuffle(time())).md5(time()).'.'.$extension;
            $path = public_path('assets/images/gallery/');
            $request->image->move($path , $filename );


            /*$extension = $request->image->extension();
            $filename = md5(str_shuffle(time())).md5(time()).'.'.$extension;
            $path = public_path('assets/images/gallery/' . $filename);
            Image::make($request->image->getRealPath())->resize(448, 448)->save($path);*/
            $galleryItem->image = $filename;
            $galleryItem->save();
        }
        session()->flash('__response', ['notify' => 'Gallery Item created successfully.', 'type' => 'success']);
        return redirect()->action('GalleryController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery_item = Gallery::findOrFail($id);
        return view('dashboard.gallery.edit',compact('gallery_item'));
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
        $this->validate($request, [
                'title' => 'required|max:255',
                'image' =>'is_image'
        ]);
        $gallery = Gallery::findOrFail($id);
        if($request->has('categories')){
            $request->merge(['categories'=>implode(',',$request->input('categories'))]);
        }
        if($request->hasFile('image')){
            if(file_exists(public_path('assets/images/gallery/'.$gallery->image)) && !empty($gallery->image)){
                unlink(public_path('assets/images/gallery/'.$gallery->image));
            }
            $extension = $request->image->getClientOriginalExtension();
            $filename = md5(str_shuffle(time())).md5(time()).'.'.$extension;
            $path = public_path('assets/images/gallery/');
            $request->image->move($path , $filename );

           /* $extension = $request->image->extension();
            $filename = md5(str_shuffle(time())).md5(time()).'.'.$extension;
            $path = public_path('assets/images/gallery/' . $filename);
            Image::make($request->image->getRealPath())->resize(448, 448)->save($path);*/
            $gallery->image = $filename;
            $gallery->save();
        }
        $gallery->fill($request->all());
        $gallery->save();
        session()->flash('__response', ['notify' => 'Gallery Item created successfully.', 'type' => 'success']);
        return redirect()->action('GalleryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        if(file_exists(public_path('assets/images/gallery/'.$gallery->image)) && !empty($gallery->image)){
            unlink(public_path('assets/images/gallery/'.$gallery->image));
        }
        $gallery->delete();
        session()->flash('__response', ['notify' => 'Gallery Item deleted successfully.', 'type' => 'success']);
        return back();
    }

    public function updateCategories(Request $request){
            $galleryCategories = Settings::galleryCategories();
            if($galleryCategories!=false){
                foreach($galleryCategories as $category){
                    if($request->has('id-'.$category['id'])){
                        $_cat = Settings::find($category['id']);
                        $_cat->value = $request->input('name-'.$category['id']);
                        $_cat->title = "Gallery Categories";
                        $_cat->save();
                    }
                }
            }
            if($request->has('category')){
                $categories = $request->input('category');
                if(is_array($categories) && count($categories)>0){
                    foreach($categories as $category){
                        if(!empty($category)) {
                            Settings::create(['type' => 'category', 'group' => 'gallery', 'value' => $category, 'title' => "Gallery Categories"]);
                        }
                    }
                }
            }
        session()->flash('__response', ['notify' => 'Gallery Category updated successfully.', 'type' => 'success']);
        return back();
    }
}
