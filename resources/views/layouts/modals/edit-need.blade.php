<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="editneed{{$need->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" style="width:800px;">
      <div class="modal-content"  style="width:800px;">
        <div class="modal-header">
		   <h2 class="text-uppercase text-light ls-1 mb-1 text-white">Please fill appropriately</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body"  style="width:800px;">
	 <form method="post" action="{{route('updateNeeds')}}" enctype="multipart/form-data">
					@csrf
					   <input type="hidden" name="phc" value="{{$phc}}"/>
					   <input type="hidden" name="id" value="{{$need->id}}"/>
					   <div class="text-center">
					   <img src="upload/{{$need->picture}}" height="100px"width="100px;"/>
					   <div class="form-group{{ $errors->has('pix') ? ' has-danger' : '' }}">
					     <label class="text-white">Edit Picture</label></br>
                               
                                   <input type="file" name="pix" value="{{$need->picture}}" class="btn btn-sm btn-default"/>
                                   <input type="hidden" name="pixx" value="{{$need->picture}}" class="btn btn-sm btn-default"/>
									
                                @if ($errors->has('pix'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('pix') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>
						<div class="form-group{{ $errors->has('approval') ? ' has-danger' : '' }}">
					     <label class="text-white">Approval Document: {{$need->approval}}</label></br>
                               
                                   <input type="file" name="approval" value="{{$need->approval}}" class="btn btn-sm btn-default"/>
                                   <input type="hidden" name="approvall" value="{{$need->approval}}" class="btn btn-sm btn-default"/>
									
                                @if ($errors->has('approval'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('approval') }}</strong>
                                    </span>
                                @endif
                        </div>
                     <div class="form-group{{ $errors->has('itemName') ? ' has-danger' : '' }}">
					  <label class="text-white">Name of Item</label></br>
                                <div class="input-group input-group-alternative mb-3">
                                  <input class="text-black form-control{{ $errors->has('itemName') ? ' is-invalid' : '' }}" placeholder="{{ __('itemName') }}" type="text" name="itemName" value="{{ $need->item }}" style="color:black;" required autofocus>
                             
							  </div>
                                @if ($errors->has('itemName'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('itemName') }}</strong>
                                    </span>
                                @endif
                        </div>
						<div class="form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
					     <label class="text-white">Brief Description</label></br>
                                <div class="input-group">
								
                                  <textarea rows="5" class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}"  name="desc"  style="color:black;" required autofocus>
									{{ $need->brief_desc }}
								  </textarea>
									
							  </div>
                                @if ($errors->has('desc'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                @endif
                        </div>
						<div class="form-group{{ $errors->has('qtty') ? ' has-danger' : '' }}">
					     <label class="text-white">Quantity</label></br>
                                <div class="input-group input-group-alternative mb-3">
								
                                  <input class="text-black form-control{{ $errors->has('qtty') ? ' is-invalid' : '' }}"  type="number" name="qtty" value="{{ $need->qtty }}" style="color:black;" required autofocus>
                             
									
							  </div>
                                @if ($errors->has('qtty'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('qtty') }}</strong>
                                    </span>
                                @endif
                        </div>
						<div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
					     <label class="text-white">Price</label></br>
                                <div class="input-group input-group-alternative mb-3">
								
                                  <input class="text-black form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"  type="number" name="price" value="{{ $need->price }}" style="color:black;" required autofocus>
                             
									
							  </div>
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                        </div>
						
						 @csrf
                  <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
				  </form>
       </div>
	   <div class="modal-footer">
                
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->