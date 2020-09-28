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
    <div class="container-fluid">
	
        <div class="row mt-5">
            <div class="col-xl-12 mb-8 mb-xl-0">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Maintenance</h3>
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
                          <table class="table align-items-center table-flush table-stripedtext-center" id="employee_table"> 
							 <thead class="thead-light">
                                <tr>
                                    <th width="15%">Item</th>
                                    <th width="5%">Description</th>
                                    <th width="5%">Date</th>
                                    <th width="10%">Attended</th>
                                    <th width="5%">Resolved </th>
                                    <th width="20%">OPTIONS</th>
                                </tr>
								
                            </thead>
                            <tbody>
							<input type="hidden" value="{{$i=1}}"/>
							@foreach($maintenances as $maintenance)
                                <tr>
                                    <td>
									{{$maintenance->item}}
                                    </td>
                                    <td>
									{{$maintenance->description}}
                                    </td>
									<td>
								   {{date_format($maintenance->created_at,'d-M-Y')}}
                                    </td>
									<td class="text-center">
									 @if($maintenance->attended==0)
									 <span style="background-color:red;color:white;border-radius:40%;padding:3px;text-align:center;">&times;</span>
									 @else
									 <span style="background-color:green;color:white;border-radius:40%;padding:3px;text-align:center;">&#10003;</span> 
								     @endif
                                    </td>
									 <td class="text-center">
									  @if($maintenance->resolved==0)
									 <span style="background-color:red;color:white;border-radius:40%;padding:3px;text-align:center;">&times;</span>
									 @else
									 <span style="background-color:green;color:white;border-radius:40%;padding:3px;text-align:center;">&#10003;</span> 
								     @endif
                                    </td>
									
                                    <td>
										 <a  class="btn btn-sm" href="" style="background-color:#19204d;color:white;">
										 
											Delivered
										</a>
                                    </td>
                                </tr>
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
 <script>  
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
		   
      });  
 </script>