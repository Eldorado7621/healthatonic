<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\HealthTip;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Pregnanthealthtip;
use App\Nursingmotherstip;
use App\Comment;
use App\DynamicField;
use Validator;

class HealthTipsController extends Controller
{
	
	public function postTips(Request $request)
	{
		;
		$this->validate($request, [
            'subject' => 'required',
            'body' => 'required',
            'picture' => 'required',
			'cat'=>'required',
           ]);
		  
		  $cat=$request->cat;
		  if($cat==1)
		  {
		 $health_tips=new HealthTip();
		 $health_tips->subject=$request->subject;
		 $health_tips->body=$request->body;
		 
		 $path=$request->file('picture')->store('HealthTips/'.date('Y').date('F'), ['disk' => 'public_uploads']);
		 $health_tips->picture=$path;
		 
		  if ($health_tips->save()) {
			
			return redirect()->route('home')->with('success', 'Data created successfully');
		   }
		  }
		  elseif($cat==2) 
		  {
		  $health_tips=new Pregnanthealthtip();
		  $health_tips->subject=$request->subject;
		  $health_tips->body=$request->body;
		 
		  $path=$request->file('picture')->store('PregnantHealthTips/'.date('Y').date('F'), ['disk' => 'public_uploads']);
		  $health_tips->picture=$path;
		 
		  if ($health_tips->save()) {
			
			return redirect()->route('home')->with('success', 'Data created successfully');
		   }
			  
		  }
		    elseif($cat==3) 
		  {
		  $health_tips=new Nursingmotherstip();
		  $health_tips->subject=$request->subject;
		  $health_tips->body=$request->body;
		 
		  $path=$request->file('picture')->store('Nursingmothertip/'.date('Y').date('F'), ['disk' => 'public_uploads']);
		  $health_tips->picture=$path;
		 
		  if ($health_tips->save()) {
			
			return redirect()->route('home')->with('success', 'Data created successfully');
		   }
			  
		  }
			
	}
	
	public function pregHealthTipsComment(Request $request)
	{
		$this->validate(['message'=>required,]);
		$comment=New Comment();
		$comment->coment=$request->message;
		$comment->pregnanthealthtip_id=$request->id;
		$comment->user_id=Auth::user()->id;
		if($coment->save()){
			return redirect()->route('home')->with('success', 'Data created successfully');
		}
		
	}
	
     function saveComment(Request $request)
    {
     if($request->ajax())
     {
      $rules = array(
       'first_name.*'  => 'required',
       'last_name.*'  => 'required'
      );
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }

      $first_name = $request->first_name;
      $last_name = $request->last_name;
      for($count = 0; $count < count($first_name); $count++)
      {
       $data = array(
        'first_name' => $first_name[$count],
        'last_name'  => $last_name[$count]
       );
       $insert_data[] = $data; 
      }

      DynamicField::insert($insert_data);
      return response()->json([
       'success'  => 'Data Added successfully.'
      ]);
     }
    }
	
}
?>