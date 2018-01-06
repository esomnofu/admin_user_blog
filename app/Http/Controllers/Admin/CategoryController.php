<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CategoryController extends Controller
{


    /*
    MR OFU
    MR OFU
    MR OFU
    To Restrict Access --- we can create the Middleware in the Construct Function
    which which signal an Unauthorized signal ... i.e 403
    and we serve a 403 Page on the view as done on Permission, Role and User Controllers
    public function __construct()
    {

        $this->middleware('can:posts.tag');

    }
    */



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
       if (Auth::user()->can('posts.category')) {
       $categories = category::all();
       return view('admin.category.show', compact('categories'));     
       }

       return back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.category.create');
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

            'name' => 'required',
            'slug' => 'required'

        ]);


        $category = new category;

        $category->name = $request->name;
        $category->slug = $request->slug;

        $category->save();

        return redirect()->route('category.index');


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

        if (Auth::user()->can('posts.category')) {
        $category = category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));        
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
    public function update(Request $request, $id)
    {
          $this->validate($request, [

            'name' => 'required',
            'slug' => 'required'

        ]);


        $category = category::find($id);

        $category->name = $request->name;
        $category->slug = $request->slug;

        $category->save();

        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::where('id' , $id)->delete();
        return back();
    }
}
