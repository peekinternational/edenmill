<?php

namespace Edenmill\Http\Controllers;

use Illuminate\Http\Request;

use Edenmill\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Edenmill\User;
use Edenmill\Role;
use Lykegenes\LaravelCountries\Facades\Countries as Countries;
class UserController extends Controller
{
        protected $breadcrumb = array(
                 'title'        => 'Users',
                 'description'  => 'Manage your users.',
                 'page'         => ''
        );


        public function index(){
                $title = "All users";
                $this->breadcrumb['page'] = 'List';
                $breadcrumb = $this->breadcrumb;
                $users = User::paginate(10);
                return view('dashboard.users.index',compact('users','breadcrumb','title'));
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
                $this->breadcrumb['page'] = 'User Profile';
                $breadcrumb = $this->breadcrumb;

                $user = User::findOrFail($id);
                return view('dashboard.users.show',compact('user','breadcrumb'));
        }


        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
                $this->breadcrumb['page'] = 'Create User';
                $breadcrumb = $this->breadcrumb;
                $countries = Countries::getListForDropdown('cca3', false, 'eng');
                $roles = Role::pluck('display_name','id');
                return view('dashboard.users.create',compact('roles','breadcrumb','countries'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
                $this->breadcrumb['page'] = 'Edit User';
                $breadcrumb = $this->breadcrumb;
                $user = User::findOrFail($id);
                $roles = Role::pluck('display_name','id');
                 return view('dashboard.users.edit',compact('user','breadcrumb','roles'));
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
                        'first_name' => 'required|max:255',
                        'last_name' => 'required|max:255',
                        'email' => 'required|email|max:255|unique:users',
                        'image' =>'is_image'
                ]);

                if(!$request->has('password')){
                        $password = time().uniqid().time();
                        $request->merge(['password'=>$password]);
                }
                $user = User::create($request->all());

                session()->flash('__response', ['notify'=>'User "'.$request->input('name').'" registered successfully.','type'=>'success']);
                return redirect('/dashboard/users');
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
                $user = User::findOrFail($id);
                $user->fill($request->all());
                $user->save();
                session()->flash('__response', ['notify' => 'User "' . $request->input('first_name').' '.$request->input('last_name') . '" updated successfully.', 'type' => 'success']);
                return redirect()->back();
        }


        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(Request $request,$id)
        {
                $msgNoPermissions = ['notify' => 'You do not have permission to delete a user.','type' => 'error'];
                if(!Auth::user()->can('delete-users') && !Auth::user()->can('permanent-delete-users')) {
                        session()->flash('__response', $msgNoPermissions);
                        return redirect()->back();
                }
                $user = User::whereId((int)$id)->first();
                if ($user->id) {
                        $name = $user->name;
                        if($request->has('delete_permanent') && $request->input('delete_permanent')!='1'){
                                if(!Auth::user()->can('delete-users')){
                                        session()->flash('__response', $msgNoPermissions);
                                        return redirect()->back();
                                }
                                $user->deleted = 1;
                                $user->save();
                        }else{
                                if(!Auth::user()->can('permanent-delete-users')){
                                        session()->flash('__response', $msgNoPermissions);
                                        return redirect()->back();
                                }
                                $user->delete();
                        }
                        session()->flash('__response', ['notify' => 'User "' . $name . '" deleted successfully.', 'type' => 'success']);
                } else {
                        session()->flash('__response', ['notify' => 'Oops something went wrong. ', 'type' => 'error']);
                }
                return redirect('/dashboard/users');
        }

}
