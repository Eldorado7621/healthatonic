<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="t{{$history->id}}" tabindex="-1" role="dialog" aria-pledby="myModalp" >
    <div class="modal-dialog" role="document" style="width:800px;">
      <div class="modal-content"  style="width:800px;">
        <div class="modal-header">
		   <h2 class="text-uppercase text-light ls-1 mb-1 text-white">HEALTH RECORD</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-p="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body"  style="width:800px;">
	  
	  <div style="border:1px white solid;border-radius:1%;padding:5px">
			<p>DATE: {{$history->created_at}}</p>
			<p>CONDITION: {{$history->condition}}</p>
			<p>PRESCRIPTION: {{$history->prescription}}</p>
		</div>
		@foreach($history->threads as $thread)
		<div style="border:1px white solid;border-radius:1%;padding:5px;">
			<p>DATE: {{$thread->created_at}}</p>
			<p>CONDITION: {{$thread->condition}}</p>
			<p>PRESCRIPTION: {{$thread->prescription}}</p>
		</div>
		@endforeach
		
		
       </div>
	   <div class="modal-footer">
                
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->