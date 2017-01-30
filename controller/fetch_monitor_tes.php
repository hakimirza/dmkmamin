<?php
	$msg = "";
	$msg = $msg . '<table class="bordered highlight">
				<thread>
					<th>No</th>
					<th>Judul</th>
					<th>Untuk</th>
					<th>Dimensi</th>
					<th>Deadline</th>
					<th>Submiter</th>
					<th>Action</th>
				</thread>
				<tbody>';
	$sql = "SELECT * FROM test;";
	$retval = mysqli_query($conn, $sql);
	$count_check = mysqli_num_rows($retval);
	$numbering = 0;
	while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
		$numbering = $numbering + 1;
		$sql1 = "SELECT * FROM nilai WHERE idtest = '" . $row['id'] . "';";
		$retval1 = mysqli_query($conn, $sql1);
		$count_check1 = mysqli_num_rows($retval1);
		$sql2 = "SELECT * FROM jabatan WHERE id = " . $row['idjabatan'];
		$retval2 = mysqli_query($conn, $sql2);
		$label_jabatan = mysqli_fetch_array($retval2, MYSQLI_ASSOC);
		$sql3 = "SELECT * FROM dimensi WHERE id = " . $row['iddimensi'];
		$retval3 = mysqli_query($conn, $sql3);
		$label_dimensi = mysqli_fetch_array($retval3, MYSQLI_ASSOC);
		$input_to_disable = "";
		if ($count_check1 != 0) $input_to_disable = ' style="background-color:#9e9e9e;" disabled';
		$msg = $msg . '<tr>
							<td>' . $numbering . '</td>
							<td>' . $row['judul'] . '</td>
							<td>' . $label_jabatan['label'] . '</td>
							<td>' . $label_dimensi['labeldimensi'] . '</td>
							<td>' . $row['deadline'] . '</td>
							<td>' . $count_check1 . '</td>
							<td>
								<form method = "POST" action = "controller/delete_tes.php">
									<input type="hidden" name="idtes_to_delete" value="' . $row['id'] . '"/>
									<input type="submit" value="Delete"' . $input_to_disable . '/>
								</form>
							</td>
						</tr>';
	}
	if ($count_check == 0) echo "Tidak ditemukan tes.";
	else echo $msg . '</tbody></table>';
?>