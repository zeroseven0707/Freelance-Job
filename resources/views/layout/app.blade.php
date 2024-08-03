<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
        <meta name="description" content="{{ $settings->meta_description ?? 'Default Meta Description' }}">
        <!-- loader-->
        <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('assets/js/pace.min.js') }}"></script>
      
        <!--plugins-->
        <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
      
        <!-- CSS Files -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
      
        <!--Theme Styles-->
        <link href="{{ asset('assets/css/dark-theme.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/semi-dark.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/header-colors.css') }}" rel="stylesheet" />
        <script defer src="https://unpkg.com/alpinejs@latest/dist/cdn.min.js"></script>
		@php
			$settings = App\Models\Setting::first();
		@endphp
        <title>{{ $settings->web_name ?? 'Default Title' }}</title>
		@if($settings && $settings->favicon)
        	<link rel="icon" href="{{ asset('images/' . $settings->favicon) }}">
    	@endif
      </head>
  <body>
    

 <!--start wrapper-->
    <div class="wrapper">
       <!--start sidebar -->
    <aside class="sidebar-wrapper" data-simplebar="true">
		<div class="sidebar-header">
		  <div>
			@if($settings && $settings->logo)
            <img src="{{ asset('images/' . $settings->logo) }}" class="logo-icon" alt="Logo">
        	@endif
		  </div>
		  <div>
			<h4 class="logo-text">{{ $settings->web_name ?? '' }}</h4>
		  </div>
		</div>
		<!--navigation-->
        @if (auth()->user()->role == 'admin')
            <ul class="metismenu" id="menu">
            <li>
                <a href="/admin/dashboard">
                <div class="parent-icon">
                    <ion-icon name="home-outline"></ion-icon>
                </div>
                <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li class="menu-label">Data</li>
            <li>
                <a href="/admin/keywords">
                <div class="parent-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
						<path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"/>
						<path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
					</svg>
                </div>
                <div class="menu-title">Keywords</div>
                </a>
            </li>
            <li>
                <a href="/admin/content-ideas">
                <div class="parent-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-text-indent-right" viewBox="0 0 16 16">
						<path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m10.646 2.146a.5.5 0 0 1 .708.708L11.707 8l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708zM2 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
					  </svg>
                </div>
                <div class="menu-title">Content Ideas</div>
                </a>
            </li>
            <li class="menu-label">Monitoring</li>
            <li>
                <a href="/admin/freelancers">
                <div class="parent-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
						<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
					  </svg>
                </div>
                <div class="menu-title">Freelancers</div>
                </a>
            </li>
			<li>
                <a href="/settings">
                <div class="parent-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
						<path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
						<path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
					  </svg>
                </div>
                <div class="menu-title">Setting</div>
                </a>
            </li>
            </ul>
        @else
        <ul class="metismenu" id="menu">
            <li>
                <a href="/freelance/dashboard">
                <div class="parent-icon">
                    <ion-icon name="home-outline"></ion-icon>
                </div>
                <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li class="menu-label">Data</li>
            <li>
                <a href="/freelance/keywords">
                <div class="parent-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
						<path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"/>
						<path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
					</svg>
                </div>
                <div class="menu-title">Keywords</div>
                </a>
            </li>
            <li>
                <a href="/freelance/content-ideas">
                <div class="parent-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-text-indent-right" viewBox="0 0 16 16">
						<path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m10.646 2.146a.5.5 0 0 1 .708.708L11.707 8l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708zM2 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
					  </svg>
                </div>
                <div class="menu-title">Content Ideas</div>
                </a>
            </li>
            </ul>
        @endif
		<!--end navigation-->
	</aside>
	  <!--end sidebar -->
  
	  <!--start top header-->
	  <header class="top-header">
		<nav class="navbar navbar-expand gap-3">
		  <div class="toggle-icon">
			<ion-icon name="menu-outline"></ion-icon>
		  </div>
		  <form class="searchbar">
			<div class="position-absolute top-50 translate-middle-y search-icon ms-3">
			  <ion-icon name="search-outline"></ion-icon>
			</div>
			<input class="form-control" type="text" placeholder="Search for anything">
			<div class="position-absolute top-50 translate-middle-y search-close-icon">
			  <ion-icon name="close-outline"></ion-icon>
			</div>
		  </form>
		  <div class="top-navbar-right ms-auto">
  
			<ul class="navbar-nav align-items-center">
			  <li class="nav-item">
				<a class="nav-link dark-mode-icon" href="javascript:;">
				  <div class="mode-icon">
					<ion-icon name="moon-outline"></ion-icon>
				  </div>
				</a>
			  </li>
			  <li class="nav-item dropdown dropdown-user-setting">
				<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
				  <div class="user-setting">
					<img src="{{ asset('assets/images/avatars/07.png') }}" class="user-img" alt="">
				  </div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
				  <li>
					<a class="dropdown-item" href="javascript:;">
					  <div class="d-flex flex-row align-items-center gap-2">
						<img src="{{ asset('assets/images/avatars/06.png') }}" alt="" class="rounded-circle" width="54" height="54">
						<div class="">
						  <h6 class="mb-0 dropdown-user-name">{{ auth()->user()->name }}</h6>
						  <small class="mb-0 dropdown-user-designation text-secondary">{{ auth()->user()->email }}</small>
						</div>
					  </div>
					</a>
				  </li>
				  <li>
					<a class="dropdown-item" href="javascript:;">
					  <div class="d-flex align-items-center">
						<div class="">
						  <ion-icon name="log-out-outline"></ion-icon>
						</div>
						<div class="ms-3">
                            <form action="{{ route('login.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="border-0" style="background: none;">Logout</button>
                            </form>
                        </div>
					  </div>
					</a>
				  </li>
				</ul>
			  </li>
  
			</ul>
  
		  </div>
		</nav>
	  </header>
	  <!--end top header-->


        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">
			@yield('content')
   		</div>
          <!-- end page content-->
         </div>
         


         <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><ion-icon name="arrow-up-outline"></ion-icon></a>
			 <!--End Back To Top Button-->
	  
			 <!--start switcher-->
			 <div class="switcher-body">
				<button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><ion-icon name="color-palette-sharp" class="me-0"></ion-icon></button>
				<div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
				  <div class="offcanvas-header border-bottom">
					<h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
					<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
				  </div>
				  <div class="offcanvas-body">
					<h6 class="mb-0">Theme Variation</h6>
					<hr>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
					  <label class="form-check-label" for="LightTheme">Light</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
					  <label class="form-check-label" for="DarkTheme">Dark</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDark" value="option3">
					  <label class="form-check-label" for="SemiDark">Semi Dark</label>
					</div>
					<hr/>
					<h6 class="mb-0">Header Colors</h6>
					<hr/>
					<div class="header-colors-indigators">
					  <div class="row row-cols-auto g-3">
						<div class="col">
						  <div class="indigator headercolor1" id="headercolor1"></div>
						</div>
						<div class="col">
						  <div class="indigator headercolor2" id="headercolor2"></div>
						</div>
						<div class="col">
						  <div class="indigator headercolor3" id="headercolor3"></div>
						</div>
						<div class="col">
						  <div class="indigator headercolor4" id="headercolor4"></div>
						</div>
						<div class="col">
						  <div class="indigator headercolor5" id="headercolor5"></div>
						</div>
						<div class="col">
						  <div class="indigator headercolor6" id="headercolor6"></div>
						</div>
						<div class="col">
						  <div class="indigator headercolor7" id="headercolor7"></div>
						</div>
						<div class="col">
						  <div class="indigator headercolor8" id="headercolor8"></div>
						</div>
					  </div>
					</div>
					<hr/>
					<h6 class="mb-0">Sidebar Colors</h6>
					<hr/>
					<div class="header-colors-indigators">
					  <div class="row row-cols-auto g-3">
						<div class="col">
						  <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
						</div>
						<div class="col">
						  <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
						</div>
						<div class="col">
						  <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
						</div>
						<div class="col">
						  <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
						</div>
						<div class="col">
						  <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
						</div>
						<div class="col">
						  <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
						</div>
						<div class="col">
						  <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
						</div>
						<div class="col">
						  <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			   </div>
			   <!--end switcher-->


         <!--start overlay-->
          <div class="overlay nav-toggle-icon"></div>
         <!--end overlay-->

     </div>
  <!--end wrapper-->


  

 <!-- JS Files-->
 <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
 <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
 <!--plugins-->
 <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
 <script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/easyPieChart/jquery.easypiechart.js') }}"></script>
 <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
 <script src="{{ asset('assets/js/index.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
 <script src="{{ asset('assets/js/table-datatable.js') }}"></script>
 <!-- Main JS-->
 <script src="{{ asset('assets/js/main.js') }}"></script>
  </body>
</html>