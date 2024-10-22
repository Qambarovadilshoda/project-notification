<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NewFollowerNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::where('id' , '!=', Auth::user()->id)->get();
        return view("users.index",compact("users"));
    }
    public function profile($userName){
        $user = User::where('userName',$userName)->first();
        return view("users.profile",compact("user"));
    }
    public function follow($id){
        $user = User::findOrFail($id);
        Auth::user()->following()->attach($user->id);
        $user->notify(new NewFollowerNotification(Auth::user()));
        return redirect()->back();
    }
    public function unFollow($id){
        $user = User::findOrFail($id);
        Auth::user()->following()->detach($user->id);
        return redirect()->back();
    }
    public function notification(){
        $unReadNotify = Auth::user()->unReadNotifications;
        $readNotify = Auth::user()->readNotifications;
        return view("auth.notify",compact("unReadNotify", 'readNotify'));
    }
    public function readNotification($id){
        $notify = Auth::user()->unReadNotifications->where('id', $id)->first();
        $notify->markAsRead();
        return redirect()->back();
    }
    public function readAllNotification(){
        $notify = Auth::user()->unReadNotifications;
        $notify->markAsRead();
        return redirect()->back();
    }
}
