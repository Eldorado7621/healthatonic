<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="h{{$history->id}}" tabindex="-1" role="dialog" aria-pledby="myModalp">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
		   <h2 class="text-uppercase text-light ls-1 mb-1 text-white">HEALTH RECORD</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body">
		<div >
	     <p>DATE:{{$history->created_at}}</p>
	   	 <p>CONDITION</p>
		 <p>{{$history->condition}}</p>
		 <p>PRESCRIPTION</p>
		 <p>{{$history->prescription}}</p>
        </div>
     </div>
	   <div class="modal-footer">
          <p>Signed By:{{$history->doc_name}}</p>
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->