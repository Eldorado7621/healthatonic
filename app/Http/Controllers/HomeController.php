<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Need;
use Illuminate\Support\Facades\Auth;
use User;
use App\Phc;
use App\Birth;
use Image;

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
     * @return \Illuminate\View\View
     */
	 
	
    public function index()
    {
        return view('dashboard');
    }
	public function getPhcList()
	{
		return view('select-phc');
	}
	public function getPhc(Request $request)
	{
		$this->validate($request, [
            'phc' => 'required',
           ]);
		  
		    $phcs=Phc::where('id',$request->phc)->get();
			
			foreach($phcs as $phc)
			{
			$request->session()->put('phc_name',$phc->name);
			$request->session()->put('phc_id',$phc->id);
			$request->session()->put('phc_state',$phc->state);
			$request->session()->put('phc_lga',$phc->lga);
			}
			
		 $phc_id=session('phc_id');
		 $phc=Phc::find($phc_id);
	     $no_of_patients=count( $phc->patients);
		 $current_month=date("m");
		 $current_year=date("Y");
		 $no_of_births=count(Birth::where('phc',$phc_id)->get());
		 $no_of_monthly_patient=count($phc->diagnoses()->whereYear('created_at','=',$current_year)->whereMonth('created_at','=',$current_month)->get());
		 session()->put('no_of_monthly_patient',$no_of_monthly_patient);
		 session()->put('no_of_patients',$no_of_patients);
		 session()->put('no_of_births',$no_of_births);
		 $val=array();
		 $name="value";
		 for($i=0;$i<=11;$i++)
		 {
		   $v=count($phc->diagnoses()->whereYear('created_at','=',$current_year)->whereMonth('created_at','=',$i+1)->get());
		   session()->put($name.$i,$v);
		    $val[$i]=$v;
		 }
		 $max_val=max($val);
		 if($max_val!=0)
		 {
		 $bar_height=array();
		 $name="height";
		 for($i=0;$i<=11;$i++)
		 {
		   $bar=$val[$i]*250/$max_val;
		   session()->put($name.$i,$bar);
		   $bar_height[$i]=$bar;
		 }
		
		 $max_height=max( $bar_height);
		 $margin_top=array();
		 $name="margin_top";
		 for($i=0;$i<=11;$i++)
		 {
		   $margin=$max_height-$bar_height[$i];
		    session()->put($name.$i,$margin);
			
		 }
		 
		 
		  }
		
		
		
		return redirect()->route('dashboard');
	}
	public function getNeeds()
	{
		
			$phc=session('phc_id');
			
			$needs=Phc::find($phc)->needs;
		return view('needs')->with(['needs'=>$needs,'phc'=>$phc,'success'=>'']);
	}
	public function view_need(Request $request)
	{
		 $this->validate($request, [
            'phc' => 'required',]);
			$phc=$request->phc;
			$needs=Phc::find($phc)->needs;
		return view('needs')->with(['needs'=>$needs,'phc'=>$phc]);
		
	}
	public function postNeeds(Request $request)
	{
		 $this->validate($request, [
            'itemName' => 'required|max:120',
            'desc' => 'required',
            'qtty' => 'required',
            'price' => 'required',
			'approval' => 'required',
            'pix' => 'required',]);
		 $need=new Need();
		 $need->item = $request['itemName'];
         $need->brief_desc = $request['desc'];
         $need->qtty = $request['qtty'];
         $need->price = $request['price'];
		 $need->user_id=Auth::user()->id;
		 $need->verified=0;
		 $need->fulfilled=0;
		 $path=$request->file('pix')->store('Needs/'.date('Y').date('F'), ['disk' => 'public_uploads']);
		 $approval=$request->file('approval')->store('Needs/Approval/'.date('Y').date('F'), ['disk' => 'public_uploads']);
		 $need->picture=$path;
		 $need->approval=$approval;
		 $phc=$request->phc;
		  if ($need->save()) {
			//dd('shere');
			$need->phcs()->attach($phc);
			$needs=Phc::find($phc)->needs;
		return view('needs')->with(['needs'=>$needs,'phc'=>$phc,'success'=>'Data created successfully']);
			//return redirect()->route('needs')->with('success', 'Data created successfully');
		 
		  }
			
			
			
		
	}
	public function updateNeeds(Request $request)
	{
		 $this->validate($request, [
            'itemName' => 'required|max:120',
            'desc' => 'required|max:120',
            'qtty' => 'required|max:120',
            'price' => 'required|max:120',
            'approval' => 'required',
            'pix' => 'required',]);
			if($request->pix==$request->pixx)
			{
				$path=$request->pix;
			}
			else
			{
			  $path=$request->file('pix')->store('Needs/'.date('Y').date('F'), ['disk' => 'public_uploads']);
		
			}
			if($request->approval==$request->approvall)
			{
				$approval=$request->approval;
			}
			else
			{
			  $approval=$request->file('approval')->store('Needs/Approval/'.date('Y').date('F'), ['disk' => 'public_uploads']);
		
			}
			
			Need::where('id', $request->id)
			->update([
					'item'=>$request['itemName'],
					'brief_desc'=>$request['desc'],
					'qtty'=>$request['qtty'],
					'price'=>$request['price'],
					'picture'=>$path,
					'approval'=>$approval,
					]);
		
		 $phc=$request->phc;
		$needs=Phc::find($phc)->needs;
		return view('needs')->with(['needs'=>$needs,'phc'=>$phc,'success'=>'Update created successfully']);
	}
	public function delete_need()
	{
		$url=url()->current();
		 $tmp = explode('=', $url);
		 $id = end($tmp);
		  $tmp = explode('+', $url);
		  $phc=end($tmp);
		 Need::where('id', $id)->delete();
		 $needs=Phc::find($phc)->needs;
		return view('needs')->with(['needs'=>$needs,'phc'=>$phc,'success'=>'Data deleted successfully']);
			
		 
		 
	}
	public function remove(Request $request)
	{
		dd($request);
		
	}
}
