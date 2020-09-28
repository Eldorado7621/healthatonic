@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
@section('content')
@if (session('success'))
			<div class="row" >
			<div class="col-md-12">
			<div class="box-body">
			 <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
               <h4> Done!!!{{session('success')}}</h4>
              </div>
              </div>
              </div>
              </div>
			@endif
    <div class="header pb-8 pt-5 pt-md-12" style="background-color:#faeeda;">
    <div class="container-fluid">
	</br></br>
	@if($card_type=="referal")
		<a href="{{route('generate_card',['card_type'=>$card_type])}}" target="_blank" class="btn" style="background-color:#fba91d;">GENERATE REFERAL FORM</a>
	@elseif($card_type=="id_card")
		<a href="{{route('generate_card',['card_type'=>$card_type])}}" target="_blank" class="btn" style="background-color:#fba91d;">GENERATE ID CARD</a>
	@endif
    </div>
</div>
  

  <div class="container-fluid mt--7">
      
       
        
        @include('layouts.footers.auth')
    </div>
@endsection
