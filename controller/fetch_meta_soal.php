<?php
	$sql = "SELECT * FROM test WHERE id = " . $_POST['idtes_to_fetch'] . ";";
	$retval = mysqli_query($conn, $sql);
	$count_check = mysqli_num_rows($retval);
	$row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
	$sql1 = "SELECT * FROM soal WHERE idtest = " . $_POST['idtes_to_fetch'] . ";";
	$retval1 = mysqli_query($conn, $sql1);
	$count_check1 = mysqli_num_rows($retval1);
	$sql2 = "SELECT * FROM dimensi WHERE id = " . $row['iddimensi'] . ";";
	$retval2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_array($retval2, MYSQLI_ASSOC);
	$msg = "";
	$msg = $msg . '<div class="row">
						<div class="card-panel col s12">
							<div class="row">
								<div class="midtitle col s12">
									<h5>
										<b>' . $row['judul'] . '</b>
									</h5>
								</div>
							</div><hr/>
							<div class="row"><b>
								<div class="col s5">
									<div class="midtitle">Deadline</div>
								</div>
								<div class="col s1">
									<div class="midtitle">:</div>
								</div>
								<div class="col s5">
									<div class="midtitle">' . $row['deadline'] . '</div>
								</div>
								<div class="col s5">
									<div class="midtitle">Jumlah Soal</div>
								</div>
								<div class="col s1">
									<div class="midtitle">:</div>
								</div>
								<div class="col s5">
									<div class="midtitle">' . $count_check1 . '</div>
								</div>
								<div class="col s5">
									<div class="midtitle">Penilaian</div>
								</div>
								<div class="col s1">
									<div class="midtitle">:</div>
								</div>
								<div class="col s5">
									<div class="midtitle">' . $row2['labeldimensi'] . '</div>
								</div></b>
							</div>
						</div>
					</div>';
	echo $msg;
?>