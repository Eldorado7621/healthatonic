<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="fp{{$pat->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" style="width:800px;">
      <div class="modal-content"  style="width:800px;">
        <div class="modal-header">
		   <h2 class="text-uppercase text-light ls-1 mb-1 text-white">Follow Up Report</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body"  style="width:800px;">
	    <span id="result"></span> 
	    <form method="post"  action="{{route('saveReport')}}">
	     @csrf
	      <div class="form-group{{ $errors->has('report') ? ' has-danger' : '' }}">
		   <label>Report</label></br>
			   <div class="input-group input-group-alternative mb-3">
				
				<textarea name="report">
				</textarea>
			   </div>
                 @if ($errors->has('report'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('report') }}</strong>
                  </span>
                 @endif
            </div>
		  <input type="hidden" value="{{$pat->id}}" name="diagnose_id"/> 
		  <input type="submit" class="btn btn-success" value="Save" />
	  
		
		</form>
       </div>
	   <div class="modal-footer">
                
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->