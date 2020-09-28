<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="d{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" >
      <div class="modal-content"  >
        <div class="modal-header">
		<h2 class="text-white">DELETE CATEGORY</h2>
		    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body text-center" >
     	<h2 class="text-white">Are you sure you want to delete it?</h2>
		<a href="" data-dismiss="modal" aria-label="Close" class="btn btn-primary">NO</a>&emsp;&emsp;&emsp;
		<a href="{{route('delete_medcat',['id'=>$cat->id])}}" class="btn btn-danger">YES</a>
		
     
       </div>
	   <div class="modal-footer">
                
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->