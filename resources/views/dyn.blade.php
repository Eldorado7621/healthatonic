<html>
 <head>
  <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Need Indicator</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
 </head>
 <body style=" margin-left:200px;">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
          
		    <div class="main-content">
            @include('layouts.navbars.navbar')
           
        </div>
	 <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->

            <div class="row">
			 <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">NEED INDICATOR</h6>
                                <h2 class="text-white mb-0">Please fill appropriately</h2>
                            </div>
                           
                        </div>
                    </div>
				 <div class="card-body ">
                  
				<div class="table-responsive">
                <form method="post" id="dynamic_form">
                 <span id="result"></span>
                 <table class="table table-bordered table-striped" id="user_table">
               
                <tr>
                       <div class="form-group{{ $errors->has('itemName') ? ' has-danger' : '' }}">
					  <label class="text-white">Name of Item</label></br>
                                <div class="input-group input-group-alternative mb-3">
								
                                  <input class="text-black form-control{{ $errors->has('itemName') ? ' is-invalid' : '' }}" placeholder="{{ __('itemName') }}" type="text" name="itemName" value="{{ old('itemName') }}" style="color:black;" required autofocus>
                             
									
							  </div>
                                @if ($errors->has('itemName'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('itemName') }}</strong>
                                    </span>
                                @endif
                        </div>
                </tr>
				<tr>
					<div class="form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
					     <label class="text-white">Brief Description</label></br>
                                <div class="input-group">
								
                                  <textarea rows="5" class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" placeholder="{{ __('desc') }}" type="text" name="desc" value="{{ old('desc') }}" style="color:black;" required autofocus>
								  </textarea>
									
							  </div>
                                @if ($errors->has('desc'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                @endif
                        </div>
				</tr>
				<tr>
					<div class="form-group{{ $errors->has('qtty') ? ' has-danger' : '' }}">
					     <label class="text-white">Quantity</label></br>
                                <div class="input-group input-group-alternative mb-3">
								
                                  <input class="text-black form-control{{ $errors->has('qtty') ? ' is-invalid' : '' }}" placeholder="{{ __('qtty') }}" type="number" name="qtty" value="{{ old('qtty') }}" style="color:black;" required autofocus>
                             
									
							  </div>
                                @if ($errors->has('qtty'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('qtty') }}</strong>
                                    </span>
                                @endif
                        </div>
				</tr>
				<tr>
					<div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
					     <label class="text-white">Price</label></br>
                                <div class="input-group input-group-alternative mb-3">
								
                                  <input class="text-black form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('price') }}" type="number" name="price" value="{{ old('price') }}" style="color:black;" required autofocus>
                             
									
							  </div>
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                        </div>
				</tr>
				<tr>
					<div class="form-group{{ $errors->has('pix') ? ' has-danger' : '' }}">
					     <label class="text-white">Upload Picture</label></br>
                                <div class="input-group input-group-alternative mb-3">
								
                                   <input type="file" name="pix" class="btn btn-sm btn-default"/>
										
									
							  </div>
                                @if ($errors->has('pix'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('pix') }}</strong>
                                    </span>
                                @endif
                        </div>
				</tr>
				
               
               <tbody>

               </tbody>
               <tfoot>
                <tr>
                                <td colspan="2" align="right"><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>
                                <td>
                  @csrf
                  <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                 </td>
                </tr>
               </tfoot>
           </table>
                </form>
   </div>
   </div>
                    
                </div>
            </div>
               <div class="col-xl-6">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">NEED INDICATOR</h6>
                                <h2 class="mb-0">Please fill appropriately</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
					
                    </div>
                </div>
            </div>
            
			
              
               
            </div>
        </div>
    </div>
</div>
 </body>
</html>

<script>
$(document).ready(function(){




 function dynamic_field()
 {
  html = '<div>';
         html += '<tr><label class="text-white">Name of Item</label></br><input class="text-black form-control" placeholder="" type="text" name="itemName"  style="color:black;width:500px;" required autofocus></tr></br>';
         html += '<tr><label class="text-white">Brief Description</label></br> <textarea rows="5"  class="text-black form-control" placeholder="" name="desc"  style="color:black;" required autofocus></textarea/></tr>';
         html += '<tr><label class="text-white">Quantity</label></br><input class="text-black form-control" placeholder="" type="number" name="qtty"  style="color:black;width:500px;" required autofocus></tr></br>';
         html += '<tr><label class="text-white">Price</label></br><input class="text-black form-control" placeholder="" type="number" name="price"  style="color:black;width:500px;" required autofocus></tr></br>';
         html += '<tr><label class="text-white">Upload Picture</label></br><input class="btn btn-sm btn-default" placeholder="" type="file" name="pix"  style="color:black;" required autofocus></tr></br>';
      
		
            html += '</br><tr><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></tr></div>';
            $('tbody').append(html);
        
        
 }

 $(document).on('click', '#add', function(){
  
  dynamic_field();
 });

 $(document).on('click', '.remove', function(){
  
  $(this).closest("div").remove();
 });

 $('#dynamic_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'{{ route("dynamic-field.insert") }}',
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
                $('#save').attr('disabled','disabled');
            },
            success:function(data)
            {
                if(data.error)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                }
                else
                {
                    dynamic_field(1);
                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                }
                $('#save').attr('disabled', false);
            }
        })
 });

});
</script>