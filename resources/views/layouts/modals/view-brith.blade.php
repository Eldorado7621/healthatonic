<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="viewBirthReg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" style="width:800px;">
      <div class="modal-content"  style="width:800px;">
        <div class="modal-header">
		   <h2 class="text-uppercase text-light ls-1 mb-1 text-white">VIEW BIRTH RECORD</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body"  style="width:800px;">
	 <form method="post" action="{{route('viewBirthReg')}}" enctype="multipart/form-data">
	   @csrf
	      <div class="form-group{{ $errors->has('phc') ? ' has-danger' : '' }}">
			 <label class="text-white">Please select PHC</label></br>
			   <div class="input-group input-group-alternative mb-3">
				<select type="text" name="phc" class="form-control" value={{old('phc')}}>
					
					@foreach(Auth::user()->phcs as $phc)
					 <option value="{{$phc->id}}">{{$phc->name}}</option>
					@endforeach
				</select>
			   </div>
                 @if ($errors->has('phc'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('phc') }}</strong>
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