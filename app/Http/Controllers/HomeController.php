<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Jobs\LogUserActions;

use App\User;
use App\UserHobby;
use App\Hobby;
use App\FriendUser;
use Auth;


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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::friendList();
        return view('home', compact('users'));
    }

    /**
     * Handles a friend request
     */
    public function friendRequest(User $requestedUser) {
        $checkFriendship = User::checkFriendship(Auth::user()->id, $requestedUser->id);
        if(!$checkFriendship) {
            FriendUser::create([
                'user_id' => Auth::user()->id,
                'friend_id' => $requestedUser->id,
                'status' => 0,
            ]);
            return Redirect::back()->with('status', 'Friend Request is sent!!');
        } else {
            return Redirect::back()->with('status', 'Friend Request is already served');
        }
    }
    
    /**
     * Handles an accept friend request
     */
    public function acceptRequest(User $requestedUser) {
        $checkFriendship = User::checkFriendship($requestedUser->id, Auth::user()->id);
        if($checkFriendship) {
            $checkFriendship->status = 1;
            $checkFriendship->save();
            return Redirect::back()->with('status', 'Friend Request accepted!!');
        } else {
            return Redirect::back()->with('status', 'Invalid Request');
        }
    }

    /**
     * Handles a block request
     */
    public function blockFriend(User $requestedUser) {
        $checkFriendship = User::checkFriendship(Auth::user()->id, $requestedUser->id);
        if(!$checkFriendship) {
            FriendUser::create([
                'user_id' => Auth::user()->id,
                'friend_id' => $requestedUser->id,
                'status' => 2,
            ]);
            return Redirect::back()->with('status', 'User is Blocked!!');
        } else {
            return Redirect::back()->with('status', 'Invalid Request');
        }
    }

    /**
     * Handles a list-log request
     */
    public function listUserActionLogs()
    {
        $logs = \UserActionLogHelper::userActionLists();
        return view('useractionlogs',compact('logs'));
    }
}
