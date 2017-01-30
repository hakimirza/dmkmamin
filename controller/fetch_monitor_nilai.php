<?php
	$msg = "";
	$msg = $msg . '<table class="bordered highlight">
				<thread>
					<th>No</th>
					<th>Nama</th>
					<th>Jabatan</th>
					<th>Judul</th>
					<th>Nilai</th>
					<th>Timestamp</th>
				</thread>
				<tbody>';
	$sql = "SELECT * FROM nilai;";
	$retval = mysqli_query($conn, $sql);
	$count_check = mysqli_num_rows($retval);
	$numbering = 0;
	while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
		$numbering = $numbering + 1;
		$sql1 = "SELECT * FROM user WHERE id = " . $row['iduser'] . ";";
		$retval1 = mysqli_query($conn, $sql1);
		$user_name = mysqli_fetch_array($retval1, MYSQLI_ASSOC);
		$sql2 = "SELECT * FROM jabatan WHERE id = " . $user_name['idjabatan'] . ";";
		$retval2 = mysqli_query($conn, $sql2);
		$user_jabatan = mysqli_fetch_array($retval2, MYSQLI_ASSOC);
		$sql3 = "SELECT * FROM test WHERE id = " . $row['idtest'] . ";";
		$retval3 = mysqli_query($conn, $sql3);
		$test_to_label = mysqli_fetch_array($retval3, MYSQLI_ASSOC);
		$msg = $msg . '<tr>
							<td>' . $numbering . '</td>
							<td>' . $user_name['nama'] . '</td>
							<td>' . $user_jabatan['label'] . '</td>
							<td>' . $test_to_label['judul'] . '</td>
							<td>' . $row['nilai'] . '</td>
							<td>' . $row['timestamp'] . '</td>
						</tr>';
	}
	if ($count_check == 0) echo "Tidak ditemukan nilai.";
	else echo $msg . '</tbody></table>';
?>