<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
	<title>Admin Dashboard</title>
	<link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
	<link href="dist/css/style.min.css" rel="stylesheet">
	<link rel="stylesheet" href="dist/css/styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="dist/js/pages/chart/chart-page-init.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
	<style>
		.topbar .top-navbar .navbar-nav>.nav-item>.nav-link {
			padding: 15px 9px;
			font-size: 0.875rem;
			line-height: 64px;
			height: 64px;
		}

		.sidebar-nav ul .sidebar-item .sidebar-link.active{
			background: #27a9e3;
		}
	</style>
	<script>
	
	</script>
</head>

<body>
	<div id="main-wrapper">
		<header class="topbar" data-navbarbg="skin5">
			<nav class="navbar top-navbar navbar-expand-md navbar-dark">
				<div class="navbar-header" data-logobg="skin5">
					<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
					<a class="navbar-brand" href="index.php" style=" align-items: baseline;;">
						<b class=" logo-icon p-l-10">
							<img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
						</b>
						<span class="logo-text">
							<h3 class="text-center" style="font-size: inherit;"><?php echo "Admin Dashboard"; ?></h3>
						</span>
					</a>
					<a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
				</div>
				<div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
					<ul class="navbar-nav float-left mr-auto">
						<li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" </i></a></li>

					</ul>

					<ul class="navbar-nav float-right">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
							<div class="dropdown-menu dropdown-menu-right user-dd animated">
								<a class="dropdown-item" href="admin_profile.php"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
								<a class="dropdown-item" href="logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
							</div>
						</li>

					</ul>
				</div>
			</nav>
		</header>
		<aside class="left-sidebar" data-sidebarbg="skin5">
			<!-- Sidebar scroll-->
			<div class="scroll-sidebar">
				<!-- Sidebar navigation-->
				<nav class="sidebar-nav">
					<ul id="sidebarnav" class="p-t-30">

						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link active" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
						
						<li class="sidebar-item"> <a class="create-pak sidebar-link waves-effect waves-dark sidebar-link" href="create_package.php" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Create package</span></a></li>

						<li class="sidebar-item"> <a class="manage-pak sidebar-link waves-effect waves-dark sidebar-link" href="manage_package	.php" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Manage Package</span></a></li>

						<!-- <li class="sidebar-item"> <a class="add-user sidebar-link waves-effect waves-dark sidebar-link" href="add_user.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Add User</span></a></li> -->

						<li class="sidebar-item"> <a class="manage-user sidebar-link waves-effect waves-dark sidebar-link" href="manage_users.php" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Manage user</span></a></li>

						<li class="sidebar-item"> <a class="booking-details sidebar-link waves-effect waves-dark sidebar-link" href="package_booking_details.php" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Booking Details</span></a></li>

						<li class="sidebar-item"> <a class="booking-quaries sidebar-link waves-effect waves-dark sidebar-link" href="booking_quaries.php" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Booking Quaries</span></a></li>

						<li class="sidebar-item"> <a class="contact-us sidebar-link waves-effect waves-dark sidebar-link" href="contact_us.php" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Contact Us</span></a></li>

						<li class="sidebar-item"> <a class="payment sidebar-link waves-effect waves-dark sidebar-link" href="payments.php" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Payments</span></a></li>



					</ul>
				</nav>

			</div>

		</aside>

		<div class="page-wrapper">

			<div class="page-breadcrumb">
				<div class="row">
					<div class="col-12 d-flex no-block align-items-center">
						<!-- <h4 class="page-title"><a href="headerfile.php"> Dashboard </a></h4> -->

					</div>
				</div>
			</div>



