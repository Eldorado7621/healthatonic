@extends('layouts.app')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@section('content')

    @include('layouts.headers.cards')
   
	<style>
		.tt td{
			width:20px;
		}
	
	</style>
    <div class="container-fluid mt--7" >
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
                         <table class="table align-items-center table-flush table-striped text-center" id="employee_table"> 
							 <thead class="thead-light">
                                <tr>
                                    <th width="20%">Name</th>
                                    <th width="10%">Unique ID</th>
									 <th width="20%">Phone Number</th>
									 <th width="10%">Condition</th>
									 <th width="10%">Prescription</th>
									 
                                    <th width="25%">OPTIONS</th>
                                </tr>
								
                            </thead>
                            <tbody>
							
							@foreach($follow_up as $pat)
                                <tr>
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
									 {{$pat->condition}}
                                    </td>
									<td>
									 {{$pat->prescription}}
                                    </td>
                                    <td>
									  <a href="javascript:;" data-toggle="modal" data-target="#fp{{$pat->id}}" class="btn btn-sm btn-primary"> <i class="fas fa-edit  mr-3"></i>Edit</a>
                                      
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