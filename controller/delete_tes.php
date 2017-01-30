<?php
	include "DBConnect.php";
	if (isset($_POST['idtes_to_delete'])) {
		$sql = "DELETE FROM test WHERE id = " . $_POST['idtes_to_delete'] . ";";
		$retval = mysqli_query($conn, $sql);
		$sql1 = "DELETE FROM soal WHERE idtest = " . $_POST['idtes_to_delete'] . ";";
		$retval1 = mysqli_query($conn, $sql1);
	}
	header("Location: ../monitoring_tes.php");
	die();
?>