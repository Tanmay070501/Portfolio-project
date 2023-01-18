<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function showAll(){
        return view('users')->with('users',User::where('role',0)->orderBY('name','asc')->paginate(5));
    }
    public function friends(){
        return view('friends')->with('friends',User::where('role',0)->where('friend','1')->orderBY('name','asc')->paginate(5));
    }
    public function premium(){
        return view('premium')->with('premium',User::where('role',0)->where('premium','1')->orderBY('name','asc')->paginate(5));
    }
    public function removeFriend($id){
        if(Auth::check()){
            if(Auth::user()->role == 0){
                return redirect()->back()->with('error','Unauthorized! Admins only!');
            }
            $user = User::find($id);
            if($user){
                $user->friend = 0;
                $user->save();
                return redirect()->back()->with('success','User with name'.$user->name.' got unfriended successfully!');
            }else{
                return redirect()->back()->with('error','User with that id does not exist');
            }
        }else{
            return redirect()->back()->with('error','Admin is not signed in');
        }
    }
    public function addFriend($id){
        if(Auth::check()){
            if(Auth::user()->role == 0){
                return redirect()->back()->with('error','Unauthorized! Admins only!');
            }
            $user = User::find($id);
            if($user){
                $user->friend = 1;
                $user->save();
                return redirect()->back()->with('success','User with name '.$user->name.' got friended successfully!');
            }else{
                return redirect()->back()->with('error','User with that id does not exist');
            }
        }else{
            return redirect()->back()->with('error','Admin is not signed in');
        }
    }
    public function delete($id){
        if(Auth::check()){
            if(Auth::user()->role == 0){
                return redirect()->back()->with('error','Unauthorized! Admins only!');
            }
            $user = User::find($id);
            if($user){
                $user->delete();
                return redirect()->back()->with('success','User deleted successfully!');
            }else{
                return redirect()->back()->with('error','User with that id does not exist');
            }
        }else{
            return redirect()->back()->with('error','Admin is not signed in');
        }
    }
}
