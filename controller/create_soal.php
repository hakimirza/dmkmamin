<?php
	include "DBConnect.php";
	if (isset($_POST['judul'])) {
		$date_time_explode = explode("T", $_POST['deadline']);
		$structured_deadline = $date_time_explode[0]." ".$date_time_explode[1].":00";
		$sql = 'INSERT INTO test (judul, idjabatan, deadline, iddimensi) VALUES ("'.$_POST['judul'].'", '.$_POST['jabatan'].', "'.$structured_deadline.'", '.$_POST['dimensi'].');';
		$retval = mysqli_query($conn, $sql);
		$sql2 = 'SELECT * FROM test WHERE judul = "'.$_POST['judul'].'";';
		$retval2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_array($retval2, MYSQLI_ASSOC);
		$soal_index = 0;
		$jawaban_index = 0;
		while (1) {
			$soal_index += 1;
			$structured_jawaban = "";
			if (isset($_POST['soal'.$soal_index])) {
				for ($i = 1; $i <= 4; $i++) {
					if ($i != 1) $structured_jawaban .= ",";
					$structured_jawaban .= $_POST[$soal_index.'pilihan'.$i];
				}
				$sql1 = 'INSERT INTO soal (question, jenis, jawaban, truejawaban, idtest) VALUES ("'.$_POST['soal'.$soal_index].'", 1, "'.$structured_jawaban.'", "'.$_POST[$_POST['radio'.$soal_index]].'", '.$row2['id'].');';
				$retval1 = mysqli_query($conn, $sql1);
			}
			else break;
		}
	}
	header("Location: ../monitoring_tes.php");
	die();
?>