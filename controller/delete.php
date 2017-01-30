<?php
session_start();
include_once 'connection.php';
	if(isset($_POST['idtodelete'])){
		$idredirect = $_POST['redirect'];
		$idsesuatu = $_POST['idtodelete'];
		$table = $_POST['table'];
		$key = $_POST['key'];
		$count = $conn->exec("DELETE FROM $table WHERE $key = '$idsesuatu'");
		if($count){
			$_SESSION['message'] = "Hapus berhasil";
		}else{
			$_SESSION['message'] = "Hapus gagal";
		}
		header('Location: '.$idredirect);
	}
	
?>