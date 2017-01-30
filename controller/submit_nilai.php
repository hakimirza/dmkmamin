<?php
	session_start();
	include "DBConnect.php";
	if (isset($_POST['idtest'])) {
		$sql1 = 'SELECT * FROM test WHERE id = ' . $_POST['idtest'] . ';';
		$retval1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_array($retval1, MYSQLI_ASSOC);
		$sql2 = 'SELECT * FROM soal WHERE idtest = ' . $_POST['idtest'] . ' ORDER BY id;';
		$retval2 = mysqli_query($conn, $sql2);
		$count2 = mysqli_num_rows($retval2);
		$sql3 = 'SELECT * FROM user WHERE nip = '.$_SESSION['nip'].';';
		$retval3 = mysqli_query($conn, $sql3);
		$row3 = mysqli_fetch_array($retval3, MYSQLI_ASSOC);
		$index_soal = 0;
		$true_value = 0;
		while ($row2 = mysqli_fetch_array($retval2, MYSQLI_ASSOC)) {
			$index_soal = $index_soal + 1;
			$getSoalName = "soal" . $index_soal;
			if ($_POST[$getSoalName] == $row2['truejawaban']) $true_value = $true_value + 1;
		}
		$varnilai = ($true_value / $count2) * 100;
		$sql = 'INSERT INTO nilai (iddimensi, idtest, iduser, nilai) VALUES ('.$row1['iddimensi'].', '.$row1['id'].', '.$row3['id'].', '.$varnilai.');';
		$retval = mysqli_query($conn, $sql);
		header("Location: ../profile.php");
		die();
	}
?>