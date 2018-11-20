<?php

namespace Edenmill\Http\Controllers;

use Edenmill\Slider;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Edenmill\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slider::all();
        return view('dashboard.slider.index',compact('slides'));//$slides;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if(!Auth::user()->can('create-slides')) {
            session()->flash('__response', ['notify' => 'You do not have permission to delete a user.','type' => 'error']);
            return back()->withInput();
        }
        $this->validate($request, [
                'title' => 'required|max:255',
                'description' => 'required',
                'link' => 'url',
                'order_by' => 'min:1',
                'background' =>'is_image'
        ]);
        if(!$request->has('order_by')){
                $request->merge(['order_by'=>1]);
        }
        $slide = Slider::create($request->all());
        if($slide->id){
            if($request->hasFile('background')){
                if($request->hasFile('background')){
                   /* $extension = $request->background->extension();
                    $filename = md5(str_shuffle(time())).md5(time()).'.'.$extension;
                    $path = public_path('assets/images/slider/' . $filename);

                    Image::make($request->background->getRealPath())->resize(1920,900)->save($path);*/
                        $extension = $request->background->getClientOriginalExtension();
                        $filename = md5(str_shuffle(time())).md5(time()).'.'.$extension;
                        $path = public_path('assets/images/slider/');
                        $request->background->move($path , $filename );

                    $slide->background = $filename;
                }else{
                    $slide->background = null;
                }
                $slide->save();
            }
            session()->flash('__response', ['notify' => 'Slide add successfully to slider','type' => 'success']);
            return redirect()->action('SliderController@edit',['id'=>$slide->id]);
        }
        session()->flash('__response', ['notify' => 'Oops! something went wrong.','type' => 'error']);
        return back()->withInput();

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
        $slide = Slider::findOrFail($id);
        return view('dashboard.slider.edit',compact('slide'));
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
        if(!Auth::user()->can('update-slides')) {
            session()->flash('__response', ['notify' => 'You do not have permission to update a slider slides.','type' => 'error']);
            return back()->withInput();
        }
        $this->validate($request, [
                'title' => 'required|max:255',
                'description' => 'required',
                'link' => 'url',
                'background' =>'is_image'

        ]);
       $slide = Slider::findOrFail($id);
        $slide_image = $slide->background;
        $slide->fill($request->all());
        if($request->hasFile('background')){
            if(!empty($slide_image) && file_exists(public_path('assets/images/slider/'.$slide_image))){
                 unlink(public_path('assets/images/slider/'.$slide_image));
            }
           /* $extension = $request->background->extension();
            $filename = md5(str_shuffle(time())).md5(time()).'.'.$extension;
            $path = public_path('assets/images/slider/' . $filename);
            Image::make($request->background->getRealPath())->resize(1920, 900)->save($path);
            $slide->background = $filename;*/

            $extension = $request->background->getClientOriginalExtension();
            $filename = md5(str_shuffle(time())).md5(time()).'.'.$extension;
            $path = public_path('assets/images/slider/');
            $request->background->move($path , $filename );
            //Image::make($request->background->getRealPath())->resize(1920, 900)->save($path);
            $slide->background = $filename;


        }
        $slide->save();
        session()->flash('__response', ['notify'=>'Slider slider "'.$request->input('title').'" updated successfully.','type'=>'success']);
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
        if(!Auth::user()->can('delete-slides')) {
            session()->flash('__response', ['notify' => 'You do not have permission to delete a slider slides.','type' => 'error']);
            return back()->withInput();
        }

        $slide = Slider::findOrFail($id);
        if(!empty($slide->background) && file_exists(public_path('assets/images/slider/'.$slide->background))){
            unlink(public_path('assets/images/slider/'.$slide->background));
        }

       $slide->delete();
        session()->flash('__response', ['notify' => 'Slide deleted successfully from slider','type' => 'success']);
        return back();
    }
}
