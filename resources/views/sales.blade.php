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
            <div class="row">
			 <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    
                    <div class="card-body ">
					  <div class="col-xl-4 " style="float:left;">
                    <div align="center">  
                     <input type="text" name="search" id="search" placeholder="search"class="form-control" />  
                </div>  
				<div class="table-responsive" >  
                     <table class="table table-bordered" id="employee_table">  
                          <tr style="margin-bottom:10px;"> 
                               <th style="margin-bottom:10px;"><span class="text-white">Medicine List</span></th> 
                          </tr>  
						  
						  @foreach($medicines as $medicine)
                           <tr>  <td onclick="ono('item{{$id}}');"><span class="text-white">{{$medicine->name}}</span>
							<input type="hidden" name="name[]" id="item{{$id}}_name" value="{{$medicine->name}}"/>
							<input type="hidden" name="price[]" id="item{{$id++}}_price" value="{{$medicine->sales}}"/></td>
						   </tr>  
						   @endforeach
						 
                        </table>  
               
                </div>
                </div>
					<div class="col-xl-8" style="float:right;">
				<div class="">
                <form method="post" action="{{ route('save-sales.insert') }}">
				@csrf
                 <span id="result"></span>
                 <table class="table table-bordered table-striped" id="user_table">
				  <thead>
                   <tr>
                    <th width="50%"style="color:white">Name</th>
                    <th width="15%" style="color:white">Price </th>
                    <th width="15%" style="color:white">Quantity</th>
                    <th width="15%" style="color:white">Total</th>
                  </tr>
               </thead>
					<tbody class="tt">

					</tbody>
               <tfoot>
                <tr>
                 <td colspan="3" align="right" class="text-white">GRAND TOTAL</td>
                 <td ><input type="number" name="g_total" id="g_total" value="" style="width:60px;" readonly /></td>
                 <td>
                 
                  <input type="submit" name="save" id="save" class="btn btn-success"   value="Save"  />
                 </td>
                </tr>
               </tfoot>
			   
           </table>
                </form>
				 <button name="g_total_btn" id="g_total_btn" class="btn btn-primary" onclick="calcTotal();"> Calc</button>
   </div>
                </div>
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