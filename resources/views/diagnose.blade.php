@extends('layouts.app')

@section('content')
    <div class="header pb-8 pt-5 pt-md-8" style="background-color:#faeeda;">
    <div class="container">
        <div class="row mt-15">
            <div class="col-xl-7 mb-5 mb-xl-0">
				<form method="post" action="{{route('postPatientDiagnose')}}">
                 <div class="card shadow">
                    <div class="card-header">
                       <div class="row " style="height:20px;">
                           <label style="float:left;font-size:14px;">Date: {{date("d/m/Y")}}</label>&emsp;&emsp;
						   @foreach($patient as $pat)
                           <h4 style="float:left;font-size:14px;" style="float:right;margin-right:0px;">Patient: {{$pat->name}}
						   &emsp; Doctor: {{Auth::user()->title}} {{Auth::user()->name}}
						   </h4>
						   <input type="hidden" name="patient" value="{{$pat->id}}"/>
						   @endforeach
                           
                     </div>
			           
	                @csrf
                    </div>
                    <div style="padding:10px;">
					<div class="form-group{{ $errors->has('diagnose') ? ' has-danger' : '' }}">
					 <h4>Diagnosis:</h4>
			        
			          <textarea rows="5" placeholder="Type diagnose here" class="form-control" name="diagnose">
					  </textarea>
                  
			      @if ($errors->has('diagnose'))
                   <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('diagnose') }}</strong>
                    </span>
                   @endif
               </div>
			   <div class="form-group{{ $errors->has('Prescription') ? ' has-danger' : '' }}">
					 <h4>Prescription:</h4>
			          <textarea rows="5" placeholder="Type prescription here" class="form-control" name="prescription">
					  </textarea>
			      @if ($errors->has('Prescription'))
                   <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('Prescription') }}</strong>
                    </span>
                   @endif
               </div>
					 <input type="submit" class="btn" value="OK" style="background-color:#fba91d;color:#19204d;"/>
					
						
					</div>
                 </div>
			    </form>	
            </div>
            <div class="col-xl-5">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Health Record</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th  width="10%">Diagnosis</th>
                                    <th  width="10%">Medication</th>
                                    <th  width="2%">Thread</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($patient_record as $history)
                                <tr>
									
                                    <td>
									<a href="javascript:;" data-toggle="modal" data-target="#h{{$history->id}}" style="color:blue;">
									  {{substr($history->condition,0,100)}}
									</a>
                                    </td>
                                    <td>
									{{substr($history->prescription,0,100)}}
                                    </td>
									<td><a href="javascript:;" data-toggle="modal" data-target="#t{{$history->id}}"> 
									   <span style="background-color:yellow;color:black;padding:5px;margin-left:15px;">{{$history->no_of_threads}}</span>
									</a>
                                    </td>
                                   
                                </tr>
								@include('layouts.modals.view-patient-history')
								@include('layouts.modals.view-thread')
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  

  <div class="container-fluid mt--7">
      
       

        @include('layouts.footers.auth')
    </div>
@endsection
