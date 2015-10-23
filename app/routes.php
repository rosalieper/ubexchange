<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', function () {

    $data['users'] = User::all();
    $data['questions'] = Question::paginate(5);
    $data['count'] = Question::all()->count();

        return View::make('site.home')->with($data);
});

Route::get('questions', function () {

    $data['users'] = User::all();
    $data['questions'] = Question::paginate(5);
    $data['count'] = Question::all()->count();

    return View::make('site.questions')->with($data);
        
});

Route::get('question/{id}/{slug}', function ($id, $slug) {

    $data['users'] = User::all();
    $data['qvotes'] = Qvote::where('question_id', '=', $id)->get();
    $data['question'] = Question::find($id);
    $data['answers'] = Answer::where('question_id', '=', $id)->get();
    $data['count'] = Answer::where('question_id', '=', $id)->count();
    //where('publish', '=', 'on')->orderBy('created_at', 'desc')->paginate(8);
    //$data['answers'] = DB::select( DB::raw("SELECT * FROM answers WHERE `question_id` = $id") );

        return View::make('site.question')->with($data);
});

Route::get('users', function () {

    $data['users'] = User::all();

        return $data['users'];
});

Route::get('user/{id}/{slug}', function ($id, $slug) {

    $data['user'] = User::find($id);

        return $data['user'];
});

Route::get('unanswer', function () {

    $data['unanswer'] = Question::where('solved', '=', '0')->get();

    return $data['unanswer'];
});

Route::get('search', function () {

    $data['users'] = User::all();
    $data['searchResults'] = Question::where('title', 'like', '%'.Input::get('search').'%')->paginate(5);
        
        $data['count'] =  $data['searchResults']->count();
        return View::make('site.searchresults')->with($data);
});

Route::get('contact_us', function () {
        return Redirect::back();
});

Route::get('privacy_policy', function () {
        return Redirect::back();
});

/*
    |--------------------------------------------------------------------------
    | Session Controller Routes
    |--------------------------------------------------------------------------
    |
    | Routes to handle session things
    |
    */
Route::get('logout', 'SessionController@logout');
Route::get('login', 'SessionController@login');
Route::post('login', 'SessionController@handleLogin')->before('csrf');
Route::get('register', 'SessionController@register');
Route::post('register', 'SessionController@handleRegister')->before('csrf');
Route::get('activate/{key}', 'SessionController@activate');

Route::get('remind', 'SessionController@remind');
Route::post('remind', 'SessionController@handleRemind');
Route::get('recovery/{link}', 'SessionController@recovery');
Route::post('recovery', 'SessionController@handleRecovery');


/*
    |--------------------------------------------------------------------------
    | Profile Controller Routes
    |--------------------------------------------------------------------------
    |
    | Routes to handle user profile
    |
    */
Route::controller('profile', 'ProfileController');

Route::controller('votes', 'VoteController');

/*
    |--------------------------------------------------------------------------
    | Search Controller Routes
    |--------------------------------------------------------------------------
    |
    | Routes to handle questions and answers in the public area
    |
    */
     //$date = date("F j, Y, g:i a");