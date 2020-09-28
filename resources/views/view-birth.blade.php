@extends('layouts.app')

@section('content')
    @include('layouts.headers.birth-cards')
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
    <div class="container-fluid mt--7">
	 <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">BIRTH RECORDS AT A GLANCE</h3>
                            </div>
                            <form method="post" action="{{route('search_birth')}}" class="navbar-search navbar-search-white form-inline mr-3 d-none d-md-flex ml-lg-auto" >
								@csrf
							  <div class="form-group mb-0">
                                <div class="input-group input-group-alternative">
                                 <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="fas fa-search"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="Search" type="text" name="search">
                                </div>
                               </div>
                               </form>
							  {{$birth_rec->links()}}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Father</th>
                                    <th scope="col">Mother</th>
                                    <th scope="col">Sex</th>
                                    <th scope="col">Weight</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
							<input type="hidden" value="{{$i=1}}"/>
							@foreach($birth_rec as $rec)
                                <tr>
                                    <th scope="row">
									{{$i++}}
                                    </th>
                                    <td>
									{{$rec->father}}
                                    </td>
                                    <td>
									{{$rec->mother}}
                                    </td>
									 <td>
									 {{$rec->sex}}
                                    </td>
									 <td>
									 {{$rec->weight}}
                                    </td>
									 <td>
									 {{$rec->dob}}
                                    </td>
                                    <td>
                                       
                                        <a style=""  class="btn btn-sm btn-primary" href="javascript:;" data-toggle="modal" data-target="#editBirthRec">
										<i class="fas fa-edit text-white mr-2"></i> 
											Edit
										</a>
									@include('layouts.modals.edit-birth-rec')
                                    </td>
                                </tr>
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
