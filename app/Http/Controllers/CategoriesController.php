<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use Carbon\Carbon;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index')->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
    
        Category::create([
           'name'=>$request->name
        ]);
        $msg= __('translateproperties.categorycreatemsg');
        session()->flash('success',$msg);
        return redirect(route('categories.index'));
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
    public function edit(Category $category)
    {
        return view('categories.create')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name'=>$request->name
        ]);

        $msg= __('translateproperties.categoryupdatemsg');
        session()->flash('success',$msg);
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

       if($category->post->count()>0)
       {
        $msgg= __('translateproperties.categorydeleteerrormsg');
         session()->flash('error',$msgg);
         return redirect()->back();
       }

        $category->delete();
        $msg= __('translateproperties.categorydeletemsg');
        session()->flash('success',$msg);
        return redirect(route('categories.index'));
    }

    public function viewCategoryChart()
    {
        $currrent_month_category=Category::whereYear('created_at',Carbon::now()->year)
        ->whereMonth('created_at',Carbon::now()->month)->count();
        $current_last_one_category=Category::whereYear('created_at',Carbon::now()->year)
        ->whereMonth('created_at',Carbon::now()->subMonth(1))->count();
        $current_last_two_category=Category::whereYear('created_at',Carbon::now()->year)
        ->whereMonth('created_at',Carbon::now()->subMonth(2))->count();

        return view('categories.showchart')->with(compact('currrent_month_category','current_last_one_category','current_last_two_category'));
    }
}
