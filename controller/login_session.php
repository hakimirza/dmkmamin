<?php
	session_start();
	include "DBConnect.php";
	$redirect = "../index.php";
	if (isset($_POST['username']) && isset($_POST['password'])) {
		echo "this";
		$sql = 'SELECT * FROM user WHERE nip = "'.$_POST['username'].'" AND password = "'.$_POST['password'].'";';
		$retval = mysqli_query($conn, $sql);
		$count_row = mysqli_num_rows($retval);
		if ($count_row == 1) {
			$row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
			$_SESSION['nip'] = $_POST['username'];
			$_SESSION['iduser'] = $row['id'];
			if ($row['idjabatan'] == 1) $redirect = "../monitor.php";
			else $redirect = "../profile.php";
			echo $_SESSION['nip'];
		}
	}
	header("Location: ".$redirect);
	die();
?>