<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    //
    public function store(Request $request){
        if(Auth::check()){
            $validator = Validator::make($request->all(),[
                'body' => 'required|string'
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error','Comment area is mandatory!');
            }
            $diary = Diary::where('id',$request->diary_id);
            if($diary){
                Comments::create(['diary_id'=>$request->diary_id,
                'body'=>$request->body,'comment_user_id' => Auth::user()->id ]);
                return redirect()->back()->with('success','Comment added successfully!');
            }else{
                return redirect()->back()->with('error','No such diary found');
            }
        }else{
            return redirect()->back()->with('error','Login first to comment');
        }
    }
    public function delete($id){
        if(Auth::check()){
            $comment= Comments::find($id);
            if($comment){
                if(Auth::user()->id === $comment->user->id || Auth::user()->role == 1){
                    $comment->delete();
                    return redirect()->back()->with('success','Comment deleted successfully!');
                }else{
                    return redirect()->back()->with('error','You are not authorized to delete this comment!');
                }
            }else{
                return redirect()->back()->with('error','Comment with that id does not exist');
            }
        }else{
            return redirect()->back()->with('error','Not Authenticated!');
        }
    }
}
