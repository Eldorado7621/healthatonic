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
                               
                                <h2 class="text-white mb-0">Create Antenatal Schedule(SMS)</h2>
                            </div>
							
                           
                        </div>
						<div id="result"></div>
                    </div>
				<form method="post" id="dynamic_form">
				@csrf
				 <div class="card-body ">
				   <div class="col-xl-6"  style="float:left;">
				   	  <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Antenatal Records at a Glance</h3>
                            </div>
							<input type="checkbox" id="select-all">
                             <h3 for="schedule" style="margin-bottom:2px;padding-left:5px;">Select All</h3>
                        </div>
                    </div>
                    <div class="table-responsive">
					    <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th ></th>
                                    <th >Name</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
							
							@foreach($antenatals as $antenatal)
                                <tr>
                                    <td>
									  <input type="checkbox" name="schedule[]" value="{{$antenatal->patient->phnNo}}"/>
                                    </td>
                                    <td>
									{{$antenatal->patient->name}}
                                    </td>
                                </tr>
							@endforeach
							
                            </tbody>
                        </table>
						<p onclick="vf();" style="width:50px;background-color:#fba91d;padding:5px;margin-left:10px;border-radius:5px;border: 1px solid grey;color:white;" class="text-center"> OK</p>
						
                    </div>
                 </div>
			 </div>
				
					<div class="col-xl-6" id="body_col" style="float:right;">
			
					</div>
			    </div>
                </form>
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
function vf()
{
	
	$('#body_col').html('<p class="text-white">Compose Message(*maximum: 140 characters)</p>');
	$('#body_col').append('<textarea class="form-control" rows="10" colspan="2" name="body"></textarea>');
	$('#body_col').append('<input type="submit"  class="btn " value="SEND" style="float:right;background-color:#fba91d;color:#fff;margin-left:10px;margin-top:10px;" />');
					 
}
$(document).ready(function(){
document.getElementById('select-all').onclick = function() {
  var checkboxes = document.getElementsByName('schedule[]');
  for (var checkbox of checkboxes) {
    checkbox.checked = this.checked;
  }
  
}

 var count = 1;
 $('#dynamic_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'{{ route("postSmsSchedule") }}',
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
					
					
                }
                $('#save').attr('disabled', false);
            }
        })
 });

});
</script>