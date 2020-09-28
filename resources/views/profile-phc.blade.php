@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->

            <div class="row">
			 <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">LIST OF PHCs</h6>
                                <h2 class="text-white mb-0">State: {{$state}}</h2>
                                <h3 class="text-white mb-0">LGA: {{$lga}}</h3>
                            </div>
                           
                        </div>
                    </div>
			@if (session('success'))
			<div class="row" >
			<div class="col-md-6">
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
                    <div class="card-body ">
					<form method="post" action="{{route('submitProfilePhc')}}">
					@csrf
						<label>Primary Health Center</label>
						<select name="selectedPhc" class="form-control">
							<option>--Select PHC from the list--</option>
							@foreach($phcs as $phc)
							<option value="{{$phc->id}}">{{$phc->name}}</option>
							@endforeach
							
						</select></br>
						<input type="submit" value="submit" class="btn btn-primary"/>
					</form>
                    </div>
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
