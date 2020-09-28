<!-- change cphc-- Modal -->

	<div class="modal modal-default fade" id="e{{$pat->id}}" tabindex="-1" role="dialog" aria-pledby="myModalp">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
		<p class="text-white">Edit Patient's Information</p>
		  <button type="button" class="close" data-dismiss="modal" aria-p="Close"><span aria-hidden="true">&times;</span></button>
         
      </div>
	 <!--modal body-->
	  <div class="modal-body">
	   <div style="margin-top:-50px;">
	  <form method="post" action="{{route('postPatientEdit')}}">
	   @csrf
	   <input type="hidden" name="id" value="{{$pat->id}}" />
	       <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
			 <p class="text-white">Name</p>
			 <div class="input-group input-group-alternative mb-3">
			  <input class="text-black form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('name') }}" type="text" name="name" value="{{$pat->name}}" style="color:black;" required autofocus>
                           
            </div>
			  @if ($errors->has('name'))
                   <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                    </span>
                   @endif
            </div>
			
		 <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
			 <p class="text-white">Sex</p>
			 <div class="input-group input-group-alternative mb-3">
				 <select name="sex" class="form-control">
				  @if($pat->sex==0)
					<p class="text-white"><option value="0">FEMALE</option>
					<option value="1">MALE</option>
				   @else if($pat->sex==1)
					<option value="1">MALE</option>
					<option value="0">FEMALE</option></p>
					@endif
				</select>
            </div>
			  @if ($errors->has('sex'))
                   <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('sex') }}</strong>
                    </span>
                   @endif
            </div>
			 <div class="form-group{{ $errors->has('phnNo') ? ' has-danger' : '' }}">
			 <p class="text-white">Phone Number</p>
			  <div class="input-group input-group-alternative mb-3">
			  <input class="text-black form-control{{ $errors->has('phnNo') ? ' is-invalid' : '' }}" placeholder="{{ __('phnNo') }}" type="number" name="phnNo" value="{{$pat->phnNo}}" style="color:black;" required autofocus>
                             
            </div>
			  @if ($errors->has('phnNo'))
                   <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('phnNo') }}</strong>
                    </span>
                   @endif
            </div>
			 <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
			 <p class="text-white">Address</p>
			  <div class="input-group input-group-alternative mb-3">
			  <input class="text-black form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('address') }}" type="text" name="address" value="{{$pat->address}}" style="color:black;" required autofocus>
                             
            </div>
			  @if ($errors->has('address'))
                   <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                    </span>
                   @endif
            </div>
			 <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
			 <p class="text-white">Email</p>
			  <div class="input-group input-group-alternative mb-3">
			  <input class="text-black form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('email') }}" type="email" name="email" value="{{$pat->email}}" style="color:black;" required autofocus>
                             
            </div>
			  @if ($errors->has('email'))
                   <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                   @endif
            </div>
			
		  <input type="submit" class="btn btn-primary" value="OK"/>
		 
	   </form>
	   </div>
       </div>
	   <div class="modal-footer">
                 
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->