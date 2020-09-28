@extends('layouts.app')

@section('content')
    <div class="header pb-8 pt-5 pt-md-8" style="background-color:#faeeda;">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
		@if($success)
			<div class="row" >
			<div class="col-md-12">
			<div class="box-body">
			 <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
               <h4> Done!!!{{$success}}</h4>
              </div>
              </div>
              </div>
              </div>
			@endif
            <div class="row">
			 <div class="col-xl-7 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="text-uppercase text-light ls-1 mb-1">NEED INDICATOR</h5>
                                <h2 class="text-white mb-0 text-center">Please fill appropriately</h2>
                            </div>
                           
                        </div>
                    </div>
			
                    <div class="card-body ">
					<form method="post" action="{{route('postNeeds')}}" enctype="multipart/form-data">
					@csrf
					   <input type="hidden" name="phc" value="{{$phc}}"/>
                     <div class="form-group{{ $errors->has('itemName') ? ' has-danger' : '' }}">
					  <p class="text-white" style="margin-bottom:2px;">Name of Item</p>
                                <div class="input-group input-group-alternative mb-3">
                                  <input class="text-black form-control{{ $errors->has('itemName') ? ' is-invalid' : '' }}" placeholder="{{ __('name of item') }}" type="text" name="itemName" value="{{ old('itemName') }}" style="color:black;" required autofocus>
                             
							  </div>
                                @if ($errors->has('itemName'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('itemName') }}</strong>
                                    </span>
                                @endif
                        </div>
						<div class="form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
					     <p class="text-white"style="margin-bottom:2px;">Brief Description</p>
                                <div class="input-group">
								
                                  <textarea rows="5" class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" placeholder="{{ __('desc') }}" type="text" name="desc" value="{{ old('desc') }}" style="color:black;" required autofocus>
								  </textarea>
									
							  </div>
                                @if ($errors->has('desc'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                @endif
                        </div>
						<div class="form-group{{ $errors->has('qtty') ? ' has-danger' : '' }}">
					     <p class="text-white"style="margin-bottom:2px;">Quantity</p>
                                <div class="input-group input-group-alternative mb-3">
								
                                  <input class="text-black form-control{{ $errors->has('qtty') ? ' is-invalid' : '' }}" placeholder="{{ __('123') }}" type="number" name="qtty" value="{{ old('qtty') }}" style="color:black;" required autofocus>
                             
									
							  </div>
                                @if ($errors->has('qtty'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('qtty') }}</strong>
                                    </span>
                                @endif
                        </div>
						<div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
					     <p class="text-white"style="margin-bottom:2px;">Price</p>
                                <div class="input-group input-group-alternative mb-3">
								
                                  <input class="text-black form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('price') }}" type="number" name="price" value="{{ old('price') }}" style="color:black;" required autofocus>
                             
									
							  </div>
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                        </div>
						<div class="form-group{{ $errors->has('pix') ? ' has-danger' : '' }}">
					     <p class="text-white"style="margin-bottom:2px;">Upload Picture</p>
                                <div class="input-group input-group-alternative mb-3">
								
                                   <input type="file" name="pix" class="btn btn-sm btn-default"/>
										
									
							  </div>
                                @if ($errors->has('pix'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('pix') }}</strong>
                                    </span>
                                @endif
                        </div>
						<div class="form-group{{ $errors->has('approval') ? ' has-danger' : '' }}">
					     <p class="text-white" style="margin-bottom:2px;">Approval Document</p>
                                <div class="input-group input-group-alternative mb-3">
                                   <input type="file" name="approval" class="btn btn-sm btn-default"/>
							  </div>
                                @if ($errors->has('approval'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('approval') }}</strong>
                                    </span>
                                @endif
                        </div>
						 @csrf
                  <input type="submit" name="save" id="save" class="btn" value="Save" style="background-color:#fba91d;color:#19204d;"/>
				  </form>
                    </div>
                </div>
            </div>
               <div class="col-xl-5">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 >Yet to be fulfilled needs</h3>
                            </div>
                        </div>
                    </div>
					
					
                 	<div class="card">
						<div class="card-body">
						 @foreach($needs as $need)
					       @if($need->fulfilled==0)
							<div style="clear:both;">
							<div class="col-xl-4">
							  <img src="upload/{{$need->picture}}" height="100px"width="100px;"/>
							  
							</div>
							<div class="col-xl-8" style="float:right;margin-top:-105px;margin-bottom:30px;">
							 <label  style="font-size:16px;">{{$need->item}}
							  ({{$need->qtty}} nos)</br>
							  <span style="font-size:14px;color:#fba91d;">&#8358; {{$need->price}}.</span>
							 </label>
							
							 
							 <h6>Uploaded By: </h6>
							 <p style="font-size:14px;margin-top:-10px;">{{$need->user->title}} {{$need->user->name}}.</p>
							 <p style="font-size:14px;margin-top:-20px;">{{date_format($need->created_at,'d-M-Y')}}</p>
							 
							 @if($need->verified==0&&$need->user_id==Auth::user()->id)
							  <a href="javascript:;" data-toggle="modal" data-target="#editneed{{$need->id}}" class="btn btn-primary">EDIT</a>
							  <a href="javascript:;" data-toggle="modal" data-target="#delneed{{$need->id}}"class="btn btn-danger">DELETE</a>
							  @include('layouts.modals.delete-need')
							  @include('layouts.modals.edit-need')
							 @endif
							</div>
							</div>
						   @endif
					     @endforeach
						</div>
					</div>
					
					
               </br>
			 <h3>&emsp;&emsp;Fulfilled needs</h3>
					
                 	<div class="card">
						<div class="card-body">
						@foreach($needs as $need)
					      @if($need->fulfilled==1)
						   <div  style="clear:both;">
							<div class="col-xl-4" style="clear:both;">
							  <img src="upload/{{$need->picture}}" height="100px"width="100px;"/>
							</div>
							<div class="col-xl-8" style="float:right;margin-top:-120px;margin-bottom:30px;">
							<label  style="font-size:16px;">{{$need->item}}
							  ({{$need->qtty}} nos)</br>
							  <span style="font-size:14px;color:#fba91d;">&#8358; {{$need->price}}.</span>
							 </label>
							<h6>Uploaded By: </h6>
							 <p style="font-size:14px;margin-top:-10px;">{{$need->user->title}} {{$need->user->name}}.</p>
							</div>
						  </div>
						
					
					@endif
					@endforeach
				   </div>
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
