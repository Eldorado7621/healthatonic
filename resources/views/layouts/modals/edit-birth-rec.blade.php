<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="editBirthRec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" style="width:800px;">
      <div class="modal-content"  style="width:800px;">
        <div class="modal-header">
		   <h2 class="text-uppercase text-light ls-1 mb-1 text-white">Please fill appropriately</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body"  style="width:800px;">
	 <form method="post" action="{{route('editBirthRec')}}" enctype="multipart/form-data">
	 
	   @csrf
	   <input type="hidden" name="id" value="{{$rec->id}}"/>
	       <div class="form-group{{ $errors->has('father') ? ' has-danger' : '' }}">
			 <label class="text-white">Name of Father</label></br>
			   <div class="input-group input-group-alternative mb-3">
				<input type="text" name="father" class="form-control" value="{{$rec->father}}"/>
				</div>
                 @if ($errors->has('father'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('father') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('mother') ? ' has-danger' : '' }}">
			 <label class="text-white">Name of Mother</label></br>
			   <div class="input-group input-group-alternative mb-3">
				<input type="text" name="mother" class="form-control" value="{{$rec->mother}}"/>
				</div>
                 @if ($errors->has('mother'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('mother') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
			 <label class="text-white">Sex of Child</label></br>
			   <div class="input-group input-group-alternative mb-3">
				<select type="text" name="sex" class="form-control"value="{{$rec->sex}}">
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
			 <label class="text-white">Date of Birth</label></br>
			   <div class="input-group input-group-alternative mb-3">
				<input type="text" name="dob" class="form-control" value="{{$rec->dob}}"/>
				
				</div>
                 @if ($errors->has('dob'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('dob') }}</strong>
                  </span>
                 @endif
            </div>
			<div class="form-group{{ $errors->has('weight') ? ' has-danger' : '' }}">
			 <label class="text-white">Weight of Baby</label></br>
			   <div class="input-group input-group-alternative mb-3">
				<input type="text" name="weight" class="form-control" value="{{$rec->weight}}"/>
				
				</div>
                 @if ($errors->has('weight'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('weight') }}</strong>
                  </span>
                 @endif
            </div>
		  <input type="submit" class="btn btn-success" value="OK"/>
	  
		
		</form>
       </div>
	   <div class="modal-footer">
                
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->