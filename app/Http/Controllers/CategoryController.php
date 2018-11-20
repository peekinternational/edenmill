<?php

namespace Edenmill\Http\Controllers;

use Edenmill\Category;
use Edenmill\Products;
use Edenmill\ShopCategories;
use Edenmill\SubNavs;
use Illuminate\Http\Request;

use Edenmill\Http\Requests;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
        protected $breadcrumb = array(
                'title'        => 'Product Categories',
                'description'  => 'Manage product categories.',
                'page'         => ''
        );
       public function index(){
                $this->breadcrumb['page'] = 'Show Categories';
                $breadcrumb = $this->breadcrumb;
               $categories = Category::all();
               return view('dashboard.category.index',compact('breadcrumb','categories'));
       }
       public function show($slug){
                $categories = Category::pluck('name','id');
                $id = null;
                foreach($categories as $cat_id=>$category){
                        if(str_slug($category)===trim($slug)){
                                $id = $cat_id;
                                break;
                        }
                }

               $products = Products::where('category_id','=',$id)->paginate(2);
               return view('products',compact('category','products'));
       }

        public function edit($id){
                $category = Category::findOrFail($id);
                return view('dashboard.category.edit',compact('category'));
        }
        public function store(Request $request){
                $this->validate($request,[
                        'name' => 'required|unique:categories',
                ]);
                Category::create($request->all());
                session()->flash('__response', ['notify' => 'Category "' . $request->input('name') . '" created successfully.', 'type' => 'success']);
                return redirect()->action('CategoryController@index');
        }
        public function create(){
                return view('dashboard.category.create');
        }
        public function update($id,Request $request){
                $category = Category::findOrFail($id);
                $this->validate($request,[
                        'name' => 'required|unique:categories,name,'.$category->id,
                ]);
                $category->fill($request->all());
                $category->save();
                session()->flash('__response', ['notify' => 'Category "' . $request->input('name') . '" updated successfully.', 'type' => 'success']);
                return back();
        }
       public function destroy($id){
               $category = Category::findOrFail($id);
               $category->delete();
               session()->flash('__response', ['notify' => 'Deleted "' . $category->name . '" deleted successfully.', 'type' => 'success']);
               return back();
       }
}
