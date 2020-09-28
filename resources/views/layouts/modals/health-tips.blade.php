<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="tips" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" >
      <div class="modal-content"  >
        <div class="modal-header">
		   <h2 class="text-light ls-1 mb-1 text-white">Input Health Tips</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body" >
	 <form method="post" action="{{route('postTips')}}" enctype="multipart/form-data">
	   @csrf
	     <div class="form-group{{ $errors->has('subject') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;"> Category</p>
			   <div class="input-group input-group-alternative mb-3">
				<select class="form-control" name="cat">
					<option value="1">General</option>
					<option value="2">Pregnancy</option>
					<option value="2">Nursing Mothers</option>
				</select>
				</div>
                 @if ($errors->has('subject'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('subject') }}</strong>
                  </span>
                 @endif
            </div>
	       <div class="form-group{{ $errors->has('subject') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Subject</p>
			   <div class="input-group input-group-alternative mb-3">
				<input type="text" name="subject" class="form-control"/>
				</div>
                 @if ($errors->has('subject'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('subject') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
			  <p class="text-white" style="margin-bottom:2px;">Body</p>
			   <div class="input-group input-group-alternative mb-3">
			   <textarea rows="5" name="body" value="{{ old('body') }}" class="form-control">
			      
		         </textarea>
				</div>
                 @if ($errors->has('body'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('body') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('picture') ? ' has-danger' : '' }}">
			  <p class="text-white" style="margin-bottom:2px;">Picture Upload</p>
			   <div class="input-group input-group-alternative mb-3">
				<input type="file" class="form-control" name="picture"/>
				</div>
                 @if ($errors->has('picture'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('picture') }}</strong>
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