@extends('layouts.app')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
@section('content')

    @include('layouts.headers.antenatal-cards')
   
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
                                <h3 class="mb-0">Antenatal Records at a Glance</h3>
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
                                    <th width="5%">Weeks when </br>registered</th>
                                    <th width="10%">Expected</br> Delivery</th>
                                   
									 <th width="10%">Phone Number</th>
									 
                                    <th width="40%">OPTIONS</th>
                                </tr>
								
                            </thead>
                            <tbody>
							
							@foreach($antenatals as $antenatal)
                                <tr>
                                    
                                    <td>
									{{$antenatal->patient['name']}}
                                    </td>
									
                                    <td>
									{{$antenatal->weeks}}
                                    </td>
									 <td>
									 {{$antenatal->expected_delivery}}
                                    </td>
									 
									 <td>
									 {{$antenatal->patient['phnNo']}}
                                    </td>
									
                                    <td>
										@if($antenatal->active==0)
											
										<a  class="btn btn-sm btn-default" href="{{route('reEnroll',['code'=>1,'id'=>$antenatal->id])}}">
										
											Re-enroll
										</a>
										@else
										 <a  class="btn btn-sm btn-success" href="{{route('reEnroll',['code'=>2,'id'=>$antenatal->id])}}" >
										 
											Delivered
										</a>
										@endif 
										<a  class="btn btn-sm btn-primary" href="javascript:;" data-toggle="modal" data-target="#ep{{$antenatal->id}}" >
										 
											Edit
										</a>
										<a  class="btn btn-sm btn-default" href="history+{{ $antenatal->patient['name']}}={{ $antenatal->patient['id']}}" >
										 
											History
										</a>
                                        <?php
                                            $username=$antenatal->patient['username'];
                                            ?>
										<a  class="btn btn-sm" href="diagnose={{ $antenatal->patient['username']}}" style="background-color:orange;color:white;">
										 
											Attend
                                        </a>
                                       
                                    </td>
                                </tr>
							  @include('layouts.modals.edit-antenatal-patient')
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