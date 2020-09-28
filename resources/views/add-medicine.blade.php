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
    <div class="container-fluid" >
	
      <div class="row mt-5">
       <div class="col-xl-12 mb-8 mb-xl-0">
       <form method="post" action="{{route('postAddmed')}}">
	  	<h3 style="color:black;">Add New Medicine</h3>
	  
	   @csrf
		
		<div class="col-md-6" style="float:left;color:black;">
	       <div class=" form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
			 <p class="" style="margin-bottom:2px;color:black;">Name</p>
			   <div class="input-group input-group-alternative">
				<input type="text" name="name" class="form-control"/>
				</div>
                 @if ($errors->has('name'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('name') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class=" form-group{{ $errors->has('generic') ? ' has-danger' : '' }}">
			  <p class="" style="margin-bottom:2px;">Generic Name</p>
			   <div class="input-group input-group-alternative">
				<input type="text" name="generic" class="form-control"/>
				</div>
                 @if ($errors->has('generic'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('generic') }}</strong>
                  </span>
                 @endif
            </div>
			<div class="form-group{{ $errors->has('purchase') ? ' has-danger' : '' }}">
			 <p class="" style="margin-bottom:2px;">Purchase Price</p>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="purchase" class="form-control"/>
				</div>
                 @if ($errors->has('purchase'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('purchase') }}</strong>
                  </span>
                 @endif
            </div>
			<div class="form-group{{ $errors->has('expire') ? ' has-danger' : '' }}">
			 <p class="" style="margin-bottom:2px;">Expiry Date</p>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="expire" class="form-control"/>
				</div>
                 @if ($errors->has('expire'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('expire') }}</strong>
                  </span>
                 @endif
            </div>
            </div>
			<div class="col-md-6" style="float:right;">
			 <div class="form-group{{ $errors->has('cat') ? ' has-danger' : '' }}">
			  <p class="" style="margin-bottom:2px;">Category</p>
			   <div class="input-group input-group-alternative">
			    <select name="cat" class="form-control">
					<option class="form-control">--select category--</option>
					@foreach($cats as $cat)
					<option value="{{$cat->id}}" class="form-control">{{$cat->name}}</option>
					@endforeach
				</select>
				</div>
                 @if ($errors->has('cat'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('cat') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('qtty') ? ' has-danger' : '' }}">
			  <p class="" style="margin-bottom:2px;">Quantity</p>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="qtty" class="form-control"/>
				</div>
                 @if ($errors->has('qtty'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('qtty') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('sales') ? ' has-danger' : '' }}">
			  <p class="" style="margin-bottom:2px;">Sales Price</p>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="sales" class="form-control"/>
				</div>
                 @if ($errors->has('sales'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('sales') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('effect') ? ' has-danger' : '' }}">
			  <p class="" style="margin-bottom:2px;">Effects</p>
			   <div class="input-group input-group-alternative">
			   	 <textarea name="effect" class="form-control">
				 </textarea>
				</div>
                 @if ($errors->has('effect'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('effect') }}</strong>
                  </span>
                 @endif
            </div>
			</div>
		  <input type="submit" class="btn" value="ADD" style="background-color:#fba91d;color:#19204d;margin-left:20px;"/>
		</form>
            </div>
           
        </div>
    </div>
</div>
  

  <div class="container-fluid mt--7">
      
       
        
        @include('layouts.footers.auth')
    </div>
@endsection
