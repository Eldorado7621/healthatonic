<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="addmedicine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" style="width:800px;">
      <div class="modal-content" >
        <div class="modal-header">
		   <h2 class="text-uppercase text-light ls-1 mb-1 text-white">Add New Medicine</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body">
	 <form method="post" action="">
	  	<textarea name="desc" class="form-control">
				</textarea>
	  
	   @csrf
		
		<div class="col-md-6" style="float:left;">
	       <div class=" form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
			 <label class="text-white">Name</label></br>
			   <div class="input-group input-group-alternative">
				<input type="text" name="name" class="form-control"/>
				</div>
                 @if ($errors->has('name'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('name') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class=" form-group{{ $errors->has('gen_name') ? ' has-danger' : '' }}">
			  <label class="text-white">Generic Name</label></br>
			   <div class="input-group input-group-alternative">
				<input type="text" name="gen_name" class="form-control"/>
				</div>
                 @if ($errors->has('gen_name'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('gen_name') }}</strong>
                  </span>
                 @endif
            </div>
			<div class="form-group{{ $errors->has('purchase') ? ' has-danger' : '' }}">
			 <label class="text-white">Purchase Price</label></br>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="purchase" class="form-control"/>
				</div>
                 @if ($errors->has('purchase'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('purchase') }}</strong>
                  </span>
                 @endif
            </div>
			<div class="form-group{{ $errors->has('exp') ? ' has-danger' : '' }}">
			 <label class="text-white">Expiry Date</label></br>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="exp" class="form-control"/>
				</div>
                 @if ($errors->has('exp'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('exp') }}</strong>
                  </span>
                 @endif
            </div>
            </div>
			<div class="col-md-6" style="float:right;">
			 <div class="form-group{{ $errors->has('purchase') ? ' has-danger' : '' }}">
			  <label class="text-white">Purchase Price</label></br>
			   <div class="input-group input-group-alternative">
			    <select name="purchase" class="form-control">
					<option></option>
				</select>
				</div>
                 @if ($errors->has('purchase'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('purchase') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('qtty') ? ' has-danger' : '' }}">
			  <label class="text-white">Quantity</label></br>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="qtty" class="form-control"/>
				</div>
                 @if ($errors->has('qtty'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('qtty') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('sales') ? ' has-danger' : '' }}">
			  <label class="text-white">Sales Price</label></br>
			   <div class="input-group input-group-alternative">
			    <input type="number" name="sales" class="form-control"/>
				</div>
                 @if ($errors->has('sales'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('sales') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('effects') ? ' has-danger' : '' }}">
			  <label class="text-white">Effects</label></br>
			   <div class="input-group input-group-alternative">
			    <input type="text" name="effects" class="form-control"/>
				</div>
                 @if ($errors->has('effects'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('effects') }}</strong>
                  </span>
                 @endif
            </div>
			</div>
		  <input type="submit" class="btn btn-success" value="OK"/>
		</form>
       </div>
	   <div class="modal-footer">
               
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->