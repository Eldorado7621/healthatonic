<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Phc;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'    =>  'required',
            'phnNo'     =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'name'        =>  $request->name,
            'phnNo'         =>  $request->phnNo
        );

        Patient::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $Patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $Patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $Patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
            $data = Patient::findOrFail($id);
            return response()->json(['result' => $data]);
       
    }
	 public function nas()
    {
       
            $data = Patient::findOrFail(7);
            return response()->json(['result' => $data]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $Patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
       return response()->json(['success' => 'Data is successfully updated']);
		
       /* $form_data = array(
            'name'    =>  $request->name,
            'phnNo'     =>  $request->phnNo,
			'email'=>"hh",
		    'sex'=>"1",
		    'address'=>"kkkk",
        );

        Patient::whereId(3)->update($form_data);*/

        return response()->json(['success' => 'Data is successfully updated']);
		
		

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $Patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Patient::findOrFail($id);
        $data->delete();
    }
}

