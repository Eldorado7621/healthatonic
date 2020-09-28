<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PHC Digital System') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
		
		<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
		
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
		
 </head>
 <body>
 <style>
      body {
        font-family: 'Poppins';
        font-size: 16px;
      }
    </style>
  @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
           

        @guest()
            @include('layouts.footers.guest')
        @endguest
		@include('layouts.modals.needs-select-phc')
		@include('layouts.modals.view-need')
		@include('layouts.modals.add-medicine-category')
		@include('layouts.modals.antenatal-registration')
		@include('layouts.modals.birth-registration')
		@include('layouts.modals.health-tips')
		@include('layouts.modals.create-phc-modal')
		@include('layouts.modals.patient-register')
		@include('layouts.modals.view-patient-record')
		@include('layouts.modals.add-maintenance-schedule')
		@include('layouts.modals.add-referral')
		
 <div class="header pb-8 pt-5 pt-md-12" style="background-color:#faeeda;">
    <div class="container-fluid">
	
        <div class="row mt-5">
            <div class="col-xl-12 mb-8 mb-xl-0">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Patients Data</h3>
                            </div>
							  
							  <div class="form-group mb-0 navbar-search navbar-search-white form-inline mr-3 d-none d-md-flex ml-lg-auto">
                               
                               </div>
                            
                        </div>
                    </div>
                <div class="table-responsive" >  
                     <table id="user_table" class="table align-items-center table-flush table-striped" >  
					 <thead class="thead-light">
                          <tr>  
                               <th width="20%">Name</th>  
                               <th width="10%">Unique ID</th>  
                               <th width="15%">Phone Number</th>  
                               <th width="35%">Options</th>  
                          </tr>  
					 </thead>
                     </table>  
                </div>  
         
                </div>
            </div>
           
        </div>
    </div>
</div>
  </div>
 
 </body>
</html>
<!-- change cphc-- Modal -->

	<div class="modal modal-default fade" id="formModal" tabindex="-1" role="dialog" aria-pledby="myModalp">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
		    <h4 class="modal-title">Add New Record</h4>
		  <button type="button" class="close" data-dismiss="modal" aria-p="Close"><span aria-hidden="true">&times;</span></button>
         
      </div>
	 <!--modal body-->
	  <div class="modal-body">
	   <div style="margin-top:-20px;">
	    <span id="form_result"></span>
	 <form method="post" id="sample_form" class="form-horizontal">
	   @csrf
	   <input type="hidden" name="id" value="" />
	       <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
			 <p class="text-white">Name</p>
			 <div class="input-group input-group-alternative mb-3">
			  <input class="text-black form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('name') }}" type="text" name="name" id="name"  value="" style="color:black;" required autofocus>
                           
            </div>
			  @if ($errors->has('name'))
                   <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                    </span>
                   @endif
            </div>
			 <div class="form-group{{ $errors->has('phnNo') ? ' has-danger' : '' }}">
			 <p class="text-white">Phone Number</p>
			  <div class="input-group input-group-alternative mb-3">
			  <input class="text-black form-control{{ $errors->has('phnNo') ? ' is-invalid' : '' }}" placeholder="{{ __('phnNo') }}" type="number" name="phnNo" id="phnNo" value="" style="color:black;" required autofocus>
                             
            </div>
			  @if ($errors->has('phnNo'))
                   <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('phnNo') }}</strong>
                    </span>
                   @endif
            </div>
			 <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
			 <p class="text-white">Address</p>
			  <div class="input-group input-group-alternative mb-3">
			  <input class="text-black form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('address') }}" type="text" name="address" id="address" value="" style="color:black;" required autofocus>
                             
            </div>
			  @if ($errors->has('address'))
                   <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                    </span>
                   @endif
            </div>
			 <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
			 <p class="text-white">Email</p>
			  <div class="input-group input-group-alternative mb-3">
			  <input class="text-black form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('email') }}" type="email" name="email" id="email" value="" style="color:black;" required autofocus>
                             
            </div>
			  @if ($errors->has('email'))
                   <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                   @endif
            </div>
			
		  <div class="form-group" align="center">
                 <input type="hidden" name="action" id="action" value="Add" />
                 <input type="hidden" name="patid" id="patid" />
                 <input type="hidden" name="hidden_id" id="hidden_id" />
                 <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                </div>
	   </form>
	   </div>
       </div>
	   <div class="modal-footer">
                 
		</div>
       
    </div>
  </div>
  </div>
	
<!--modal ends-->

<script>
$(document).ready(function(){

 $('#user_table').DataTable({
  processing: true,
  serverSide: true,
  ajax: {
	
   url: "{{ route('sample.index') }}",
  },
  columns: [
   {
    data: 'name',
    name: 'name'
   },
   {
    data: 'username',
    name: 'username'
   },
    {
    data: 'phnNo',
    name: 'phnNo'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

 $('#create_record').click(function(){
  $('.modal-title').text('Add New Record');
  $('#action_button').val('Add');
  $('#action').val('Add');
  $('#form_result').html('');

  $('#formModal').modal('show');
 });

 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  var action_url = '';

  if($('#action').val() == 'Add')
  {
   action_url = "{{ route('sample.store') }}";
  }

  if($('#action').val() == 'Edit')
  {
	
   action_url = "{{ route('postPatientEdit') }}";
  }

  $.ajax({
	
   url: action_url,
   method:"post",
   data:$(this).serialize(),
   dataType:"json",
   success:function(data)
   {
    var html = '';
    if(data.errors)
    {
     html = '<div class="alert alert-danger">';
     for(var count = 0; count < data.errors.length; count++)
     {
      html += '<p>' + data.errors[count] + '</p>';
     }
     html += '</div>';
    }
    if(data.success)
    {
     html = '</br><div class="alert alert-success">' + data.success + '</div>';
     $('#sample_form')[0].reset();
     $('#user_table').DataTable().ajax.reload();
    }
    $('#form_result').html(html);
   }
  });
 });

 $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
	  
   url :"sample/"+id+"/edit",
   dataType:"json",
   success:function(data)
   {
	 $('#name').val(data.result.name);
    $('#phnNo').val(data.result.phnNo);
    $('#email').val(data.result.email);
    $('#address').val(data.result.address);
    $('#patid').val(data.result.id);
    $('.modal-title').text('Edit Record');
    $('#action_button').val('Edit');
    $('#action').val('Edit');
    $('#formModal').modal('show');
   }
  })
 });

 var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"sample/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
     alert('Data Deleted');
    }, 2000);
   }
  })
 });

});
</script>

