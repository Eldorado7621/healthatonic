<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="active_antenatal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" style="width:800px;">
      <div class="modal-content"  style="width:800px;">
        <div class="modal-header">
		   <h2 class="text-uppercase text-light ls-1 mb-1 text-white">Please select PHC</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body"  >
	  
		@foreach(Auth::user()->phcs as $phc)
			<a href="{{route('viewActiveRec',['phc'=>$phc->id])}}" class="btn btn-success">{{$phc->name}}</a></br></br>
		@endforeach
	  
     
	  
      </div>
	   <div class="modal-footer">
                
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->