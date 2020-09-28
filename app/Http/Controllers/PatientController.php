<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Patient;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Phc;
use App\Birth;
use App\Thread;
use App\Diagnose;
use App\Antenatal;
use DB;
use PDF;
use DataTables;
use Validator;
use App\Followup;

class PatientController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth');
    }
	    public function index(Request $request)
    {
        if($request->ajax())
        {
            $phc=session('phc_id');
            $data =Phc::find($phc)->patients()->get();
            return DataTables::of($data)
                      ->addColumn('action', function($data){
					    $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="fas fa-edit  mr-3"></i>Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a href="history+'.$data->name.'='.$data->id.'"  class="btn btn-sm btn-success"> <i class="fas fa-clock mr-3"></i>History</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a href="diagnose='.$data->username.'"  class="btn btn-sm btn-default"> <i class="fas fa-clock mr-3"></i>Consult</a>';
                       return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('view-patient');
    }
    
	public function pat_reg(Request $request)
	{
		
		 $this->validate($request, [
            'sur_name' => 'required',
            'first_name' => 'required',
            'social_media' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'dob' => 'required',
           ]);
		$username=$request->sur_name.''.rand(1000,5555).''.rand(5556,9999);
		$social_media=0;
		if($request->social_media>=2&&$request->email!="")
		{
			$social_media=1;
		}
		else
		{
			$social_media=0;
		}
		$patient=new Patient();
		$phc=session('phc_id');
		$patient->name=$request->sur_name.' '.$request->first_name;
		$patient->sex=$request->sex;
		$patient->email=$request->email;
		$patient->address=$request->address;
		$patient->phnNo=$request->phnNo;
		$patient->dob=$request->dob;
		$patient->social_media=$social_media;
		$patient->username=$username;
		
		if($patient->save()){
			$patient->phcs()->attach($phc);
			$pats_no=session('no_of_patients')+1;
			$request->session()->put('no_of_patients',$pats_no);
			return view('generate-card')->with(['success'=>'Patient registered successfully',
													'card_type','id_card']);
			//return redirect()->route('home')->with('success', 'Data created successfully');
		 
		}
	}
	public function saveReport(Request $request)
	{
		 $this->validate($request, [
            'report' => 'required',
           ]);
		/* $followup=new Followup();
		$followup->note=$request->report;
		$followup->diagnose_id=$request->diagnose_id;
		$followup->phc_id=session('phc_id');
		$followup->view=0;
		if($followup->save()){
			Diagnose::where('id', $request->diagnose_id)
			->update([
					'follow_up'=>1,
					]);
		}*/
					
			Diagnose::where('id', $request->diagnose_id)
			->update([
					'follow_up'=>1,
					'note'=>$request->report,
					]);		
		  return redirect()->route('follow_up')->with('success','Report saved successfully');
		
		
		
	}
	public function follow_up()
	{
		$phc=session('phc_id');
		$follow_up=Diagnose::where(['phc_id'=>$phc,'follow_up'=>0])
				->get(); 
		return view('follow-up')->with(['follow_up'=>$follow_up,]);
	}
	public function viewFollowupReport()
	{
		$phc=session('phc_id');
		$follow_up=Diagnose::where(['phc_id'=>$phc,'attended'=>0])->get(); 
		return view('view-report')->with(['follow_up'=>$follow_up,]);
	}
	public function edit($id)
    {
       
            $data = Patient::findOrFail($id);
            return response()->json(['result' => $data]);
       
    }
	public function patRec(Request $request)
	{
		//dd($request->phc);
		 $this->validate($request, [
          
            'id' => 'required',
           ]);
		   
		 $patient=Patient::where('username',$request->id)->get();
		// dd($patient);
		 return view('view-pat')->with(['patient'=>$patient,'i'=>1
												]);
	}
	public function postPatientEdit(Request $request)
	{
		$name=$request->name;
		$phnNo=$request->phnNo;
		$email=$request->email;
		
		$address=$request->address;
		
		Patient::where('id', $request->patid)
			->update([
					'name'=>$name,
					'phnNo'=>$phnNo,
					
					'email'=>$email,
					'address'=>$address,
					]);
		//return redirect()->route('dashboard')->with('success', 'Data created successfully');
		return response()->json(['success' => 'Data is successfully updated']);
	}
	
	public function getAllPatients()
	{
		$phc=session('phc_id');
		
		$patients=Phc::find($phc)->patients()->get();
		return view('view-patient')->with(['patient'=>$patients,
											'i'=>1
												]);
	
	}
	public function getPrescForm()
	{
		$url=url()->current();
		
		$tmp = explode('=', $url);
		$pat_uid = end($tmp);
	
		
		
		$patient=Patient::where('username', $pat_uid)->get();
		if(count($patient)!=0)
		{
		foreach($patient as $pat)
		{
		$pat_id=$pat->id;
		$patient_record=Diagnose::where('patient_id', $pat_id)->get();
		return view ('diagnose')->with(['patient'=>$patient,'patient_record'=>$patient_record]);
		}
		}
		else
		{
		return redirect()->route('viewAllRec')->with('message','No Patient data found');
		}
	}
	
	
	public function postPatientDiagnose(Request $request)
	{
		 $this->validate($request, [
            'diagnose' => 'required',
            'prescription' => 'required',
           ]);
		  $diagnose=new Diagnose();
		  $diagnose->condition=$request->diagnose;
		  $diagnose->prescription=$request->prescription;
		  $diagnose->doctor_id=Auth::user()->id;
		  $diagnose->phc_id=session('phc_id');
		  $diagnose->doc_name=Auth::user()->name;
		  $diagnose->follow_up=0;
		  $diagnose->patient_id=$request->patient;
		  
		  if($diagnose->save()){
			$no_of_monthly_patient=session('no_of_monthly_patient')+1;
			$request->session()->put('no_of_monthly_patient',$no_of_monthly_patient);
			return redirect()->route('home')->with('success', 'Data created successfully');
		 
		}
		
	}
	public function getPatHistory()
	{
		$url=url()->current();
		
		$tmp = explode('=', $url);
		$pat_id = end($tmp);
		$patient_record=Diagnose::where('patient_id', $pat_id)->get();
		//$patient_record=Diagnose::find($pat_id);
		/*foreach($patient_record as $pat){
		dd($pat->threads);
		}*/
		$patient=Patient::where('id', $pat_id)->get();
		return view ('patient-history')->with(['patient_record'=>$patient_record,
											'patient'=>$patient,]);
	}

	public function postThread(Request $request)
	{
		$this->validate($request, [
            'cond' => 'required',
            'pres' => 'required',
           ]);
		   $thread_no=$request->thread;
		 Diagnose::where('id', $request->id)
			->update([
					'condition'=>$request->cond,
					'prescription'=>$request->pres,
					'threads'=>$thread_no++,
					
					]);
		  $thread=new Thread();
		  $thread->condition=$request->cond1;
		  $thread->prescription=$request->pres1;
		  $id=$request->id;
		  if ($thread->save()) {
			//dd('shere');
			$thread->diagnoses()->attach($id);
			return redirect()->route('needs')->with('success', 'Data created successfully');
			
		 
		  }
		 
	}

	public function birthReg(Request $request)
	{
		$this->validate($request, [
            'father' => 'required',
            'mother' => 'required',
            'sex' => 'required',
            'weight' => 'required',
            'dob' => 'required',
           ]);
		$dob=$request->day.'-'.$request->month.'-'.$request->year;
		$birth=new Birth();
		$birth->phc=session('phc_id');
		$birth->father=$request->father;
		$birth->mother=$request->mother;
		$birth->sex=$request->sex;
		$birth->weight=$request->weight;
		$birth->dob=$request->dob;
		 if ($birth->save()) {
			$births_no=session('no_of_births')+1;
			$request->session()->put('no_of_births',$births_no);
			return redirect()->route('home')->with('success', 'Data created successfully');
			
		 
		  }
	}

	 public function viewBirthReg()
	 {
		 
		$birth_rec=Birth::where('phc', session('phc_id'))->paginate();
		return view ('view-birth')->with(['birth_rec'=>$birth_rec,]);
	 }

    public function editBirthRec(Request $request)
	{
		
		Birth::where('id', $request->id)
			->update([
					'father'=>$request->father,
					'mother'=>$request->mother,
					'sex'=>$request->sex,
					'weight'=>$request->weight,
					'dob'=>$request->dob,
					]);
		return redirect()->route('home')->with('success', 'Data created successfully');
		
	}

    public function antenatalReg(Request $request)
	{
		 $this->validate($request, [
            'uid' => 'required',
            'week' => 'required',
            'delivery' => 'required',
            'dob' => 'required',
            'prev_birth' => 'required',
            
           ]);
		   
		   //registered by =user_id
		   $pat_id=Patient::where('username',$request->uid)->get();
		   foreach($pat_id as $id)
		   {
			   $pat_id=$id->id;
			     
		   }
		
		  $antenatal=new Antenatal();
		  $antenatal->phc=session('phc_id');
		  $antenatal->patient_id=$pat_id;
		  $antenatal->weeks=$request->week;
		  $antenatal->expected_delivery=$request->delivery;
		  $antenatal->dob=$request->dob;
		  $antenatal->pre_birth=$request->prev_birth;
		  $antenatal->active=1;
		  $antenatal->re_enroll=0;
		  $antenatal->user_id=Auth::user()->id;
		  
		  if($antenatal->save()){
			return redirect()->route('dashboard')->with('success', 'Data created successfully');
		 
		}
	}

	public function viewAntenatalRec(Request $request)
	{
		$this->validate($request, [
            'phc' => 'required',
           ]);
		 $phc=$request->phc;
		 $view=$request->view;
		
		if($view=="all")
		{
			$antenatals=Antenatal::where('phc',$phc);
		}
		else if($view=="active")
		{
			$antenatals=Antenatal::where(['active'=>1,'phc'=>$phc]);
		}
		//dd($antenatals);
		return view('view-antenatal')->with('antenatals',$antenatals);
	}
	public function viewAllRec()
	{
		// all antenatal records
		
		$phc = session('phc_id');
		$antenatals=Antenatal::where('phc',$phc)->paginate(10);
		return view('view-antenatal')->with('antenatals',$antenatals);
	}
	public function viewActiveRec()
	{
		$phc = session('phc_id');
		$antenatals=Antenatal::where(['active'=>1,'phc'=>$phc])->get();
		return view('view-antenatal')->with('antenatals',$antenatals);
	}
	public function  reEnroll()
	{
		$url=url()->current();
		$tmp = explode('=', $url);
		$code = end($tmp);
		$tmp=explode('+', $url);
		$id=end($tmp);
		//$id=1=>reEnroll while 2 indicates delivered
		if($code==1)
		{
			
		Antenatal::where('id', $id)
			->update([
					'active'=>1,
					]);
		$message="Succesfully Re-enrolled";
		}
		else if($code==2)
		{
			
		Antenatal::where('id', $id)
			->update([
					'active'=>0,
					]);
		$message="Delivery Succesful";
		}
		return redirect()->route('viewActiveRec')->with('success', $message);
	}
	
	 public function getSchedulePatients()
	 {
		 
		    $phc=session('phc_id');
		  $antenatals=Antenatal::where(['active'=>1,'phc'=>$phc])->get();
		return view('schedule')->with('antenatals',$antenatals);
	 }
		
	 public function postSchedule(Request $request)
	 {
		 $emails=array();
		 $message="";
		 $error="";
		 if($request->selected=="all")
		 {
		 $emails=$request->emails;
		 $message='Email copied successfully.';
		
		}
		elseif($request->selected=="selected")
		{
			if(!$request->schedule)
			{
		     $message="No email selected. Please select at least one email address.";
		     $error="No email selected. Please select at least one email address.";
			 }
		   else
		  {
			  	 
				 for($count=0;$count<count($request->schedule);$count++)
				 {
					$emails[$count]=$request->schedule[$count].",";
				 }
				  $message='Email copied successfully.';
				  
			
		  }
		}
		 return response()->json([
		'emails'=>$emails,
        'success'  => $message,
		'error'=>$error
       ]);
		
		 
	 }
	 public function  generate_card()
	 {
		 $data=[];
		// return view('patient-card', $data);
		$url=url()->current();
		$tmp = explode('=', $url);
		$card_type = end($tmp);
		if($card_type=="id_card")
		{
		 $pdf = PDF::loadView('patient-card', $data)->setPaper('a5', 'portrait')->setWarnings(false)->save('myfile.pdf');
		}
		elseif($card_type=="referal")
		{
		  $pdf = PDF::loadView('referal-form-pdf', $data)->setPaper('a5', 'portrait')->setWarnings(false)->save('myfile.pdf');
		
		}
         return $pdf->stream();
	 }
	 public function smsSchedule(Request $request)
	 {
	 Http::post('https://www.bulksmsnigeria.com/api/v1/sms/create', [
    'api_token' => 'l0nAlKRb6unAk1I3hMC1lJLIXc2jYlzxm03q6bc9jsRxgUJ7WsJCKwgeBUrz',
    'from' => 'Network Administrator',
    'to' => '08035296623,07065280045,08069141085,08104981994',
    'body' => 'Come and claim your money at our office or we come to aliyu modibo street',
    'dnd' => '2',
    ]);
	 }
	  public function postSmsSchedule(Request $request)
	  {
		  //dd($request->body);
		  $this->validate($request, [
            'body' => 'required|max:140',
           ]);
		  $message="";
		  $error="";
		  if(!$request->schedule||!$request->body)
			{
		    
		     $error="No name was selected or message body was empty. Please select at least one Patient to send message.";
			 }
		   else
		  {
				
			  	 $phnNos="";
				 for($count=0;$count<count($request->schedule);$count++)
				 {
					$phnNos[$count]=$request->schedule[$count].",";
				 }
				 $body=$request->body;
				 $from=session('phc_name');
				 if(Http::post('https://www.bulksmsnigeria.com/api/v1/sms/create', [
                   'api_token' => 'l0nAlKRb6unAk1I3hMC1lJLIXc2jYlzxm03q6bc9jsRxgUJ7WsJCKwgeBUrz',
                   'from' => $from,
                   'to' => $phnNos,
                   'body' => $body,
                   'dnd' => '2',
                    ]))
	               {
					   
					    $message='Message sent successfully.';
				   }
				 
				  
			
		  }
		  return response()->json([
		
        'success'  => $message,
		'error'=>$error
       ]);
	  }
	 public function getSmsSchedulePatients()
	 {
		 
		  $phc=session('phc_id');
		  $antenatals=Antenatal::where(['active'=>1,'phc'=>$phc])->get();
		return view('sms-schedule')->with('antenatals',$antenatals);
	 }
	
	public function search(Request $request)
	 {
		 $query=$request->search;
				
		$patients = DB::table('patients')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('username', 'like', '%'.$query.'%')
         ->paginate(10);
		  return view('view-patient')->with(['patient'=>$patients,
											'i'=>1
												]);
	 }
	 public function search_antenatal(Request $request)
     {
		 $query=$request->search;
				
		$antenatals = DB::table('antenatals')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orWhere('phnNo', 'like', '%'.$query.'%')
         ->orWhere('expected_delivery', 'like', '%'.$query.'%')
         ->paginate(10);
		  return view('view-antenatal')->with(['antenatals'=>$antenatals,
											'i'=>1
												]);
	 }
	  public function search_birth(Request $request)
	   {
		  
		 $query=$request->search;
		
		$births = DB::table('births')
         ->where('father', 'like', '%'.$query.'%')
         ->orWhere('mother', 'like', '%'.$query.'%')
         ->orWhere('dob', 'like', '%'.$query.'%')
         ->paginate(10);
		  return view('view-birth')->with(['birth_rec'=>$births,
											'i'=>1
												]);
	 }

}

?>