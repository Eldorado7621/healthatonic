@extends('layouts.app')
@section('content')
@if (session('success'))
			
			 <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
               <h4> Done!!!{{session('success')}}</h4>
              </div>
             
			@endif
    <div class="header pb-8 pt-5 pt-md-12"style="background-color:#faeeda;">
    <div class="container-fluid">
	
        <div class="row mt-5">
            <div class="col-xl-12 mb-8 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Patients Data</h3>
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
                     <table class="table align-items-center table-flush table-striped text-center" id="employee_table">  
					 <thead class="thead-light">
                          <tr>  
                               <th width="5%">S/N</th>  
                               <th width="15%">Invoice ID</th> 
                               <th width="10%">Date</th>  
                               <th width="40%">Options</th>  
                          </tr>  
					 </thead>
					
                             <tbody>
							
							@foreach($sale as $sal)
                                <tr>
                                    <td>
									{{$i++}}
                                    </td>
                                    <td>
									{{$sal->id}}
                                    </td>
                                    <td>
									 {{date_format($sal->created_at,'d-M-Y')}}
                                    </td>
									
                                    <td>
                                         <a href="javascript:;" data-toggle="modal" data-target="#vs{{$i}}"  class="btn btn-sm btn-default"> <i class="fas fa-info-circle  mr-3"></i>View</a>
                                         <a href="" style="background-color:orange;color:white;padding:5px;" class="btn btn-sm "> <i class="fas fa-clock  mr-3"></i>Invoice</a>
										@include('layouts.modals.view-sales')
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
			$('table').DataTable({
				searching:false;
				ordering:false;
				paging:true;
			});
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