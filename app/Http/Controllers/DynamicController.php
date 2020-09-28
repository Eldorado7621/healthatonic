<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DynamicField;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Comment;
use App\Rep;

class DynamicController extends Controller
{
	function saveComment(Request $request)
    {
     if($request->ajax())
     {
      $rules = array(
       'message'  => 'required',
       'id'  => 'required'
      );
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }

	  $comment=new Comment();
	  $comment->pregnanthealthtip_id= $request->id;
	  $comment->user_id= Auth::user()->id;
	  $comment->coment= $request->message;
	  $comment->save();
	  $date=date("d-M-Y");
	  $name=Auth::user()->name;
	  $alpha=strtoupper(substr($name,0,1));
	  $comment= $request->message;
	  
	 /* $data = array(
        'first_name' => $first_name,
        'last_name'  => $last_name
       );
       $insert_data[] = $data; 
      /*for($count = 0; $count < count($first_name); $count++)
      {
       $data = array(
        'first_name' => $first_name[$count],
        'last_name'  => $last_name[$count]
       );
       $insert_data[] = $data; 
      }

      DynamicField::insert($insert_data);*/
      return response()->json([
       'success'  => 'Comment Added successfully.',
	   'date'=>$date,
	   'name'=>$name,
	   'alpha'=>$alpha,
	   'comment'=>$comment,
      ]);
     }
    }

	function saveReply(Request $request)
	{
	 if($request->ajax())
     {
      $rules = array(
       'reply'  => 'required',
       'id'  => 'required'
      );
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }

	  $rep=new Rep();
	  $rep->comment_id= $request->id;
	  $rep->reply= $request->reply;
	  $rep->save();
	  $date=date("d-M-Y");
	  $name=Auth::user()->name;
	   $reply= $request->reply;
	   return response()->json([
       'success'  => 'Reply Added successfully.',
	   'date'=>$date,
	   'name'=>$name,
	   'reply'=>$reply,
      ]);
     }
	}

}