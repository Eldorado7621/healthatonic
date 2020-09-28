@extends('layouts.app')
@section('content')

    <div class="header pb-8 pt-5 pt-md-12" style="background-color:#faeeda;">
	@if (session('success'))
			
			 <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
               <h4> Done!!!{{session('success')}}</h4>
              </div>
              
			@endif
    <div class="container-fluid">
	
        <div class="row mt-5">
            <div class="col-xl-12 mb-8 mb-xl-0">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Medicine Categories</h3>
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
                     <table class="table table-bordered text-center" >  
					 <thead class="thead-light">
                          <tr>  
                               <th width="5%">S/N</th>  
                               <th width="20%">Name</th>  
                               <th width="30%">Description</th>  
                               <th width="20%">Options</th> 
                          </tr>  
					 </thead>
					 <tbody>
                             <tbody>
							
							@foreach($cats as $cat)
                                <tr>
                                    <td>
									{{$i++}}
                                    </td>
                                    <td>
									{{$cat->name}}
                                    </td>
									 <td>
									{{$cat->description}}
                                    </td>
                                    <td>
                                       <a href="javascript:;" data-toggle="modal" data-target="#e{{$cat->id}}" class="btn btn-sm btn-primary"> <i class="fas fa-edit  mr-3"></i>Edit</a>
                                       <a href="javascript:;" data-toggle="modal" data-target="#d{{$cat->id}}"  class="btn btn-sm btn-danger"> <i class="fas fa-info-circle  mr-3">&emsp;Delete</i></a>
                                    </td>
                                </tr>
							 @include('layouts.modals.edit-medicine-category')
							 @include('layouts.modals.delete-medicine-category')
							@endforeach
                            </tbody>
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
