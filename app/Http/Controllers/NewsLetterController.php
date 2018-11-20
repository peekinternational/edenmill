<?php

namespace Edenmill\Http\Controllers;

use Illuminate\Http\Request;

use Edenmill\Http\Requests;
use Edenmill\Subscriber;
use Illuminate\Support\Facades\Mail;
use Edenmill\Mail\NewsLetters;
class NewsLetterController extends Controller
{
	public function index(){
		$subscribers = Subscriber::all();
		return view('dashboard.newsletter',compact('subscribers'));
	}
	
	public function send(Request $request){
        $this->validate($request,[
            'body' => 'required',
            'emails' =>'required',
            'subject' =>'required'
        ]);
		$send_count = 0;
		if(is_array($request->input('emails')) && count($request->input('emails')>0)){
			foreach($request->input('emails') as $email){
				$send_count++;
				$body = $request->input('body');
                $subject = $request->input('subject');
				Mail::to($email)->send(new NewsLetters($subject,$body));
			}
		}
		if($send_count>0){
			session()->flash('__response', ['notify' => 'NewsLetters sent successfully.', 'type' => 'success']);
		}
		else{
			session()->flash('__response', ['notify' => 'NewsLetters could not be sent.', 'type' => 'error']);
		}
		return back();
	}
}
