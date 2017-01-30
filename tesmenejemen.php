<!DOCTYPE html>
<html>
	<head>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="assets/css/custom.css"  media="screen,projection"/>
		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/materialize.min.js"></script>
		<script src="assets/js/highcharts.js"></script>
		<script src="assets/js/highcharts-more.js"></script>
		<script src="assets/js/exporting.js"></script>
		<script type="text/javascript" src="controller/sidemenu.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Test Management</title>
      	<link rel="icon" href="assets/images/logo-bps.png" sizes="32x32">
	</head>
	<body>
		<?php include "controller/DBConnect.php";?>
		<?php include "view/essential.php";?>
		<div id="content" class="container">
			<div class="midtitle"><h3>Kerjakan Tes</h3></div>
			<?php include "controller/fetch_available_soal.php";?>
		</div>
	</body>
</html>