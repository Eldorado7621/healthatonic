@extends('layouts.app')

@section('content')
    <div class="header pb-8 pt-5 pt-md-8 col-xl-12" style="background-color:#faeeda;">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row col-xl-12">
                <div class="card bg-gradient-default">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="text-light ls-1 mb-1 text-white">Health Record</h2>
								 @foreach($patient as $pat)
                                <p class="text-white" style="margin-bottom:2px;margin-top:10px;">Patient: {{$pat->name}}</p>
                                <p class="text-white" style="margin-bottom:2px;">Address: {{$pat->address}}</p>
                                <p class="text-white" style="margin-bottom:2px;">Blood Group:</p>
						        
						       @endforeach
                            </div>
                           
                        </div>
                    </div>
			
                    <div class="card-body text-white">
					 <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">  S/N</th>
                                    <th scope="col">  Diagnosis</th>
                                    <th scope="col">Medication</th>
                                    <th scope="col">Attended By</th>
                                    <th scope="col">No of Threads</th>
                                    <th scope="col"> Date</th>
                                    <th scope="col"> Options</th>
                                </tr>
                            </thead>
                            <tbody>
							<input type="hidden" name="count" value="{{$count=1}}"/>
									@foreach($patient_record as $history)
                                <tr>
									<td>{{$count++}}</td>
                                    <th scope="row">
									{{substr($history->condition,0,20)}}
                                    </th>
                                    <td>
									{{substr($history->prescription,0,20)}}
                                    </td>
									<td>
									  {{$history->doc_name}}
                                    </td>
									<td><a href="javascript:;" data-toggle="modal" data-target="#t{{$history->id}}"> 
									   <span style="background-color:yellow;color:black;padding:5px;margin-left:15px;">{{$history->no_of_threads}}</span>
									</a>
                                    </td>
                                    <td>
                                       {{date_format($history->created_at,'d-M-Y')}}
                                    </td>
                                    <td>
                                        @if(Auth::user()->id==$history->doctor_id)
									   <a class="btn btn-primary" href="javascript:;" data-toggle="modal" data-target="#e{{$history->id}}" style="color:white;padding:5px;"> <i class="fas fa-edit  mr-3"></i>Edit</a>
                                      @include('layouts.modals.edit-patient-history')
									  @else
										<a class="btn btn-success"href="javascript:;" data-toggle="modal" data-target="#h{{$history->id}}" style="color:white;padding:5px;"> <i class="fas fa-eye  mr-3"></i>View</a>
                                      	@include('layouts.modals.view-patient-history')
									  @endif
                                    </td>
                                </tr>
							
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
</div>
  <div class="container-fluid mt--7">
      
       

        @include('layouts.footers.auth')
    </div>
@endsection
