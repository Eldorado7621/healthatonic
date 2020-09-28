<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Pregnanthealthtip;
use App\Comment;



class PregnantController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function pregHealthTips()
	{
		$pregHealthTips=Pregnanthealthtip::paginate(1);
		
		return view ('pw/health-tips-blog')->with('pregHealthTips',$pregHealthTips);
	}
	 public function pregTip()
	 {
		 $url=url()->current();
		$tmp = explode('=', $url);
		$id = end($tmp);
		$pregHealthTip=Pregnanthealthtip::find($id);
		$comments=Comment::where('pregnanthealthtip_id',$id)->orderBy('id', 'desc')->get();
		return view('pw/blog-details')->with(['pregHealthTip'=>$pregHealthTip,
											'comments'=>$comments]);
		 
	 }
}