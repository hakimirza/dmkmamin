<?php
	$msg = "";
	$msg = $msg . '<table class="bordered">
				<thread>
					<th>No</th>
					<th>Tes</th>
					<th>Aksi</th>
				</thread>
				<tbody>';
	$sql2 = 'SELECT * FROM user WHERE nip = "'.$_SESSION['nip'].'";';
	$retval2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_array($retval2, MYSQLI_ASSOC);
	$sql = 'SELECT * FROM test WHERE deadline >= CURDATE() AND idjabatan = '.$row2['idjabatan'].';';
	$retval = mysqli_query($conn, $sql);
	$count_check = mysqli_num_rows($retval);
	$numbering = 0;
	while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
		$numbering = $numbering + 1;
		$sql1 = "SELECT * FROM nilai WHERE idtest = " . $row['id'] . ";";
		$retval1 = mysqli_query($conn, $sql1);
		$count_check1 = mysqli_num_rows($retval1);
		$input_to_disable = ' value="Kerjakan"';
		if ($count_check1 > 0) $input_to_disable = ' value="Selesai" style="background-color:#9e9e9e;" disabled';
		$msg = $msg . '<tr>
							<td>' . $numbering . '</td>
							<td>' . $row['judul'] . '</td>
							<td>
								<form method = "POST" action = "kerjakansoal.php">
									<input type="hidden" name="idtes_to_fetch" value="' . $row['id'] . '"/>
									<input type="submit"' . $input_to_disable . '/>
								</form>
							</td>
						</tr>';
	}
	if ($count_check == 0) echo "Tidak ditemukan tes.";
	else echo $msg . '</tbody></table>';
?>