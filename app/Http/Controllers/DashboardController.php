<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
    	$current_month_users=User::whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->month)->count();
        $last_month_users=User::whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->subMonth(1))->count();
        $last_to_month_users=User::whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->subMonth(2))->count();
    	return view('dashboard.index')
    	->with('posts',Post::all())
    	->with('categories',Category::all())
    	->with('tags',Tag::all())
    	->with('users',User::all())
    	->with(compact('current_month_users','last_month_users','last_to_month_users'));
    }
}
