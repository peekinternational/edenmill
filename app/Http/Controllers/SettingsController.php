<?php

namespace Edenmill\Http\Controllers;

use Edenmill\Settings;
use Illuminate\Http\Request;

use Edenmill\Http\Requests;

class SettingsController extends Controller
{
	
	public function map_page(){
		return view('dashboard.map.index');
	}
	public function theme(){
		return view('dashboard.theme.index');
	}
	
	
	
	
	/*  public function getInfo(){
	return view('dashboard.info.index');
}
*/



/* public function showInfo(){
turn view('dashboard.info.show');
}
*/
        public function postInfo(Request $request){
if($request->has('type') && $request->has('title') && $request->has('value')){
	$info = Settings::create($request->all());
	if(isset($info->id)){
		session()->flash('__response', ['notify'=>'Information saved successfully.','type'=>'success']);
	}
	else{
		session()->flash('__response', ['notify'=>'Oops! something went wrong.','type'=>'error']);
	}
}
return $request->all();
}
public function update_info(Request $request){
return $request->all();
}


public function update_map(Request $request){
if($request->has('title')){
	$title = Settings::firstOrNew(array('type'=>'title','group'=>'map'));
	$title->value = $request->input('title');
	$title->timestamps = false;
	$title->save();
}
if($request->has('lat')){
	$lat = Settings::firstOrNew(array('type'=>'lat','group'=>'map'));
	$lat->value = $request->input('lat');
	$lat->timestamps = false;
	$lat->save();
}
if($request->has('lng')){
	$lng = Settings::firstOrNew(array('type'=>'lng','group'=>'map'));
	$lng->value = $request->input('lng');
	$lng->timestamps = false;
	$lng->save();
}
if($request->has('zoom')){
	$zoom = Settings::firstOrNew(array('type'=>'zoom','group'=>'map'));
	$zoom->value = $request->input('zoom');
	$zoom->timestamps = false;
	$zoom->save();
}
if($request->has('water-color')){
	$water_color = Settings::firstOrNew(array('type'=>'water-color','group'=>'map'));
	$water_color->value = $request->input('water-color');
	$water_color->timestamps = false;
	$water_color->save();
}
if($request->has('man-made-color')){
	$man_made_color = Settings::firstOrNew(array('type'=>'man-made-color','group'=>'map'));
	$man_made_color->value = $request->input('man-made-color');
	$man_made_color->timestamps = false;
	$man_made_color->save();
}
if($request->has('park-color')){
	$park_color = Settings::firstOrNew(array('type'=>'park-color','group'=>'map'));
	$park_color->value = $request->input('park-color');
	$park_color->timestamps = false;
	$park_color->save();
}
if($request->has('highway-color')){
	$highway_color = Settings::firstOrNew(array('type'=>'highway-color','group'=>'map'));
	$highway_color->value = $request->input('highway-color');
	$highway_color->timestamps = false;
	$highway_color->save();
}
if($request->has('road-color')){
	$road_color = Settings::firstOrNew(array('type'=>'road-color','group'=>'map'));
	$road_color->value = $request->input('road-color');
	$road_color->timestamps = false;
	$road_color->save();
}
if($request->has('draggable')){
	$draggable = Settings::firstOrNew(array('type'=>'draggable','group'=>'map'));
	$draggable->value = $request->input('draggable');
	$draggable->timestamps = false;
	$draggable->save();
}
if($request->has('scrollwheel')){
	$scrollwheel = Settings::firstOrNew(array('type'=>'scrollwheel','group'=>'map'));
	$scrollwheel->value = $request->input('scrollwheel');
	$scrollwheel->timestamps = false;
	$scrollwheel->save();
}
if($request->hasFile('marker')){
	$marker = Settings::firstOrNew(array('type'=>'marker','group'=>'map'));
	$extension = $request->marker->extension();
	
	$filename = time().'.'.$extension;
	$path = public_path('assets/images/settings/' . $filename);
	Image::make($request->marker->getRealPath())->resize(64, 64)->save($path);
	if($marker->value != 'google_marker.png'){
		unlink(public_path('assets/images/settings/'.$marker->value));
	}
	$marker->value = $filename;
	$marker->timestamps = false;
	$marker->save();
}
session()->flash('__response', ['notify'=>'Map updated successfully.','type'=>'success']);
return back();
}

public function update_theme(Request $request){
if($request->has('theme') && ($request->input('theme')=='ls' || $request->input('theme')=='ds')){
	$theme = Settings::firstOrNew(array('type'=>'theme','group'=>'theme'));
	$theme->value = $request->input('theme');
	$theme->timestamps = false;
	$theme->save();
}
if($request->has('layout') && ($request->input('layout')=='0' || $request->input('layout')=='1')){
	$layout = Settings::firstOrNew(array('type'=>'layout','group'=>'theme'));
	$layout->value = $request->input('layout');
	$layout->timestamps = false;
	$layout->save();
}
if($request->has('margin') && ($request->input('margin')=='0' || $request->input('margin')=='1')){
	$margin = Settings::firstOrNew(array('type'=>'margin','group'=>'theme'));
	$margin->value = $request->input('margin');
	$margin->timestamps = false;
	$margin->save();
}
if($request->has('pattern')){
	$patterne = Settings::firstOrNew(array('type'=>'pattern','group'=>'theme'));
	$patterne->value = $request->input('pattern');
	$patterne->timestamps = false;
	$patterne->save();
}
session()->flash('__response', ['notify'=>'Theme updated successfully.','type'=>'success']);
return back();
}


public function showSettings()
        {
return view('dashboard.settings');
}

public function updateSettings(Request $request)
        {
if($request->has('email')){
	$setting = Settings::firstOrNew(array('type'=>'email','group'=>'site'));
	$setting->value = $request->input('email');
	$setting->title = "Email";
	$setting->save();
}
if($request->has('phone')){
	$setting = Settings::firstOrNew(array('type'=>'phone','group'=>'site'));
	$setting->value = $request->input('phone');
	$setting->title = "Phone";
	$setting->save();
}
if($request->has('working_hours')){
	$setting = Settings::firstOrNew(array('type'=>'working_hours','group'=>'site'));
	$setting->value = $request->input('working_hours');
	$setting->title = "Working Hours";
	$setting->save();
}
if($request->has('address')){
	$setting = Settings::firstOrNew(array('type'=>'address','group'=>'site'));
	$setting->value = $request->input('address');
	$setting->title = "Address";
	$setting->save();
}
if($request->has('facebook')){
	$setting = Settings::firstOrNew(array('type'=>'facebook','group'=>'site'));
	$setting->value = $request->input('facebook');
	$setting->title = "Facebook";
	$setting->save();
}
if($request->has('hide_facebook')){
	$setting = Settings::firstOrNew(array('type'=>'hide_facebook','group'=>'site'));
	$setting->value = $request->input('hide_facebook');
	$setting->title = "Hide Facebook";
	$setting->save();
}

if($request->has('twitter')){
	$setting = Settings::firstOrNew(array('type'=>'twitter','group'=>'site'));
	$setting->value = $request->input('twitter');
	$setting->title = "Twitter";
	$setting->save();
}
if($request->has('hide_twitter')){
	$setting = Settings::firstOrNew(array('type'=>'hide_twitter','group'=>'site'));
	$setting->value = $request->input('hide_twitter');
	$setting->title = "Hide Twitter";
	$setting->save();
}

if($request->has('google_plus')){
	$setting = Settings::firstOrNew(array('type'=>'google_plus','group'=>'site'));
	$setting->value = $request->input('google_plus');
	$setting->title = "Google Plus";
	$setting->save();
}
if($request->has('hide_google_plus')){
	$setting = Settings::firstOrNew(array('type'=>'hide_google_plus','group'=>'site'));
	$setting->value = $request->input('hide_google_plus');
	$setting->title = "Hide Google Plus";
	$setting->save();
}

if($request->has('skype')){
	$setting = Settings::firstOrNew(array('type'=>'skype','group'=>'site'));
	$setting->value = $request->input('skype');
	$setting->title = "Skype";
	$setting->save();
}
if($request->has('hide_skype')){
	$setting = Settings::firstOrNew(array('type'=>'hide_skype','group'=>'site'));
	$setting->value = $request->input('hide_skype');
	$setting->title = "Hide Skype";
	$setting->save();
}

if($request->has('linkdin')){
	$setting = Settings::firstOrNew(array('type'=>'linkdin','group'=>'site'));
	$setting->value = $request->input('linkdin');
	$setting->title = "Linkdin";
	$setting->save();
}
if($request->has('hide_linkdin')){
	$setting = Settings::firstOrNew(array('type'=>'hide_linkdin','group'=>'site'));
	$setting->value = $request->input('hide_linkdin');
	$setting->title = "Hide Linkdin";
	$setting->save();
}
if($request->has('flickr')){
	$setting = Settings::firstOrNew(array('type'=>'flickr','group'=>'site'));
	$setting->value = $request->input('flickr');
	$setting->title = "Flickr";
	$setting->save();
}
if($request->has('hide_flickr')){
	$setting = Settings::firstOrNew(array('type'=>'hide_flickr','group'=>'site'));
	$setting->value = $request->input('hide_flickr');
	$setting->title = "Hide Flickr";
	$setting->save();
}

if($request->has('instagram')){
	$setting = Settings::firstOrNew(array('type'=>'instagram','group'=>'site'));
	$setting->value = $request->input('instagram');
	$setting->title = "Instagram";
	$setting->save();
}
if($request->has('hide_instagram')){
	$setting = Settings::firstOrNew(array('type'=>'hide_instagram','group'=>'site'));
	$setting->value = $request->input('hide_instagram');
	$setting->title = "Hide Instagram";
	$setting->save();
}

if($request->has('youtube')){
	$setting = Settings::firstOrNew(array('type'=>'youtube','group'=>'site'));
	$setting->value = $request->input('youtube');
	$setting->title = "Youtube";
	$setting->save();
}
if($request->has('hide_youtube')){
	$setting = Settings::firstOrNew(array('type'=>'hide_youtube','group'=>'site'));
	$setting->value = $request->input('hide_youtube');
	$setting->title = "Hide Youtube";
	$setting->save();
}

if($request->has('tripadvisor')){
	$setting = Settings::firstOrNew(array('type'=>'tripadvisor','group'=>'site'));
	$setting->value = $request->input('tripadvisor');
	$setting->title = "TripAdvisor";
	$setting->save();
}
if($request->has('hide_tripadvisor')){
	$setting = Settings::firstOrNew(array('type'=>'hide_tripadvisor','group'=>'site'));
	$setting->value = $request->input('hide_tripadvisor');
	$setting->title = "Hide TripAdvisor";
	$setting->save();
}



if($request->has('sandbox')){
	$setting = Settings::firstOrNew(array('type'=>'sandbox','group'=>'payment'));
	$setting->value = $request->input('sandbox');
	$setting->save();
}
if($request->has('live')){
	$setting = Settings::firstOrNew(array('type'=>'live','group'=>'payment'));
	$setting->value = $request->input('live');
	$setting->save();
}
if($request->has('payment_mood')){
	$setting = Settings::firstOrNew(array('type'=>'payment_mood','group'=>'payment'));
	$setting->value = $request->input('payment_mood');
	$setting->save();
}
session()->flash('__response', ['notify'=>'Settings updated successfully.','type'=>'success']);
return back();
}

public function postSettings(Request $request)
        {
if($request->has('animation')){
	$animation = Settings::firstOrNew(array('type'=>'animation','group'=>'slider'));
	$animation->value = $request->input('animation');
	$animation->timestamps = false;
	$animation->save();
}
if($request->has('random')){
	$random = Settings::firstOrNew(array('type'=>'random','group'=>'slider'));
	$random->value = $request->input('random');
	$random->timestamps = false;
	$random->save();
}
if($request->has('slide-show-speed')){
	$slide_show_speed = Settings::firstOrNew(array('type'=>'slide-show-speed','group'=>'slider'));
	$slide_show_speed->value = $request->input('slide-show-speed');
	$slide_show_speed->timestamps = false;
	$slide_show_speed->save();
}
if($request->has('animation-speed')){
	$animation_speed = Settings::firstOrNew(array('type'=>'animation-speed','group'=>'slider'));
	$animation_speed->value = $request->input('animation-speed');
	$animation_speed->timestamps = false;
	$animation_speed->save();
}
if($request->has('direction')){
	$direction = Settings::firstOrNew(array('type'=>'direction','group'=>'slider'));
	$direction->value = $request->input('direction');
	$direction->timestamps = false;
	$direction->save();
}
if($request->has('reverse')){
	$reverse = Settings::firstOrNew(array('type'=>'reverse','group'=>'slider'));
	$reverse->value = $request->input('reverse');
	$reverse->timestamps = false;
	$reverse->save();
}
session()->flash('__response', ['notify'=>'Slider settings updated successfully.','type'=>'success']);
return back();
}

public function upload(Request $request){
$this->validate($request,[
                        'file' => 'required',
                        'type' => 'required'
                ]);
//return $request->all();
if($request->hasFile('file')){
	if($request->input('type') == '1'){
		$item = Settings::firstOrNew(array('type'=>'downloadable','group'=>'menu'));
                $type = "Menu";
	}
	else{
		$item = Settings::firstOrNew(array('type'=>'downloadable','group'=>'recipes'));
                $type = "Recipes";
	}
	if(!empty($item->value) && file_exists(public_path('assets/'.$item->value))){
		unlink(public_path('assets/'.$item->value));
	}
	$extension = $request->file->getClientOriginalExtension();
	 $filename = strtolower($type).'.'.$extension;
	$path = public_path('assets/');
	$request->file->move($path , $filename );
	$item->value = $filename;
	$item->save();
	session()->flash('__response', ['notify'=>ucfirst($type).' uploaded successfully.','type'=>'success']);
}
else{
	session()->flash('__response', ['notify'=>ucfirst($type).' could not be uploaded.','type'=>'error']);
}
return back();
}
}
