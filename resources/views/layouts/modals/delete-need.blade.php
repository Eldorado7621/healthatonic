<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="delneed{{$need->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" >
      <div class="modal-content" style="background-color:red;">
        <div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body text-center text-white"  >
		<h2>Are you sure you want to delete it?</h2>
		<a href="{{route('delete_need',['id'=>$need->id,'phc'=>$phc])}}" class="btn btn-primary">YES</a>&emsp;&emsp;&emsp;
		<a href="" data-dismiss="modal" aria-label="Close" class="btn btn-default">NO</a>
     
	
      </div>
	   <div class="modal-footer">
                
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->