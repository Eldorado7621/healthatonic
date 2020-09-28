<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="ep{{$antenatal->id}}" tabindex="-1" role="dialog" aria-pledby="myModalp" >
    <div class="modal-dialog" role="document" style="width:800px;">
      <div class="modal-content" >
        <div class="modal-header">
		   <h2 class=" text-light ls-1 mb-1 text-white">Edit Patients Antenatal Record</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body">
	 <form method="post" action="" style="margin-top:-20px;">
	  	<input type="hidden" name="med_id" value="{{$antenatal->id}}"/>
	   @csrf
		   <div class=" form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Name</p>
			   <div class="input-group input-group-alternative">
				<input type="text" name="name" class="form-control" value="{{$antenatal->patient['name']}}" readonly />
				</div>
                 @if ($errors->has('name'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('name') }}</strong>
                  </span>
                 @endif
            </div>
           
			 <div class="form-group{{ $errors->has('dob') ? ' has-danger' : '' }}">
			  <p class="text-white" style="margin-bottom:2px;">Date of Birth</p>
			   <div class="input-group input-group-alternative">
			      <input type="date" name="dob" class="form-control" value="{{$antenatal->dob}}"/>
				</div>
                 @if ($errors->has('dob'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('dob') }}</strong>
                  </span>
                 @endif
            </div>
				<div class="form-group{{ $errors->has('weeks') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Weeks when registered</p>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="weeks" class="form-control" value="{{$antenatal->weeks}}"/>
				</div>
                 @if ($errors->has('weeks'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('weeks') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('pre_birth') ? ' has-danger' : '' }}">
			  <p class="text-white" style="margin-bottom:2px;">Previous Birth </p>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="pre_birth" class="form-control" value="{{$antenatal->pre_birth}}"/>
				</div>
                 @if ($errors->has('pre_birth'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('pre_birth') }}</strong>
                  </span>
                 @endif
            </div>
		  <input type="submit" class="btn" value="OK" style="background-color:#fba91d;color:#19204d;"/>
		</form>
       </div>
	   <div class="modal-footer">
               
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->