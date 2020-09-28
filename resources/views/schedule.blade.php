@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
@section('content')
    <div class="header pb-8 pt-5 pt-md-8" style="background-color:#faeeda;">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
		
            <div class="row">
			 <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                     <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="text-white mb-0">Create Maternity Schedule(via email)</h2>
                            </div>
                        </div>
						<div id="result"></div>
                    </div>
			
                   	 <div class="card-body ">
				 <div class="col-xl-6" style="float:left;">
			      @csrf
				  <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">SELECT PATIENT</h3>
                            </div>
                            <form method="post" class="dynamic_form">
							@csrf
							@foreach($antenatals as $antenatal)
							 <input type="hidden" name="emails[]" value="{{$antenatal->patient->email}}," />
						 	@endforeach
							 <input type="hidden" name="selected" value="all" />
							<input type="submit" class="btn value="Select All" style="background-color:#19204d;color:#fff;"/>
						   </form>
						  
                        </div>
						
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
					<form method="post" class="dynamic_form">
					@csrf
					   <input type="hidden" name="selected" value="selected" />
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%"></th>
                                    <th width="50%">Name</th>
                                   
                                </tr>
                            </thead>
							
			
                            <tbody>
							
							@foreach($antenatals as $antenatal)
                                <tr>
                                    <td>
									  <input type="checkbox" name="schedule[]" value="{{$antenatal->patient->email}}"/>
                                    </td>
                                    <td >
									{{$antenatal->patient->name}}
                                    </td>
                                </tr>
							@endforeach
							
                            </tbody>
						
							
                        </table>
						<input type="submit" class="btn " value="OK" style="background-color:#fba91d;color:#fff;margin-left:10px;"/>
						</form>
						
                    </div>
                 </div>
				 
				<!--button class="btn btn-primary" onclick="copy()">
					Copy
				</button--></br>
				<a href="https://calendar.google.com/calendar/r" target="_blank"class="btn btn-success">Open Calendar</a>
			</div>
			<div class="col-xl-6" id="ttt" style="float:right;">
			
			</div>
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
<script>
$(document).ready(function(){

 var count = 1;
 $('.dynamic_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'{{ route("postSchedule") }}',
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
                $('#save').attr('disabled','disabled');
            },
            success:function(data)
            {
                if(data.error)
                {
                    
                    $('#result').html('<div class="alert alert-danger">'+data.error+'</div>');
                }
                else
                {
                                  
                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
					var email = '';
					 for(var count = 0; count < data.emails.length; count++)
                    {
                        email += data.emails[count];
                    }
					  $('#ttt').html('<textarea class="form-control" id="tt" rows="10" colspan="2">'+email+'</textarea>');
					  var textarea = document.getElementById("tt");
						textarea.select();
						document.execCommand("copy");
					
                }
                $('#save').attr('disabled', false);
            }
        })
 });

});
</script>