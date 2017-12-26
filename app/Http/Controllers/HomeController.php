<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @param UserRepository $users
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, UserRepository $users)
    {
//        dd($users->videosFromSubscriptions($request->user()));
        return view('home',[
            'subscriptionVideos' => $users->videosFromSubscriptions($request->user()),
            'subscribedChannels' => $request->user()->subscribedChannels()->get(),
        ]);
    }
}
