<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="m{{$medicine->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalp" >
    <div class="modal-dialog" role="document" style="width:800px;">
      <div class="modal-content" >
        <div class="modal-header">
		   <h2 class="text-uppercase text-light ls-1 mb-1 text-white">Edit Medicine</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body">
	 <form method="post" action="" style="margin-top:-50px;">
	  	<input type="hidden" name="med_id" value="{{$medicine->id}}"/>
	  
	   @csrf
		
		<div class="col-md-6" style="float:left;">
	       <div class=" form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Name</p>
			   <div class="input-group input-group-alternative">
				<input type="text" name="name" class="form-control" value="{{$medicine->name}}"/>
				</div>
                 @if ($errors->has('name'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('name') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class=" form-group{{ $errors->has('generic') ? ' has-danger' : '' }}">
			  <p class="text-white" style="margin-bottom:2px;">Generic Name</p>
			   <div class="input-group input-group-alternative">
				<input type="text" name="generic" class="form-control" value="{{$medicine->generic}}"/>
				</div>
                 @if ($errors->has('generic'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('generic') }}</strong>
                  </span>
                 @endif
            </div>
			<div class="form-group{{ $errors->has('purchase') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Purchase Price</p>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="purchase" class="form-control" value="{{$medicine->purchase}}"/>
				</div>
                 @if ($errors->has('purchase'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('purchase') }}</strong>
                  </span>
                 @endif
            </div>
			<div class="form-group{{ $errors->has('expire') ? ' has-danger' : '' }}">
			 <p class="text-white" style="margin-bottom:2px;">Expiry Date</p>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="expire" class="form-control" value="{{$medicine->expire}}"/>
				</div>
                 @if ($errors->has('expire'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('expire') }}</strong>
                  </span>
                 @endif
            </div>
            </div>
			<div class="col-md-6" style="float:right;">
			 <div class="form-group{{ $errors->has('purchase') ? ' has-danger' : '' }}">
			  <p class="text-white" style="margin-bottom:2px;">Purchase Price</p>
			   <div class="input-group input-group-alternative">
			      <input type="number" name="purchase" class="form-control" value="{{$medicine->purchase}}"/>
				</div>
                 @if ($errors->has('purchase'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('purchase') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('quantity') ? ' has-danger' : '' }}">
			  <p class="text-white" style="margin-bottom:2px;">Quantity</p>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="quantity" class="form-control" value="{{$medicine->qtty}}"/>
				</div>
                 @if ($errors->has('quantity'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('quantity') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('sales') ? ' has-danger' : '' }}">
			  <p class="text-white" style="margin-bottom:2px;">Sales Price</p>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="sales" class="form-control" value="{{$medicine->sales}}"/>
				</div>
                 @if ($errors->has('sales'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('sales') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('effects') ? ' has-danger' : '' }}">
			  <p class="text-white" style="margin-bottom:2px;">Effects</p>
			   <div class="input-group input-group-alternative">
			    <input type="text" name="effect" class="form-control" value="{{$medicine->effect}}"/>
				</div>
                 @if ($errors->has('effects'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('effects') }}</strong>
                  </span>
                 @endif
            </div>
			</div>
		  <input type="submit" class="btn" value="OK" style="background-color:#fba91d;color:#19204d;margin-left:20px;"/>
		</form>
       </div>
	   <div class="modal-footer">
               
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->