<!-- change cphc-- Modal -->
	<div class="col-md-12 modal modal-default fade" id="vs{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" >
      <div class="modal-content" >
        <div class="modal-header">
		   <h2 class="text-uppercase text-light ls-1 mb-1 text-white">View Sales</h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
	 <!--modal body-->
	  <div class="modal-body" >
		<div class="table align-items-center table-flush table-striped text-center">
			<table>
			 <tr>
				<th>S/N</th>
				<th>Item</th>
				<th>Price</th>
				<th>Quantity</th>
			 </tr>
				
				@for($j=0;$j<count($item_array[$i-2]);$j++)
				<tr>
					<td>{{$j+1 }}</td>
					<td>{{$item_array[$i-2][$j]}}</td>
					<td>{{$price_array[$i-2][$j]}}</td>
					<td>{{$qtty_array[$i-2][$j]}}</td>
				</tr>
				@endfor
			</table>
		</div>
       </div>
	   <div class="modal-footer">
                
		</div>
       
    </div>
  </div>
  </div>
<!--modal ends-->