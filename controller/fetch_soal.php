<?php
	$msg = "";
	$msg = $msg . '<div class="row"><form method = "POST" action = "controller/submit_nilai.php" class="col s12">';
	$count_check = 0;
	if (!isset($_POST['idtes_to_fetch'])) $msg = "Tes tidak ditemukan.";
	else {
		$sql = "SELECT * FROM soal WHERE idtest = " . $_POST['idtes_to_fetch'] . " ORDER BY id;";
		$retval = mysqli_query($conn, $sql);
		$count_check = mysqli_num_rows($retval);
		$numbering = 0;
		while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
			$numbering = $numbering + 1;
			$msg = $msg . '<div class="card-panel" style="border: solid teal 4px;color: teal;">
							<div class="midtitle" style="color:teal;"><h5><b>#'.$numbering.'</b></h5></div>
							<div class="row">
								<div class="input-field col s12">
									<p>
										' . $row['question'] . '
									</p>';
			$jawaban_index = 0;
			$options = explode(',', $row['jawaban']);
			$n = count($options);
			for ($i = 0; $i < $n; $i++) {
				$jawaban_index = $jawaban_index + 1;
				$msg = $msg . '<p>
									<input id="soal' . $numbering . $jawaban_index . '" type="radio" name="soal' . $numbering . '" value="' . $options[$i] . '"/>
									<label for="soal' . $numbering . $jawaban_index . '">' . $options[$i] . '</label>
								</p>';
			}
			$msg = $msg . '</div>
							</div>
				</div>';
		}
	}
	if ($count_check == 0) echo '<br/><div class="card-panel soalcard">Tidak ditemukan soal.</div>';
	else echo $msg . '<input type="hidden" name="idtest" value="' . $_POST['idtes_to_fetch'] . '"/>
						<input type="submit" value="Submit" class="waves-effect waves-light btn"/>
					</form></div>';
?>