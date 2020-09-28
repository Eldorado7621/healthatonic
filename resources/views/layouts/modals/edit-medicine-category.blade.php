<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="e{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" >
      <div class="modal-content"  >
        <div class="modal-header">
		   <h2 class="text-uppercase text-light ls-1 mb-1 text-white">Edit Category</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body" >
	 <form method="post" action="{{route('editMedcat')}}" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="id" value="{{$cat->id}}"/>
                     <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
					  <label class="text-white">Category Name</label></br>
                                <div class="input-group input-group-alternative mb-3">
                                  <input class="text-black form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('itemName') }}" type="text" name="name" value="{{ $cat->item }}" style="color:black;" required autofocus>
                             
							  </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
						<div class="form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
					     <label class="text-white">Description</label></br>
                                <div class="input-group">
								
                                  <textarea rows="5" class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}"  name="desc"  style="color:black;" required autofocus>
									{{ $cat->description }}
								  </textarea>
									
							  </div>
                                @if ($errors->has('desc'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                @endif
                        </div>
						
						
                  <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
				  </form>
       </div>
	   <div class="modal-footer">
                
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->