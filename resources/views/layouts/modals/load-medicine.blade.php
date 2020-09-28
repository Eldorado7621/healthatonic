<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="ld{{$medicine->id}}" tabindex="-1" role="dialog" aria-pledby="myModalp" >
    <div class="modal-dialog" role="document" >
      <div class="modal-content" >
        <div class="modal-header">
		   <h2 class="text-uppercase text-light ls-1 mb-1 text-white">Edit Medicine</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	 <div id="result"></div>
	 <div class="modal-body" style="margin-top:-50px;">
	 <form method="post" id="dynamic_lm">
	  	<input type="hidden" name="med_id" value="{{$medicine->id}}"/>
	   @csrf
	   <h3 class="text-white">{{$medicine->name}}</h3>
	   <div class="form-group{{ $errors->has('qtty') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Quantity</p>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="qtty" class="form-control" value=""/>
				</div>
                 @if ($errors->has('qtty'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('qtty') }}</strong>
                  </span>
                 @endif
           </div>
			<div class="form-group{{ $errors->has('purchase') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Purchase Price</p>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="purchase" class="form-control" value=""/>
				</div>
                 @if ($errors->has('purchase'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('purchase') }}</strong>
                  </span>
                 @endif
            </div>
			   <div class="form-group{{ $errors->has('sales') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Sales Price</p>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="sales" class="form-control" value=""/>
				</div>
                 @if ($errors->has('sales'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('sales') }}</strong>
                  </span>
                 @endif
            </div>
			   <div class="form-group{{ $errors->has('expire') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Expiry date</p>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="expire" class="form-control" value=""/>
				</div>
                 @if ($errors->has('expire'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('expire') }}</strong>
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