<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="e{{$history->id}}" tabindex="-1" role="dialog" aria-pledby="myModalp" >
    <div class="modal-dialog" role="document" style="width:800px;">
      <div class="modal-content"  style="width:800px;">
        <div class="modal-header">
		   <h2 class="text-uppercase text-light ls-1 mb-1 text-white">HEALTH RECORD</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-p="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body"  style="width:800px;">
	 <form method="post" action="{{route('postThread')}}">
	  <div class="col-md-6" style="float:left;">
	  
	   @csrf
	   <input type="hidden" name="id" value="{{$history->id}}"/>
	   <input type="hidden" name="thread" value="{{$history->thread}}"/>
	   <p>DATE:{{$history->created_at}}</p>
	       <div class="form-group{{ $errors->has('cond') ? ' has-danger' : '' }}">
			 <p class="text-white">CONDITION</p>
			   <div class="input-group input-group-alternative">
				 <textarea rows="5" name="cond" value="{{ old('cond') }}" class="form-control">
			      {{$history->condition}}
		         </textarea>
				</div>
                 @if ($errors->has('cond'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('cond') }}</strong>
                  </span>
                 @endif
            </div>
			 <div class="form-group{{ $errors->has('pres') ? ' has-danger' : '' }}">
			 <p class="text-white">PRESCRIPTION</p>
			   <div class="input-group input-group-alternative mb-3">
			   <textarea rows="5" name="pres" value="{{ old('pres') }}" class="form-control">
			      {{$history->prescription}}
		         </textarea>
				</div>
                 @if ($errors->has('pres'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('pres') }}</strong>
                  </span>
                 @endif
            </div>
		  <input type="submit" class="btn btn-success" value="OK"/>
	    </div>
		<div class="col-md-6" style="float:right;">
		 <h5 class="text-white">CURRENT CONTENT</h5>
	   	 <p>CONDITION</p>
		 <textarea rows="5" name="cond1" class="form-control" readonly>
			{{$history->condition}}
		 </textarea>
		 <p>PRESCRIPTION</p>
		 <textarea rows="5" name="pres1" class="form-control" readonly>
			{{$history->prescription}}
		 </textarea>
		 </div>
		</form>
       </div>
	   <div class="modal-footer">
                 Signed By:{{$history->doc_name}}
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->