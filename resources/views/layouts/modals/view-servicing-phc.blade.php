<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="view-serv-phc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
		   <h2 class="text-uppercase text-light ls-1 mb-1 text-white">SERVICING PRIMARY HEALTH CENTERS</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body">
		<div>
		@foreach(auth()->user()->phcs as $phc)
	     <label>NAME OF PHC:{{$phc->name}}</label></br>
	   	 <label>STATE:{{$phc->state}}</label></br>
	   	 <label>LOCAL GOVERNMENT AREA:{{$phc->lga}}</label><span style="color:white;"><hr ></span>
		@endforeach
        </div>
     </div>
    </div>
  </div>
  </div>
<!--modal ends-->