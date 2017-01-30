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
		<script type="text/javascript" src="controller/tambah_soal.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Buat Soal</title>
        <link rel="icon" href="assets/images/logo-bps.png" sizes="32x32">
	</head>
	<body>
		<?php include "controller/DBConnect.php";?>
		<?php include "view/essential.php";?>
		<div id="content" class="container row">
			<div class="midtitle col s12"><h3>Buat Soal</h3></div>
			<form id="testingform" name="testingform" method = "POST" action = "controller/create_soal.php">
				<?php include "controller/soal_editor.php";?>
				<div id="soal_baru"></div>
				<div class="row">
					<a class="waves-effect waves-light btn col s12" onClick="newSoal()">+ Tambah Soal</a>
				</div>
				<div class="row">
					<button type="submit" class="waves-effect waves-light btn col s12">Publish >>></button>
				</div>
			</form>
		</div>
	</body>
</html>