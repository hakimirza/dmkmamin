<?php
	$servernamedb = "localhost";
	$usernamedb = "amin";
	$passworddb = "aft";
	$namedb = "dmkm";
	

	date_default_timezone_set('Asia/Jakarta');
	$conn;
	$connpdo;
	$statusconnection = '0';
	try {
       $conn = new PDO("mysql:host=$servernamedb;dbname=$namedb", $usernamedb, $passworddb);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $connpdo = $conn;
	}catch(PDOException $e){
		$statusconnection =  "Koneksi ke database gagal. Error :" . $e->getMessage();
	}
?>
