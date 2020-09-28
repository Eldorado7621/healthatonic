<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('dashboard') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
			
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                       <i class="ri-dashboard-line" style="color:#19204d;font-size:20px;"></i> {{ __('Dashboard') }}
                    </a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="{{route('getNeeds')}}">
                       <i class="ri-service-line" style="color:#19204d;font-size:20px;"></i> {{ __('Need Indicator ') }}
                    </a>
                </li>
			
				<li class="nav-item">
                    <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#tips">
                        <i class="ri-health-book-line" style="color:#19204d;font-size:20px;"></i>{{ __('Health Tips') }}
                    </a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#cphc">
                        <i class="ri-hospital-line"  style="color:#19204d;font-size:20px;"></i>{{ __('Create PHC') }}
                    </a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="#maint_schedule" data-toggle="collapse">
                        <i class="ri-calendar-todo-line" style="color:#19204d;font-size:20px;"></i>
                        <span class="nav-link-text" >{{ __(' Maintenance Schedule ') }}</span>
                    </a>

                    <div class="collapse" id="maint_schedule">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#add_maint_schedule">
                                    {{ __(' Add Schedule') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('viewMaintenanceSchedule',['all'=>0,])}}" >
                                    {{ __('View ') }}
                                </a>
                            </li>
							  <li class="nav-item">
                                <a class="nav-link" href="{{route('viewMaintenanceSchedule',['all'=>1,])}}" >
                                    {{ __('View All ') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="#referal" data-toggle="collapse">
                        <i class="ri-file-paper-2-line" style="color:#19204d;font-size:20px;"></i>
                        <span class="nav-link-text" >{{ __(' Referral ') }}</span>
                    </a>

                    <div class="collapse" id="referal">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#add_refferal">
                                    {{ __(' Add Referral') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('viewReferral',['all'=>0,])}}" >
                                    {{ __('View ') }}
                                </a>
                            </li>
							  <li class="nav-item">
                                <a class="nav-link" href="{{route('viewReferral',['all'=>1,])}}" >
                                    {{ __('View All ') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Patients</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
			  
                <li class="nav-item">
                    <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#pat_reg">
                       <i class="ri-user-heart-line" style="color:#19204d;font-size:20px;"></i> Register Patient
                    </a>
                </li>
				 <li class="nav-item">
                    <a class="nav-link" href="{{route('getAllPatients')}}">
                        <i class="ri-folder-user-line"style="color:#19204d;font-size:20px;"></i> View Patients
                    </a>
                </li>
				 <li class="nav-item">
                    <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#pat_rec">
                        <i class="ri-empathize-line" style="color:#19204d;font-size:20px;"></i> Attend to Patient
                    </a>
                </li>
				
				<li class="nav-item">
                    <a class="nav-link" href="#navbar-follow_up" data-toggle="collapse">
                        <i class="ri-donut-chart-line"style="color:#19204d;font-size:20px;"></i>
                        <span class="nav-link-text" >{{ __(' Follow-up ') }}</span>
                    </a>

                    <div class="collapse" id="navbar-follow_up">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link"  href="{{route('follow_up')}}">
                                    {{ __(' Check Follow-up') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('viewFollowupReport')}}" >
                                    {{ __('View Report') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
				  <li class="nav-item">
                    <a class="nav-link " href="#mat" data-toggle="collapse" >
                        <i class="ri-women-line" style="color:#19204d;font-size:20px;"></i>
                        <span class="nav-link-text" >{{ __(' Maternity Care ') }}</span>
                    </a>
                    <div class="collapse" id="mat">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#antenatal">
                                    {{ __(' Registration') }}
                                </a>
								
									
								
                            </li>
							<li class="nav-item">
								<a class="nav-link " href="#ca" data-toggle="collapse" >
									<span class="nav-link-text" >{{ __('  View Record ') }}</span>
								</a>
									<div class="collapse" id="ca">
										<ul class="nav nav-sm flex-column">
										<li class="nav-item">
											<a class="nav-link" href="{{route('viewActiveRec')}}">
											{{ __(' Active Record') }}
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="{{route('viewAllRec',['phc'=>session('phc_id')])}}" >
											{{ __(' All Record') }}
											</a>
										</li>
										</ul>
									</div>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="#cav" data-toggle="collapse" >
									<span class="nav-link-text" >{{ __('  Create Schedule ') }}</span>
								</a>
									<div class="collapse" id="cav">
										<ul class="nav nav-sm flex-column">
										<li class="nav-item">
											<a class="nav-link" href="{{route('getSmsSchedulePatients')}}">
											{{ __(' SMS') }}
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="{{route('getSchedulePatients')}}" >
											{{ __(' EMAIL') }}
											</a>
										</li>
										</ul>
									</div>
							</li>
                        </ul>
						
                    </div>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="#navbar-examples" data-toggle="collapse">
                        <i class="ri-donut-chart-line"style="color:#19204d;font-size:20px;"></i>
                        <span class="nav-link-text" >{{ __(' Birth ') }}</span>
                    </a>

                    <div class="collapse" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#birthReg">
                                    {{ __(' Birth Registration') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('viewBirthReg')}}" >
                                    {{ __('View Birth Record') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="#immun" data-toggle="collapse">
                        <i class="ri-medicine-bottle-line"style="color:#19204d;font-size:20px;"></i>
                        <span class="nav-link-text" >{{ __(' Immunization ') }}</span>
                    </a>

                    <div class="collapse" id="immun">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#birthReg">
                                    {{ __('Registration') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('viewBirthReg')}}" >
                                    {{ __('View Immunization Record') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
               
            </ul>
			 <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Inventory</h6>
			  <ul class="navbar-nav mb-md-3">
			  
                <li class="nav-item">
                    <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#pat_reg">
                        <i class="ri-tv-2-line"style="color:#19204d;font-size:20px;"></i> Dashboard
                    </a>
                </li>
					<li class="nav-item">
                    <a class="nav-link" href="#medcine" data-toggle="collapse">
                        <i class="ri-capsule-line"style="color:#19204d;font-size:20px;"></i>
                        <span class="nav-link-text" >{{ __(' Medicine ') }}</span>
                    </a>

                    <div class="collapse" id="medcine">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#addmedicinecat">
                                    {{ __('Add New Category') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('viewMedCat')}}" >
                                    {{ __('View Categories') }}
                                </a>
                            </li>
							 <li class="nav-item">
                                <a class="nav-link" href="{{route('addMed')}}">
                                    {{ __('Add Medicine') }}
                                </a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="{{route('viewMed')}}">
                                    {{ __('Medicine Store') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="#sales" data-toggle="collapse">
                        <i class="ri-database-2-line"style="color:#19204d;font-size:20px;"></i>
                        <span class="nav-link-text" >{{ __(' Sale ') }}</span>
                    </a>

                    <div class="collapse" id="sales">
                        <ul class="nav nav-sm flex-column">
						  <li class="nav-item">
                                <a class="nav-link" href="{{route('sales')}}" >
                                    {{ __('New Sale') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('viewSales')}}">
                                    {{ __('View Sales') }}
                                </a>
                            </li>
                          
							
                        </ul>
                    </div>
                </li>
			  </ul>
	
        </div>
    </div>
</nav>
