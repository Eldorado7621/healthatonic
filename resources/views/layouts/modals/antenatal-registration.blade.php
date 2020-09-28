<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="antenatal" tabindex="-1" role="dialog" aria-pledby="myModalp" >
    <div class="modal-dialog" role="document" >
      <div class="modal-content"  >
        <div class="modal-header">
		   <h2 class="text-light ls-1 mb-1 text-white">Antenatal Registration</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-p="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body"  >
	 <form method="post" action="{{route('antenatalReg')}}" enctype="multipart/form-data">
	   @csrf
	      <div class="form-group{{ $errors->has('uid') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Patient's Unique ID</p>
			   <div class="input-group input-group-alternative mb-3">
				<input type="text" name="uid" class="form-control" value="{{old('uid')}}"/>
				</div>
                 @if ($errors->has('uid'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('uid') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('week') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Week of Pregnancy</p>
			   <div class="input-group input-group-alternative mb-3">
				<input type="number" name="week" class="form-control" value="{{old('week')}}"/>
				</div>
                 @if ($errors->has('week'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('week') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('delivery') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Expected Delievery time</p>
			   <div class="input-group input-group-alternative mb-3">
				<input type="date" name="delivery" class="form-control" value="{{old('delivery')}}"/>
				
				</div>
                 @if ($errors->has('delivery'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('delivery') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('prev_birth') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Number of previous birth</p>
			   <div class="input-group input-group-alternative mb-3">
				<input type="number" name="prev_birth" class="form-control" value="{{old('prev_birth')}}"/>
				
				</div>
                 @if ($errors->has('prev_birth'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('prev_birth') }}</strong>
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
		  <input type="submit" class="btn" value="OK"  style="background-color:#fba91d;color:#19204d;"/>
	  
		
		</form>
       </div>
	   <div class="modal-footer">
                
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->