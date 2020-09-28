@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
@section('content')
    <div class="header pb-8 pt-5 pt-md-8" style="background-color:#faeeda;">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
		@if($success ?? '')
			 <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
               <h4> Done!!!{{$success ?? ''}}</h4>
              </div>
			@endif
            <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Follow Up</h3>
                            </div>
                              <div class="form-group mb-0 navbar-search navbar-search-white form-inline mr-3 d-none d-md-flex ml-lg-auto">
                                <div class="input-group input-group-alternative">
                                 <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="fas fa-search"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="Search" type="text" name="search"  id="search" >
                                </div>
                               </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                         <table class="table-flush table-striped " id="employee_table"> 
							 <thead class="thead-light">
                                <tr>
                                    <th width="5%"></th>
                                    <th width="15%">Name</th>
                                    <th width="10%">ID</th>
									 <th width="15%">Phone Number</th>
									 <th width="20%">Condition</th>
									 <th width="10%">Prescription</th>
									 <th width="20%">Note</th>
                                    <th width="15%">OPTIONS</th>
                                </tr>
								
                            </thead>
                            <tbody>
							
							@foreach($follow_up as $pat)
                                <tr>
									<td>
									@if($pat->attended==0)
									  <input type="text" style="width:20px;background-color:yellow;color:black;;border:1px solid grey;border-radius:5px;" value="U" readonly />
									@endif
									
									</td>
                                    <td>
									{{$pat->patient['name']}}
                                    </td>
                                    <td>
									{{$pat->patient['username']}}
                                    </td>
									 <td>
									{{$pat->patient['phnNo']}}
                                    </td>
									<td>
									
									 {{substr($pat->condition,0,30)}}
									 </td>
									<td>
									 {{substr($pat->prescription,0,30)}}
                                    </td>
									<td>
									 {{substr($pat->note,0,30)}}
                                    </td>
                                    <td>
									  <a href="javascript:;" data-toggle="modal" data-target="#fp{{$pat->id}}" class="btn btn-sm btn-primary"> <i class="fas fa-edit  mr-3"></i>Details</a>
                                    </td>
                                </tr>
							  @include('layouts.modals.follow-up')
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
  

  <div class="container-fluid mt--7 text-white">
        @include('layouts.footers.auth')
    </div>
@endsection
<script>  
  var count = 0;
  var count2 = 0;
  function subgo()
  {
	  event.preventDefault();
        $.ajax({
            url:'{{ route("save-sales.insert") }}',
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
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                }
                else
                {
                    dynamic_field(1);
                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                }
                $('#save').attr('disabled', false);
            }
        });
  }
  function ono(id)
{
	count=count+1;
	var ele=document.getElementById(id);
	//window.alert(id);
	var name=document.getElementById(id+"_name").value;
	var price=document.getElementById(id+"_price").value;
	//window.alert(count);
	html = '<tr>';
        html += '<td><input type="text" name="name[]" value="'+name+'"  style="width:100px;" readonly /></td></br>';
        html += '<td><input type="text" name="price[]" value="'+price+'" id="price'+count+'" readonly style="width:60px;" /></td>';
        html += '<td><input type="number" name="qtty[]" value="1" style="width:60px;" id="qtty'+count+'" onkeyup="calc('+count+')" /></td>';
        html += '<td><input type="number" name="total[]" id="total'+count+'" value="'+price+'" style="width:60px;"  /></td>';
		 html += '<td><button  name="remove" id="" value="Remove" class="btn btn-danger remove">Remove</button></td></tr>';
            $('.tt').append(html);
				
}
function calc(id)
{
	price=document.getElementById("price"+id).value;
	qtty=document.getElementById("qtty"+id).value;
	document.getElementById("total"+id).value=price*qtty;
	
}
function calcTotal()
{
	//window.alert(count);
	var i;
	var g_total=0;
	for(i=1;i<=count;i++)
	{
		g_total=parseInt(g_total,10)+parseInt(document.getElementById("total"+i).value,10);
	}
	document.getElementById("g_total").value=g_total;
}

      $(document).ready(function(){  
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#employee_table tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }
	
 $(document).on('click', '.remove', function(){
  count--;
  $(this).closest("tr").remove();
 });

 $('#dynamic_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'{{ route("save-sales.insert") }}',
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
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                }
                else
                {
                    dynamic_field(1);
                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                }
                $('#save').attr('disabled', false);
            }
        })
 });

		   
      });  
 </script>