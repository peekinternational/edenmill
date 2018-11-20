<?php

namespace Edenmill\Http\Controllers;

use Illuminate\Http\Request;
use Edenmill\User;
use Edenmill\Products;
use Edenmill\Pages;
use Edenmill\Categories;
use Edenmill\Orders;

//use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }
   /* public function users()
    {
        $users = User::all()->toArray();
        return view('dashboard.usersnew',["users"=>$users]);
    }*/
    /*public function add_user()
    {
        if(isset($_POST['add_user_btn'])){

            $insert_id = \DB::table('users')->insertGetId(
                ['first_name'=>$_POST['firstname'],
                    'last_name'=>$_POST['lastname'],
                    'name'=>$_POST['firstname'].' '.$_POST['lastname'],
                    'email'=>$_POST['email_reg'],
                    'company_name'=>'',
                    'password'=>md5($_POST['password_reg']),
                    'role'=>2]
            );
            return redirect()->action('DashboardController@users');
        }
        return view('dashboard/add_user');
    }*/
   /* public function edit_user($id)
    {
        if(isset($_POST['edit_user_btn'])){

            $query = \DB::table('users')
                ->where('id', $id)
                ->update([
                    'first_name'        =>$_POST['firstname'],
                    'last_name'         =>$_POST['lastname'],
                    'email'             =>$_POST['email_reg']
                ]);
            //dd(\DB::getQueryLog());exit;
            return redirect()->action('DashboardController@users');
        }
        $user_info = \DB::table('users')->where('id', $id)->first();
        return view('dashboard/edit_user',["user_info"=>$user_info]);
    }*/

    public function delete_data()
    {
        $resutl = \DB::table($_POST['table'])->where('id', '=', $_POST['id'])->delete();
        echo $resutl;
    }
   /* public function pages()
    {
        $pages = Pages::all()->toArray();
        return view('dashboard/pages',["pages"=>$pages]);
    }*/

   /* public function add_page()
    {
        if(isset($_POST['add_page_btn'])){

            $insert_id = \DB::table('pages')->insertGetId(
                ['title'=>$_POST['name'],
                    'description'=>$_POST['description'],
                    'image'=>'',
                    'slug'=>$_POST['name']
                ]
            );
            return redirect()->action('DashboardController@pages');
        }
        return view('dashboard/add_page');
    }*/

    /*public function edit_page($id)
    {
        if(isset($_POST['edit_page_btn'])){

            $query = \DB::table('pages')
                ->where('id', $id)
                ->update(
                    [   'title'=>$_POST['name'],
                        'description'=>$_POST['description'],
                        'slug'=>$_POST['name']
                    ]
                );
            //dd(\DB::getQueryLog());exit;
            return redirect()->action('DashboardController@pages');
        }
        $page_info = \DB::table('pages')->where('id', $id)->first();
        return view('dashboard/edit_page',["page_info"=>$page_info]);
    }*/



    public function orders()
    {
        $orders = Orders::all()->toArray();
        return view('dashboard/orders',["orders"=>$orders]);
    }

    public function edit_order($id)
    {
        if(isset($_POST['edit_order_btn'])){

            $query = \DB::table('orders')
                ->where('id', $id)
                ->update(
                    [   'note'=>$_POST['note']
                    ]
                );
            //dd(\DB::getQueryLog());exit;
            return redirect()->action('DashboardController@orders');
        }
        $order_info = \DB::table('orders')->where('id', $id)->first();
        return view('dashboard/edit_order',["order_info"=>$order_info]);
    }
    public function products()
    {
        $products = Products::all()->toArray();
        return view('dashboard/products',["products"=>$products]);
    }
    public function add_product()
    {
        if(isset($_POST['add_product_btn'])){

            $insert_id = \DB::table('products')->insertGetId(
                ['name'=>$_POST['name'],
                    'slug'=>$_POST['slug'],
                    'price'=>$_POST['price'],
                    'description'=>$_POST['description'],
                    'meta_title'=>$_POST['meta_title'],
                    'meta_keywords'=>$_POST['meta_keyword'],
                    'meta_description'=>$_POST['meta_description']
                ]
            );
            return redirect()->action('DashboardController@products');
        }
        return view('dashboard/add_product');
    }
    public function edit_product($id)
    {
        if(isset($_POST['edit_product_btn'])){

            $query = \DB::table('products')
                ->where('id', $id)
                ->update([
                    'name'=>$_POST['name'],
                    'slug'=>$_POST['slug'],
                    'price'=>$_POST['price'],
                    'description'=>$_POST['description'],
                    'meta_title'=>$_POST['meta_title'],
                    'meta_keywords'=>$_POST['meta_keyword'],
                    'meta_description'=>$_POST['meta_description']
                ]);
            //dd(\DB::getQueryLog());exit;
            return redirect()->action('DashboardController@products');
        }
        $product_info = \DB::table('products')->where('id', $id)->first();
        return view('dashboard/edit_product',["product_info"=>$product_info]);
    }
    public function categories()
    {
        $categories = Categories::all()->toArray();
        return view('dashboard/categories',["categories"=>$categories]);
    }

    public function add_category()
    {
        if(isset($_POST['add_category_btn'])){

            $insert_id = \DB::table('categories')->insertGetId(
                [
                    'title'=>$_POST['title'],
                    'slug'=>$_POST['slug']
                ]
            );
            return redirect()->action('DashboardController@categories');
        }
        return view('dashboard/add_category');
    }
    public function edit_category($id)
    {
        if(isset($_POST['edit_category_btn'])){

            $query = \DB::table('categories')
                ->where('id', $id)
                ->update([
                    'title'=>$_POST['title'],
                    'slug'=>$_POST['slug']
                ]);
            //dd(\DB::getQueryLog());exit;
            return redirect()->action('DashboardController@categories');
        }
        $category_info = \DB::table('categories')->where('id', $id)->first();
        return view('dashboard/edit_category',["category_info"=>$category_info]);
    }
}
