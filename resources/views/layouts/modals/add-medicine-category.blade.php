<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="addmedicinecat" tabindex="-1" role="dialog" aria-pledby="myModalp" >
    <div class="modal-dialog" role="document" style="width:800px;">
      <div class="modal-content" >
        <div class="modal-header">
		   <h2 class="text-light ls-1 mb-1 text-white">ADD MEDICINE TO STORE</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-p="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body">
	 <form method="post" action="{{route('postMedicineCat')}}">
	  
	  
	   @csrf
	 
	       <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Category name</p>
			   <div class="input-group input-group-alternative">
				<input type="text" name="category" class="form-control"/>
				</div>
                 @if ($errors->has('category'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('category') }}</strong>
                  </span>
                 @endif
            </div>
			<div class="form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
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
		  <input type="submit" class="btn" value="OK" style="background-color:#fba91d;color:#19204d;"/>
		</form>
       </div>
	   <div class="modal-footer">
               
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->