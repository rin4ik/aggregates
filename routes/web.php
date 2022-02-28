<?php

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { 
    $users = User::withCount([
        'articles as articles_count_alias' => fn ($query) => $query->published(), 
        'comments',
        'comments as comments_deleted_count' => fn ($query) => $query->onlyTrashed()
    ])
    ->withSum('articles', 'votes')
    ->get();  
    return view('welcome', ['users' => $users]);
});
Route::get('/users/{user}', function (User $user) { 
    // $user->loadCount([
    //     'articles as articles_count_alias' => fn ($query) => $query->published(), 
    //     'comments',
    //     'comments as comments_deleted_count' => fn ($query) => $query->onlyTrashed()
    // ])
    // ->loadSum('articles', 'votes'); 
    return view('user', ['user' => $user]);
});

