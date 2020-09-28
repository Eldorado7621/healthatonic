
<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="add_refferal" tabindex="-1" role="dialog" aria-pledby="myModalp" >
    <div class="modal-dialog" role="document" style="width:800px;">
      <div class="modal-content" >
        <div class="modal-header">
		   <h2 class="text-light ls-1 mb-1 text-white">Hospital Referral Form</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body">
	 <form method="post" action="{{route('add_refferal')}}" >
	   @csrf
	       <div class=" form-group{{ $errors->has('uid') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Patients UID</p>
			   <div class="input-group input-group-alternative">
				<input type="text" name="uid" class="form-control"/>
				</div>
                 @if ($errors->has('uid'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('uid') }}</strong>
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
			<div class=" form-group{{ $errors->has('refer_to') ? ' has-danger' : '' }}">
			  <p class="text-white" style="margin-bottom:2px;">Hospital reffered to</p>
			   <div class="input-group input-group-alternative">
				<textarea name="refer_to" class="form-control">
				</textarea>
				</div>
                 @if ($errors->has('refer_to'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('refer_to') }}</strong>
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