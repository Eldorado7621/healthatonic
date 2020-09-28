<!-- change cphc-- Modal -->
	<div class="modal modal-default fade" id="pat_rec" tabindex="-1" role="dialog" aria-pledby="myModalp">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header"">
		  <button type="button" class="close" data-dismiss="modal" aria-p="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body">
	   
	  <form method="post" action="{{route('patRec')}}">
	   @csrf
	  
			 <div class="form-group{{ $errors->has('id') ? ' has-danger' : '' }}">
					  <p class="text-white" style="margin-bottom:2px;" >Patient's ID </p>
                                <div class="input-group input-group-alternative mb-3">
								
                                  <input class="text-black form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" placeholder="{{ __('Unique ID') }}" type="text" name="id" value="{{ old('id') }}" style="color:black;" required autofocus>
                             
									
							  </div>
                                @if ($errors->has('id'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('id') }}</strong>
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