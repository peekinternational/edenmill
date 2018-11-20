<?php

namespace Edenmill\Http\Controllers;

use Edenmill\Settings;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Edenmill\Http\Requests;
use \Edenmill\Pages;
class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::paginate(10);
        return view('dashboard.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('name') && !$request->input('slug')){
            $request->merge(['slug'=>str_slug($request->input('name'))]);
        }
        $this->validate($request,[
                'name'=>'required|max:255',
                'slug'=>'required|unique:pages,slug'
        ]);
        $request->merge(['data'=>htmlentities($request->input('data'))]);
        $page = Pages::create($request->all());
        if($page->id){
            session()->flash('__response', ['notify'=>'Page "'.$request->input('name').'" created successfully.','type'=>'success']);
            return redirect()->action('PagesController@index');
        }else{
            session()->flash('__response', ['notify'=>'Page "'.$request->input('name').'" could not be created.','type'=>'error']);
        }
        return back();
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
        $page = Pages::findOrFail($id);
        return view('dashboard.pages.edit',compact('page'));
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
        if($request->has('name') && !$request->input('slug')){
            $request->merge(['slug'=>str_slug($request->input('name'))]);
        }
        $this->validate($request,[
                'name'=>'required|max:255',
                'slug'=>'required|unique:pages,slug,'.$id
        ]);
        $page = Pages::findOrFail($id);
        $request->merge(['data'=>htmlentities($request->input('data'))]);
        $page->fill($request->all());
        if($page->save()){
            session()->flash('__response', ['notify'=>'Page "'.$request->input('name').'" update successfully.','type'=>'success']);
            return redirect()->action('PagesController@index');
        }else{
            session()->flash('__response', ['notify'=>'Page "'.$request->input('name').'" could not be updated.','type'=>'error']);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Pages::findOrFail($id);
        if($page->delete()){
            session()->flash('__response', ['notify'=>'Page deleted successfully.','type'=>'success']);
        }else{
            session()->flash('__response', ['notify'=>'Page could not be deleted.','type'=>'error']);
        }
        return back();
    }

    public function show_page($slug){
        $page = Pages::whereSlug($slug)->firstOrFail();
         return view('page',compact('page'));
    }

    public function getAboutPage(){
        $about_photo = Settings::whereGroup('about')->whereType('about-photo')->firstOrFail();
        $about_text = Settings::whereGroup('about')->whereType('about-text')->firstOrFail();
        return view('dashboard.pages.about',compact('about_text','about_photo'));
    }

    public function postAboutPage(Request $request){
        //return $request->all();
        $this->validate($request,[
            'about' => 'required',
            'photo' => 'is_image',
        ]);
        //return $request;
        $about_text = Settings::whereGroup('about')->whereType('about-text')->firstOrFail();

        $about_text->title = $request->input('title_text');
        $about_text->value = $request->input('about');
        $about_text->timestamps = false;
        $about_text->save();
        if($request->hasFile('photo')) {
            $about_photo = Settings::whereGroup('about')->whereType('about-photo')->firstOrFail();
            if (file_exists(public_path('assets/images/' . $about_photo->value)) && !empty($about_photo->value)) {
                unlink(public_path('assets/images/' . $about_photo->value));
            }
            /*$extension = $request->photo->extension();
            $filename = md5(str_shuffle(time())) . md5(time()) . '.' . $extension;
            $path = public_path('assets/images/' . $filename);
            Image::make($request->photo->getRealPath())->resize(898, 602)->save($path);*/

            $extension = $request->photo->getClientOriginalExtension();
            $filename = md5(str_shuffle(time())).md5(time()).'.'.$extension;
            $path = public_path('assets/images/');
            $request->photo->move($path , $filename );
            $about_photo->value = $filename;
            $about_photo->title = $request->input('photo_title');
            $about_photo->timestamps = false;
            $about_photo->save();
        }
        session()->flash('__response',['notify'=>'Updated Successfully.','type'=>'success']);
        return back();
    }

    public function map_page(){
        return view('dashboard.map.index');
    }


}
