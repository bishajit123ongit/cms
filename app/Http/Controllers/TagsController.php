<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;

class TagsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tags',Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
    
        Tag::create([
           'name'=>$request->name
        ]);
        session()->flash('success','Tag Created Successfully!!');
        return redirect(route('tags.index'));
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
    public function edit(Tag $tag)
    {
        return view('tags.create')->with('tag',$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update([
            'name'=>$request->name
        ]);
           $msg= __('translateproperties.tagupdatemsg');


        session()->flash('success', $msg);
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if($tag->posts->count()>0)
        {
            session()->flash('success','Tag Cannot be Deleted because it has some post');

            return redirect()->back();
        }
        $tag->delete();
        session()->flash('success','Tag Deleted Successfully');
        return redirect(route('tags.index'));
    }

    public function viewTagChart()
    {
         $currrent_month_tag=Tag::whereYear('created_at',Carbon::now()->year)
         ->whereMonth('created_at',Carbon::now()->month)->count();
         $current_last_one_tag=Tag::whereYear('created_at',Carbon::now()->year)
         ->whereMonth('created_at',Carbon::now()->subMonth(1))->count();
         $current_last_two_tag=Tag::whereYear('created_at',Carbon::now()->year)
         ->whereMonth('created_at',Carbon::now()->subMonth(2))->count();

         $current_last_three_tag=Tag::whereYear('created_at',Carbon::now()->year)
         ->whereMonth('created_at',Carbon::now()->subMonth(3))->count();
         $current_last_four_tag=Tag::whereYear('created_at',Carbon::now()->year)
         ->whereMonth('created_at',Carbon::now()->subMonth(4))->count();
         $current_last_five_tag=Tag::whereYear('created_at',Carbon::now()->year)
         ->whereMonth('created_at',Carbon::now()->subMonth(5))->count();
         $current_last_six_tag=Tag::whereYear('created_at',Carbon::now()->year)
         ->whereMonth('created_at',Carbon::now()->subMonth(6))->count();
         $current_last_seven_tag=Tag::whereYear('created_at',Carbon::now()->year)
         ->whereMonth('created_at',Carbon::now()->subMonth(7))->count();
         $current_last_eight_tag=Tag::whereYear('created_at',Carbon::now()->year)
         ->whereMonth('created_at',Carbon::now()->subMonth(8))->count();
         $current_last_nine_tag=Tag::whereYear('created_at',Carbon::now()->year)
         ->whereMonth('created_at',Carbon::now()->subMonth(9))->count();
         $current_last_ten_tag=Tag::whereYear('created_at',Carbon::now()->year)
         ->whereMonth('created_at',Carbon::now()->subMonth(10))->count();
         $current_last_eleven_tag=Tag::whereYear('created_at',Carbon::now()->year)
         ->whereMonth('created_at',Carbon::now()->subMonth(11))->count();

        return view('tags.showchart')->with(compact('currrent_month_tag','current_last_one_tag','current_last_two_tag',
    'current_last_three_tag','current_last_four_tag','current_last_five_tag','current_last_six_tag',
    'current_last_seven_tag','current_last_eight_tag','current_last_nine_tag','current_last_ten_tag','current_last_eleven_tag'));
    }
}
