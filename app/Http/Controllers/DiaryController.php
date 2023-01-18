<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    //
    public function store(Request $request){
        $title = $request->all()['title'];
        $description = $request->all()['description'];
        Diary::create([
            'title' =>$title,
            'description' => $description,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->back()->with('message','Your diary has been added');
    }
    public function show($id){
        $diary = Diary::find($id);
        if($diary){
            return view('diary_show')->with('diary',$diary);
        }else{
            return "No diary with id: ".$id." exists";
        }
    }
    public function showAll(){
        return view('diary_list')->with('diary',Diary::orderBY('updated_at','desc')->paginate(5));
    }
    public function delete($id){
        if(Auth::check()){
            if(Auth::user()->role == 0){
                return redirect()->back()->with('error','Unauthorized! Admins only!');
            }
            $user = Diary::find($id);
            if($user){
                $user->delete();
                return redirect()->back()->with('success','Diary deleted successfully!');
            }else{
                return redirect()->back()->with('error','Diary with that id does not exist');
            }
        }else{
            return redirect()->back()->with('error','Admin is not signed in');
        }
    }
}