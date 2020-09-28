@extends('layouts.app')

@section('content')
 
    @include('layouts.headers.cards')
   
			
    <div class="container-fluid mt--7">
	
        <div class="row">
		        <div class="col-xl-7">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="text-uppercase font-weight-bold ls-1 mb-1">Number of patients attended to monthly</h5>
                              
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
				
					 
					 @for($i=0;$i<12;$i++)
						 @if(session('height'.$i)==0)
							<div style="float:left;margin-top:250px;padding-right:15px;">
					          <p style="margin-top:0px;">0</p>
					          <canvas id="myCanvas" width="10" height="1" style="border-radius:5px;background-color:red;">
					          </canvas>
					          <h5>{{$month[$i]}}
                              </h5>
					        </div>
						 @else
					     <div style="float:left;margin-top:{{session('margin_top'.$i)}}px;padding-right:15px;">
					      <p>{{session('value'.$i)}}</p>
					      <canvas id="myCanvas" width="10" height="{{session('height'.$i)}}" style="border-radius:5px;background-color:red;">
					 
					      </canvas>
					      <h5>{{$month[$i]}}</h5>
					     </div>
					  @endif
					 @endfor
					 
                    </div>
                </div>
            </div>
            <div class="col-xl-5 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Sales value</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
   

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
 