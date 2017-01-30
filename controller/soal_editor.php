<?php
	$msg = "";
	$msg = $msg . '<div  class = "card-panel">
						<div class = "row">
							<div class="input-field col s12">
								<input name="judul" placeholder="Judul" id="judul" type="text" form="testingform" class="active validate" required/>
								<label for="judul">Judul</label>
							</div>
						</div>
						<div class = "row">
							<div class="input-field col s12" style="color:#d5d5d5;">
								Deadline:
							</div>
							<div class="input-field col s6">
								<input name="deadline" placeholder="Deadline" id="deadline" type="datetime-local" required/>
							</div>
						</div>
						<div class = "row">
							<div class="input-field col s6">
									<p>Ujian ini ditujukan untuk:</p>';
	$sql = "SELECT * FROM jabatan WHERE 1;";
	$retval = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
		$msg = $msg . '<p>
							<input id="' . $row['id'] . 'jabatan" type="radio" name="jabatan" value="' . $row['id'] . '"/>
							<label for="' . $row['id'] . 'jabatan">' . $row['label'] . '</label>
						</p>';
	}
	$msg = $msg . '</div><div class="input-field col s6"><p>Ujian ini untuk menilai:</p>';
	$sql1 = "SELECT * FROM dimensi WHERE 1;";
	$retval1 = mysqli_query($conn, $sql1);
	while ($row = mysqli_fetch_array($retval1, MYSQLI_ASSOC)) {
		$msg = $msg . '<p>
							<input id="' . $row['id'] . 'dimensi" type="radio" name="dimensi" value="' . $row['id'] . '"/>
							<label for="' . $row['id'] . 'dimensi">' . $row['labeldimensi'] . '</label>
						</p>';
	}
	$msg = $msg . '</div></div></div>';
	echo $msg;
?>