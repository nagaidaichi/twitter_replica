<?php

namespace App\Http\Controllers;

use App\Master;
use App\Tweet;
use App\User;
use App\Users;
use App\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(!Auth::check()){
        //     return redirect('/');
        // }
        $user_id = Auth::id();
        $user = Auth::user();
        $followings = $user->followings()->with('tweet')->get();
        $followings_id = [];
        foreach($followings as $item){
            $followings_id[] += $item->id;
        }
        $followings_id[] += $user_id;
        $tweets = Tweet::latest()->whereIn('user_id', $followings_id)->with('user')->orderBy('created_at', 'desc')->get();

        return view('master', compact('tweets', 'followings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $tweet = new Tweet();
        $tweet->user_id = Auth::id();
        $tweet->content = $request->input('content');
        $tweet->save();

        return redirect('masters');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show(Master $master, Tweet $tweet)
    {
        return view('masters', compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function edit(Master $master)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master $master)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {
        //
    }

    public function logout() 
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
