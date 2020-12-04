<!doctype html>
<html lang="en">

<head>
	<title>3Gs House | Trang chủ</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="admin-assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="admin-assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin-assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="admin-assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="admin-assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('admin.layout.header-navbar')
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		@include('admin.layout.menu-left-sidebar')
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@yield('main-container')
				</div>
			</div>
			<!-- MAIN CONTENT-->
		</div>
		<!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="admin-assets/vendor/jquery/jquery.min.js"></script>
	<script src="admin-assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="admin-assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="admin-assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="admin-assets/scripts/klorofil-common.js"></script>
	<script>
		$(function() {
			var options;

			var data = {
				labels: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ Nhật'],
				series: [
					[200, 200, 300, 100, 150, 140, 600],
				]
			};

			options = {
				height: "300px",
				axisX: {
					showGrid: false
				},
			};

			new Chartist.Bar('#demo-bar-chart', data, options);

		});
	</script>
</body>

</html>