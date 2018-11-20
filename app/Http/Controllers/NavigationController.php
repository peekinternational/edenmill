<?php

namespace Edenmill\Http\Controllers;

use Edenmill\Navs;
use Edenmill\Pages;
use Edenmill\SubNavs;
use Illuminate\Http\Request;

use Edenmill\Http\Requests;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$navs = Navs::all();
        return view('dashboard.navigation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Pages::pluck('name','id');
        return view('dashboard.navigation.create',compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('title') && !$request->has('slug')){
            $request->merge(['slug'=>str_slug($request->input('title'))]);
        }
        $this->validate($request,[
            'title' => 'required|max:255'
        ]);
        if($request->has('type')){
                if($request->input('type') == 'sub-menu'){
                        $this->validate($request, [
                                'nav_id' => 'required|exists:navs,id',
                                'slug' => 'max:255|unique:sub_navs,slug',
                                'url' => 'url',
                        ]);
                        $sub_nav = new SubNavs();
                        if($request->has('url')  && $request->input('url_type')=='custom') {
                            $sub_nav->url = $request->input('url');
                        }
                        if($request->has('page_id') && $request->input('url_type')=='page' && $request->input('page_id')!='0'){
                            $this->validate($request, [
                                    'page_id' => 'exists:pages,id'
                            ]);
                            $request->page_id = $request->input('page_id');
                        }
                        $sub_nav->title = $request->input('title');
                        $sub_nav->slug = $request->input('slug');
                        $sub_nav->nav_id = $request->input('nav_id');
                        $sub_nav->order_by = $request->has('order_by')?$request->input('order_by'):SubNavs::count();
                        $sub_nav->hidden = $request->input('hidden');
                        $sub_nav->save();
                        if(isset($sub_nav->id)){
                            session()->flash('__response', ['notify'=>'Sub Navigation "'.$request->input('title').'" added successfully.','type'=>'success']);
                            return redirect()->action('NavigationController@index');
                        }
                }else if($request->input('type') == 'main-menu'){
                        $this->validate($request, [
                                'slug' => 'max:255|unique:navs,slug',
                                'url' => 'url'
                        ]);
                     $nav = new Navs();
                        if($request->has('url') && $request->input('url_type')=='custom') {
                            $nav->url = $request->input('url');
                        }
                        if($request->has('color')){
                                $request->color = $request->input('color');
                            }
                        if($request->has('page_id') && $request->input('url_type')=='page' && $request->input('page_id')!='0'){
                                $this->validate($request, [
                                        'page_id' => 'exists:pages,id'
                                ]);
                                $request->page_id = $request->input('page_id');
                        }
                        $nav->title = $request->input('title');
                        $nav->hidden = $request->input('hidden');
                        $nav->order_by = $request->has('order_by')?$request->input('order_by'):Navs::count();
                        $nav->save();
                        if(isset($nav->id)){
                            session()->flash('__response', ['notify'=>'Navigation "'.$request->input('title').'" added successfully.','type'=>'success']);
                            return redirect()->action('NavigationController@index');
                        }
                }
        }
        session()->flash('__response', ['notify'=>'Oops! something went wrong.','type'=>'error']);
        return  back();
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
        $nav = Navs::findOrFail($id);
        $nav_info = new \stdClass();
        $nav_info->id = $nav->id;
        $nav_info->type = 'main-menu';
        $nav_info->title = $nav->title;
        $nav_info->slug = $nav->slug;
        $nav_info->page_id = $nav->page_id;
        $nav_info->url = $nav->url;
        $nav_info->order_by = $nav->order_by;
        $nav_info->color = $nav->color;
        $nav_info->hidden = $nav->hidden;
        if(!empty($nav->url) && filter_var($nav->url,FILTER_VALIDATE_URL)==true){
            $nav_info->url_type = 'custom';
        }else{
            $nav_info->url_type = 'page';
        }
        $pages = Pages::pluck('name','id');
        return view('dashboard.navigation.edit',compact('nav_info','pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_subNav($id)
    {
        $sub_nav = SubNavs::findOrFail($id);
        $nav_info = new \stdClass();
        $nav_info->id = $sub_nav->id;
        $nav_info->title = $sub_nav->title;
        $nav_info->type = 'sub-menu';
        $nav_info->slug = $sub_nav->slug;
        $nav_info->page_id = $sub_nav->page_id;
        $nav_info->url = $sub_nav->url;
        $nav_info->order_by = $sub_nav->order_by;
        $nav_info->nav_id = $sub_nav->nav_id;
        $nav_info->nav_slug = $sub_nav->nav->slug;
        $nav_info->hidden = $sub_nav->hidden;
        if(!empty($sub_nav->url) && filter_var($sub_nav->url,FILTER_VALIDATE_URL)==true){
            $nav_info->url_type = 'custom';
        }else{
            $nav_info->url_type = 'page';
        }
        $pages = Pages::pluck('name','id');
        return view('dashboard.navigation.edit_sub_nav',compact('nav_info','pages'));
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
        if($request->has('title') && !$request->has('slug')){
            $request->merge(['slug'=>str_slug($request->input('title'))]);
        }
        $this->validate($request,[
                'title' => 'required|max:255',
                'slug' => 'required|max:255|unique:navs,slug,'.$id,
                'url' => 'url'
        ]);

        $nav = Navs::findOrFail($id);
        if($request->has('url') && $request->input('url_type')=='custom') {
            $nav->url = $request->input('url');
        }else{
            $nav->url = null;
        }
        if($request->has('page_id') && $request->input('url_type')=='page'){
            if($request->input('page_id') != '0'){
                $nav->page_id = $request->input('page_id');
            }else{
                $nav->page_id = null;
            }
        }else{
            $nav->page_id = null;
        }
        if($request->has('color')){
            $nav->color = $request->input('color');
        }
        $nav->title = $request->input('title');
        $nav->slug = $request->input('slug');
        $nav->hidden = $request->input('hidden');
        $nav->order_by = $request->has('order_by')?$request->input('order_by'):Navs::count();
        $updated = $nav->save();
        if($updated) {
            session()->flash('__response', ['notify' => 'Navigation "' . $request->input('title') . '" updated successfully.', 'type' => 'success']);
        }else{
            session()->flash('__response', ['notify' => 'Navigation "' . $request->input('title') . '" could not be updated.', 'type' => 'error']);
        }
        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_subNav(Request $request, $id)
    {
        if($request->has('title') && !$request->has('slug')){
            $request->merge(['slug'=>str_slug($request->input('title'))]);
        }
        $sub_nav = SubNavs::findOrFail($id);
        $this->validate($request,[
                'title' => 'required|max:255',
                'slug' => 'required|max:255|unique:sub_navs,slug,'.$id,
                'nav_id' => 'required|exists:navs,id',
                'url' => 'url'
        ]);
        if($request->has('url') && $request->input('url_type')=='custom') {
            $sub_nav->url = $request->input('url');
        }else{
            $sub_nav->url = null;
        }

        if($request->has('page_id') && $request->input('url_type')=='page'){
            if($request->input('page_id') != '0') {
                $sub_nav->page_id = $request->input('page_id');
            }else{
                $sub_nav->page_id = null;
            }
        }else{
            $sub_nav->page_id = null;
        }
        $sub_nav->title = $request->input('title');
        $sub_nav->nav_id = $request->input('nav_id');
        $sub_nav->slug = $request->input('slug');
        $sub_nav->hidden = $request->input('hidden');
        $sub_nav->order_by = $request->has('order_by')?$request->input('order_by'):SubNavs::count();
        $updated = $sub_nav->save();
        if($updated) {
            session()->flash('__response', ['notify' => 'Navigation "' . $request->input('title') . '" updated successfully.', 'type' => 'success']);
        }else{
            session()->flash('__response', ['notify' => 'Navigation "' . $request->input('title') . '" could not be updated.', 'type' => 'error']);
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
        $nav = Navs::findOrFail($id);
        if($nav->delete()){
            session()->flash('__response', ['notify' => 'Navigation deleted successfully.', 'type' => 'success']);
        }else{
            session()->flash('__response', ['notify' => 'Navigation could not be deleted.', 'type' => 'error']);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_subNav($id)
    {
        $sub_nav = SubNavs::findOrFail($id);
        if($sub_nav->delete()){
            session()->flash('__response', ['notify' => 'Sub navigation deleted successfully.', 'type' => 'success']);
        }else{
            session()->flash('__response', ['notify' => 'Sub navigation could not be deleted.', 'type' => 'error']);
        }
        return back();
    }
}
