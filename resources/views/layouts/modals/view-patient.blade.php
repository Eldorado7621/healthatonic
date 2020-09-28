<!-- change cphc-- Modal -->

	<div class="modal modal-default fade" id="v{{$pat->id}}" tabindex="-1" role="dialog" aria-pledby="myModalp">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
		<p class="text-white">View Patient's Information</p>
		  <button type="button" class="close" data-dismiss="modal" aria-p="Close"><span aria-hidden="true">&times;</span></button>
      </div>
	 <!--modal body-->
	  <div class="modal-body">
	   <div>
	   <p class="text-white">NAME: {{$pat->name}}</p>
	   <p class="text-white">PHONE NUMBER: {{$pat->phnNo}}</p>
	   <p class="text-white">UNIQUE ID: {{$pat->username}}</p>
	   <p class="text-white">EMAIL: {{$pat->email}}</p>
	   <p class="text-white">SEX: 
	   @if($pat->sex==0)
	   FEMALE</p>
	    @else if($pat->sex==1)
			FEMALE</p>
		@endif
	   <p class="text-white">ADDRESS: {{$pat->address}}</p>
	   </div>
       </div>
	   <div class="modal-footer">
                 
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->