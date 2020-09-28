
<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="add_maint_schedule" tabindex="-1" role="dialog" aria-pledby="myModalp" >
    <div class="modal-dialog" role="document" style="width:800px;">
      <div class="modal-content" >
        <div class="modal-header">
		   <h2 class=" text-light ls-1 mb-1 text-white">Create Maintenance Schedule</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body">
	 <form method="post" action="{{route('add_maint_schedule')}}"  enctype="multipart/form-data">
	   @csrf
	       <div class=" form-group{{ $errors->has('item') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Item</p>
			   <div class="input-group input-group-alternative">
				<input type="text" name="item" class="form-control"/>
				</div>
                 @if ($errors->has('item'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('item') }}</strong>
                  </span>
                 @endif
            </div>
			<div class=" form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
			  <p class="text-white" style="margin-bottom:2px;">Description</p>
			   <div class="input-group input-group-alternative">
				<textarea name="desc" class="form-control">
				</textarea>
				</div>
                 @if ($errors->has('desc'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('desc') }}</strong>
                  </span>
                 @endif
            </div>
			<div class="form-group{{ $errors->has('pix') ? ' has-danger' : '' }}">
				<p class="text-white" style="margin-bottom:2px;">Upload Picture</p>
                  <div class="input-group input-group-alternative mb-3">
					<input type="file" name="pix" class="btn btn-sm btn-default"/>
				  </div>
                    @if ($errors->has('pix'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('pix') }}</strong>
                                    </span>
                                @endif
            </div>
			<div class="form-group{{ $errors->has('approval') ? ' has-danger' : '' }}">
					     <p class="text-white" style="margin-bottom:2px;">Approval Document</p>
                                <div class="input-group input-group-alternative mb-3">
                                   <input type="file" name="approval" class="btn btn-sm btn-default"/>
							  </div>
                                @if ($errors->has('approval'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('approval') }}</strong>
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