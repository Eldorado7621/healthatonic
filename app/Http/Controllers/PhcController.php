<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phc;
use App\Birth;
use Validator;
use App\Patient;
use App\Maintenance;
use App\Diagnose;
use App\Sale;
use App\User;
use App\Referral;
use DB;

use Illuminate\Support\Facades\Auth;

class PhcController extends Controller
{
	  public function __construct()
    {
         $this->middleware('auth');
		
    }
    function index()
    {
     return view('create-phc');
    }
	  function dashboard()
	  {
		$month=['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];
		return view('dashboard')->with('month',$month);
		 
	  }
    function insert(Request $request)
    {
		
    if($request->ajax())
     {
       $rules = array(
       'name.*'  => 'required',
       'address.*'  => 'required'
      );
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }

      $name = $request->name;
      $address = $request->address;
	  $state = $request->state;
      $lga = $request->lga;
      for($count = 0; $count < count($name); $count++)
      {
       $data = array(
        'name' => $name[$count],
        'address'  => $address[$count],
        'state'  => $state[$count],
        'lga'  => $lga[$count]
       );
       $insert_data[] = $data; 
      }

      Phc::insert($insert_data);
	  
      return response()->json([
	  
       'success'  => 'Data Added successfully.'
      ]);
     }
    }

	public function PhcState(Request $request)
	{
		 $this->validate($request,[
           
            'state'=>'required',
            'lga'=>'required',
           ]);
		   $state=$request->state;
		   $lga=$request->lga;
		   
		   return view('create-phc')->with(['state'=>$state,'lga'=>$lga]);
	}
	public function addProfilePhc(Request $request)
	{
		$this->validate($request,[
           
            'state'=>'required',
            'lga'=>'required',
           ]);
		   $lga=$request->lga;
		   $phcs=Phc::where('lga','=',$lga)->get();
		   //return Response::json($phcs);
		 return view('profile-phc')->with(['phcs'=>$phcs,'state'=>$request->state,'lga'=>$lga]);
		
	}
	public function submitProfilePhc(Request $request)
	{
		$this->validate($request,[
           
            'selectedPhc'=>'required',
           ]);
		   $phc=$request->selectedPhc;
		   $user=new User();
		   $user->id=Auth::user()->id;
		   $user->phcs()->attach($phc);
		   //return to dashboard
		   
	}
	
	
	
	  public function uploadProfile(Request $request)
	  {
		
		  $this->validate($request,[
            'profile_picture'=>'required|image|mimes:jpeg,png,jpg,gif|max:60',
           ]);
		   $path=$request->file('profile_picture')->store('Profile/'.date('Y').date('F'), ['disk' => 'public_uploads']);
		
		
		  User::where('id', Auth::user()->id)
			->update([
					'picture'=>$path,
					]);
		 return back()->withStatus(__('Profile successfully updated.'));
	  }

		public function add_maint_schedule(Request $request)
		 {
			$this->validate($request,[
           
            'item'=>'required',
            'desc'=>'required',
            'pix'=>'required|image|mimes:jpeg,png,jpg,gif|max:60',
            'approval'=>'required|image|mimes:jpeg,png,jpg,gif|max:1024',
           ]);
		   
		 $path=$request->file('pix')->store('Maintenance/'.date('Y').date('F'), ['disk' => 'public_uploads']);
		 $approval=$request->file('approval')->store('Maintenance/Approval/'.date('Y').date('F'), ['disk' => 'public_uploads']);
	
		   $maintenance=new Maintenance();
		   $maintenance->item=$request->item;
		   $maintenance->description=$request->desc;
		   $maintenance->user_id=Auth::user()->id;
		   $maintenance->phc_id=session('phc_id');
		   $maintenance->picture=$path;
		   $maintenance->approval=$approval;
		   $maintenance->attended=0;
		   $maintenance->resolved=0;
		   if($maintenance->save())
		   {
			   return redirect()->route('dashboard')->with('success','Schedule created successfully');
		   }
		   
		 }
		  public function viewMaintenanceSchedule()
		  {
			  $url=url()->current();
		
		     $tmp = explode('=', $url);
		     $all = end($tmp);
			 if($all==0)
			 {
			  $maintenances=Maintenance::Where('phc_id',session('phc_id'))->get();
			 }
			 else if($all==1)
			 {
				  $maintenances=Maintenance::all();
			 }
			  return view('view-maintenance-schedule')->with('maintenances',$maintenances);
		  }
		public function add_refferal(Request $request)
		{
			 $this->validate($request,[
            'uid'=>'required',
            'desc'=>'required',
            'refer_to'=>'required',
           ]);
		 $patient=Patient::Where('username',$request->uid)->get();
		 if(count($patient)>0)
	     {
		   foreach($patient as $pat)
		   {
		   $id=$pat->id;
		   $referral=new Referral();
		   $referral->patient_id=$id;
		   $referral->situation=$request->desc;
		   $referral->referred_to=$request->refer_to;
		   $referral->user_id=Auth::user()->id;
		   $referral->phc_id=session('phc_id');
		   if($referral->save())
		    {
				
			  return view('generate-card')->with(['success'=>'Patient registered successfully',
													'card_type'=>'referal',]);
			   //return redirect()->route('dashboard')->with('success','Referral details Saved successfully');
		    }
		   }
		 }
		   else
		   {
			   return redirect()->route('dashboard')->with('error','Referral not Saved. Patient does not exist');
		   }
		   
		   
		   }
			
		
		public function  viewReferral()
		{
			$url=url()->current();
		
		     $tmp = explode('=', $url);
		     $all = end($tmp);
			 if($all==0)
			 {
			  $referrals=Referral::Where('phc_id',session('phc_id'))->get();
			 }
			 else if($all==1)
			 {
				  $referrals=Referral::all();
			 }
			  return view('view-refferal')->with('referrals',$referrals);
			
		}
}