<?php

namespace Edenmill\Http\Controllers;

use Edenmill\Notifications\Subscribed;
use Edenmill\Subscriber;
use Illuminate\Http\Request;

use Edenmill\Http\Requests;

class SubscriberController extends Controller
{
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	* Display a listing of the resource.
														     *
														     * @return \Illuminate\Http\Response
														     */
														    public function index()
														    {
		$subscribers = Subscriber::orderBy('id','desc')->paginate(50);
		return view('dashboard.subscribers.index',compact('subscribers'));
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	* Show the form for creating a new resource.
														     *
														     * @return \Illuminate\Http\Response
														     */
														    public function create()
														    {
		return view('dashboard.subscribers.create');
		
		
		
	}
	

	
	/**
	* Store a newly created resource in storage.
														     *
														     * @param  \Illuminate\Http\Request  $request
														     * @return \Illuminate\Http\Response
														     */
														    public function store(Request $request)
														    {
		$this->validate($request,[
																                'name' => 'required|max:100',
																                'email' => 'required|max:255',
																                'phone'=>'required'
																        ]);
		if(Subscriber::whereEmail($request->input('email'))->count()>0){
			session()->flash('__response', ['notify'=>'The email you enter is already in subscriber list','type'=>'error']);
			return back();
		}
		$subscriber = Subscriber::create($request->all());
		$subscriber->notify(new Subscribed($subscriber));
		session()->flash('__response', ['notify'=>'Your are added successfully to subscriber list.','type'=>'success']);
		return back();
	}
	

	
	
	/**
	* Show the form for editing the specified resource.
														     *
														     * @param  int  $id
														     * @return \Illuminate\Http\Response
														     */
														    public function edit($id)
														    {
		$subscriber = Subscriber::findOrFail($id);
		return view('dashboard.subscribers.edit',compact('subscriber'));
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
		$this->validate($request,[
																                                    'name' => 'required|max:100',
																                                    'email' => 'required|max:255|unique:subscribers,email,'.$id,
																                                    'phone'=>'required'
																												        ]);
		$subscriber = Subscriber::findOrFail($id);
		$subscriber->fill($request->all());
		if($subscriber->save()){
			session()->flash('__response', ['notify' => 'Subscriber  updated successfully.', 'type' => 'success']);
		}
		else{
			session()->flash('__response', ['notify' => 'Subscriber could not be  updated.', 'type' => 'error']);
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
		
		if(Subscriber::destroy($id)){
			session()->flash('__response', ['notify' => 'Subscriber deleted successfully.', 'type' => 'success']);
		}
		else{
			session()->flash('__response', ['notify' => 'Subscriber could not be deleted.', 'type' => 'success']);
		}
		
		return redirect()->action('SubscriberController@index');
	}
}
