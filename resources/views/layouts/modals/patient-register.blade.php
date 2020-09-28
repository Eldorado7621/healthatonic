<!-- change cphc-- Modal -->

	<div class="modal modal-default fade" id="pat_reg" tabindex="-1" role="dialog" aria-pledby="myModalp" >
    <div class="modal-dialog" role="document" >
      <div class="modal-content" style="width:800px;">
        <div class="modal-header"><h2 class="text-white">Register Patient</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-p="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
	 <!--modal body-->
	  <div class="modal-body" >
	  <form method="post" action="{{route('pat_reg')}}">
	  @csrf
		<div class="col-md-6" style="float:left;">
	      <div class="form-group{{ $errors->has('sur_name') ? ' has-danger' : '' }}">
					  <p class="text-white" style="margin-bottom:2px;">Surname</p>
                                <div class="input-group input-group-alternative mb-3">
								
                                  <input class="text-black form-control{{ $errors->has('sur_name') ? ' is-invalid' : '' }}" placeholder="{{ __('surname') }}" type="text" name="sur_name" value="{{ old('sur_name') }}" style="color:black;" required autofocus>
                             
									
							  </div>
                                @if ($errors->has('sur_name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('sur_name') }}</strong>
                                    </span>
                                @endif
            </div>
			 
			 <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
					  <p class="text-white" style="margin-bottom:2px;">Email</p>
                                <div class="input-group input-group-alternative mb-3">
								
                                  <input class="text-black form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('email') }}" type="email" name="email" value="{{ old('email') }}" style="color:black;" autofocus>
                             
									
							  </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            </div>
			<div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
					  <p class="text-white" style="margin-bottom:2px;">Address</p>
                                <div class="input-group input-group-alternative mb-3">
								
                                  <input class="text-black form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('address') }}" type="text" name="address" value="{{ old('address') }}" style="color:black;" required autofocus>
                             
									
							  </div>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
            </div>
		    <div class="form-group{{ $errors->has('social_media') ? ' has-danger' : '' }}">
					  <p class="text-white" style="margin-bottom:2px;">How frequent are you on social media currently</p>
                                <div class="input-group input-group-alternative mb-3">
								 <p><select name="social_media" class="form-control">
									<p><option>--Please select</option></p>
									<p><option value="1">Not frequent</option></p>
									<p><option value="2">Frequent</option></p>
									<p><option value="3">Very Frequent</option></p>
								 </select></p>
							  </div>
                                @if ($errors->has('social_media'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('social_media') }}</strong>
                                    </span>
                                @endif
            </div>
			 <input type="submit" class="btn" value="OK" style="background-color:#fba91d;color:#19204d;"/>
			</div>
			<div class="col-md-6" style="float:right;">
			 <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
					  <p class="text-white" style="margin-bottom:2px;">Other Names</p>
                                <div class="input-group input-group-alternative mb-3">
                                  <input class="text-black form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="{{ __('first name') }}" type="text" name="first_name" value="{{ old('first_name') }}" style="color:black;" required autofocus>
                            </div>
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
            </div>
			 <div class="form-group{{ $errors->has('dob') ? ' has-danger' : '' }}">
				<p class="text-white" style="margin-bottom:2px;">Date of Birth</p>
                     <div class="input-group input-group-alternative mb-3">
                         <input class="text-black form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" placeholder="{{ __('dob') }}" type="date" name="dob" value="{{ old('dob') }}" style="color:black;" autofocus>
                     </div>
                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
            </div>
				 <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
					  <p class="text-white" style="margin-bottom:2px;">Sex</p>
                                <div class="">
                                 <p><select name="sex" class="form-control">
									<p><option>--select sex</option></p>
									<p><option value="0">Female</option></p>
									<p><option value="1">Male</option></p>
								 </select></p>
								 </div>
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
            </div>
			 <div class="form-group{{ $errors->has('phnNo') ? ' has-danger' : '' }}">
					  <p class="text-white" style="margin-bottom:2px;">Phone Number</p>
                                <div class="input-group input-group-alternative mb-3">
                                  <input class="text-black form-control{{ $errors->has('phnNo') ? ' is-invalid' : '' }}" placeholder="{{ __('phnNo') }}" type="number" name="phnNo" value="{{ old('phnNo') }}" style="color:black;" autofocus>
                             </div>
                                @if ($errors->has('phnNo'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('phnNo') }}</strong>
                                    </span>
                                @endif
             </div>
			 
            </div>
	  
	  </form>
      </div>
	  <div class="modal-footer">
                 
	 </div>
       
    </div>
  </div>
  </div>
<!--modal ends-->