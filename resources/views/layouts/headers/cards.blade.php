<div class="header pb-8 pt-5 pt-md-8" style="background-color:#faeeda;">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase mb-0 font-weight-bold">Patients</h5>
                                    <p class="h2 font-weight-bold mb-0">{{session('no_of_patients')}}</p>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                        <i class="ri-empathize-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap" style="font-size:12px;">Total nos of registered patients</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase font-weight-bold mb-0">Births</h5>
                                    <p class="h2 font-weight-bold mb-0">{{session('no_of_births')}}</p>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape text-white rounded-circle shadow" style="background-color:orange;">
                                        <i class="ri-donut-chart-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                
                                <span class="text-nowrap" style="font-size:12px;">Total nos of registered births</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase font-weight-bold mb-0">Monthly Stat</h5>
                                    <p class="h2 font-weight-bold mb-0">{{session('no_of_monthly_patient')}}</p>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="ri-line-chart-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap" style="font-size:12px;">Patients treated this month</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase font-weight-bold mb-0">Antenatal</h5>
                                    <p class="h2 font-weight-bold mb-0">4</p>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="ri-pie-chart-2-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                
                                <span class="text-nowrap" style="font-size:12px;">Antenatal made this month</span>
                            </p>
                        </div>
                    </div>
                </div>
			@if (session('success'))
			 <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
               <h4> Done!!!{{session('success')}}</h4>
              </div>
			@endif
			@if (session('error'))
			 <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
               <h4> Error!!!{{session('error')}}</h4>
              </div>
			@endif
            </div>
        </div>
    </div>
</div>