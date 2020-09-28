@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
@section('content')
@if (session('success'))
			<div class="row" >
			<div class="col-md-12">
			<div class="box-body">
			 <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
               <h4> Done!!!{{session('success')}}</h4>
              </div>
              </div>
              </div>
              </div>
			@endif
    <div class="header pb-8 pt-5 pt-md-12" style="background-color:#faeeda;">
    <div class="container">
	
        <div class="row mt-5">
            <div class="col-xl-12 mb-8 mb-xl-0">
                <div class="card 
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Medicine Store (no of drugs)</h3>
								
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
                <div class="table-responsive" >  
                     <table class="table align-items-center table-flush table-striped id="employee_table">  
					 <thead class="thead-light">
                          <tr>  
                              
                               <th width="15%">Name</th> 
                               <th width="5%">Stock</th>  
                               <th width="5%">Purchase Price</th>  
                               <th width="5%">Sales Price</th>  
                               <th width="5%">Quantity</th>  
                               <th width="10%">Exp Date</th>  
                               <th width="30%">Options</th>  
                          </tr>  
					 </thead>
					
                       <tbody>
							 
							@foreach($medicines as $medicine)
                                <tr>
                                    
                                    <td>{{$medicine->name}}</td>
                                    <td>{{$medicine->qtty}}</td>
                                    <td>{{$medicine->purchase}}</td>
                                    <td>{{$medicine->sales}}</td>
                                    <td>{{$medicine->qtty}}</td>
                                    <td>{{$medicine->expire}}</td>
                                    <td>
                                       <a href="javascript:;" data-toggle="modal" data-target="#m{{$medicine->id}}" class="btn btn-sm btn-primary"> <i class="fas fa-edit  mr-3"></i>Edit</a>
									   
                                       <a href="javascript:;" data-toggle="modal" data-target="#ld{{$medicine->id}}"  class="btn btn-sm btn-default"> <i class="fas fa-info-circle  mr-3"></i>Load</a>
                                       <a href="javascript:;" data-toggle="modal" data-target="#md{{$medicine->id}}"  class="btn btn-sm btn-danger"> <i class="fas fa-trash  mr-3"></i>Delete</a>
                                    </td>
                                </tr>
							 @include('layouts.modals.edit-medicine')
							 @include('layouts.modals.load-medicine')
							 @include('layouts.modals.delete-medicine')
							@endforeach
                            </tbody>
					
                     </table>  
                </div>  
         
                </div>
            </div>
           
        </div>
    </div>
</div>
  

  
@endsection
<script>

$(document).ready(function(){
 var count = 1;
 $('#dynamic_lm').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'{{ route("postLoadMedicine") }}',
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