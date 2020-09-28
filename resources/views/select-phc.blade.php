@extends('layouts.app-select-phc', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>
                                <h2>Please select the Primary Health Center District</h2>
                            </small>
                            <br>
                            
                        </div>
                     <form method="post" action="{{route('getPhc')}}">
	      @csrf
			<div class="form-group{{ $errors->has('phc') ? ' has-danger' : '' }}">
			 <label class="text-white">PHC</label></br>
			   <div class="input-group input-group-alternative mb-3">
				<select type="text" name="phc" class="form-control" value={{old('phc')}}>
					
					@foreach(Auth::user()->phcs as $phc)
					 <option value="{{$phc->id}}">{{$phc->name}}</option>
					@endforeach
				</select>
			   </div>
                 @if ($errors->has('phc'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('phc') }}</strong>
                  </span>
                 @endif
            </div>
			
			<input type="submit" value="OK" class="btn btn-success"/>
		</form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
