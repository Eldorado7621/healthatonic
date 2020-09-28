<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="birthReg" tabindex="-1" role="dialog" aria-pledby="myModalp" >
    <div class="modal-dialog" role="document" style="width:700px;">
      <div class="modal-content"  style="width:700px;">
        <div class="modal-header">
		   <h2 class="text-light ls-1 mb-1 text-white">Please fill appropriately</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-p="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body"  style="width:700px;">
	 <form method="post" action="{{route('birthReg')}}" enctype="multipart/form-data">
	   @csrf
	      
	       <div class="form-group{{ $errors->has('father') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Name of Father</p>
			   <div class="input-group input-group-alternative mb-3">
				<input type="text" name="father" class="form-control" value="{{old('father')}}"/>
				</div>
                 @if ($errors->has('father'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('father') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('mother') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Name of Mother</p>
			   <div class="input-group input-group-alternative mb-3">
				<input type="text" name="mother" class="form-control" value="{{old('mother')}}"/>
				</div>
                 @if ($errors->has('mother'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('mother') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Sex of Child</p>
			   <div class="input-group input-group-alternative mb-3">
				<select type="text" name="sex" class="form-control"value={{old('sex')}}>
					<option value="0">Male</option>
					<option value="1">Female</option>
				
				</select>
				</div>
                 @if ($errors->has('sex'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('sex') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('dob') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Date of Birth</p>
			   <div class="input-group input-group-alternative mb-3">
				  <input type="date" name="dob" class="form-control" value="{{old('dob')}}"/>
				</div>
                 @if ($errors->has('dob'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('dob') }}</strong>
                  </span>
                 @endif
            </div>
			<div class="form-group{{ $errors->has('weight') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Weight of Baby</p>
			   <div class="input-group input-group-alternative mb-3">
				<input type="text" name="weight" class="form-control" value="{{old('weight')}}"/>
				
				</div>
                 @if ($errors->has('weight'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('weight') }}</strong>
                  </span>
                 @endif
            </div>
		  <input type="submit" class="btn" value="OK"  style="background-color:#fba91d;color:#19204d;"/>
	  
		
		</form>
       </div>
	   <div class="modal-footer">
                
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->