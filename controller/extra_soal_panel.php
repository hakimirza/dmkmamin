<?php
	if (isset($_GET['times'])) {
		echo '<div  class = "card-panel" style="border:solid teal 4px;">
				<div class="midtitle" style="color:teal;"><h5><b>#'.$_GET['times'].'</b></h5></div>
				<div class = "row">
					<div class="input-field col s12">
						<input name="soal'.$_GET['times'].'" placeholder="Pertanyaan" id="soal'.$_GET['times'].'" type="text" class="active validate" required/>
					</div>
				</div>
				<div class = "row">
					<div class="input-field col s6">
						<input name="'.$_GET['times'].'pilihan1" placeholder="Pilihan 1" id="'.$_GET['times'].'pilihan1" type="text" class="active validate" required/>
					</div>
					<div class="input-field col s6">
						<input id="radio'.$_GET['times'].'1" type="radio" name="radio'.$_GET['times'].'" value="'.$_GET['times'].'pilihan1"/>
						<label for="radio'.$_GET['times'].'1">Set Jawaban Benar</label>
					</div>
				</div>
				<div class = "row">
					<div class="input-field col s6">
						<input name="'.$_GET['times'].'pilihan2" placeholder="Pilihan 2" id="'.$_GET['times'].'pilihan2" type="text" class="active validate" required/>
					</div>
					<div class="input-field col s6">
						<input id="radio'.$_GET['times'].'2" type="radio" name="radio'.$_GET['times'].'" value="'.$_GET['times'].'pilihan2"/>
						<label for="radio'.$_GET['times'].'2">Set Jawaban Benar</label>
					</div>
				</div>
				<div class = "row">
					<div class="input-field col s6">
						<input name="'.$_GET['times'].'pilihan3" placeholder="Pilihan 3" id="'.$_GET['times'].'pilihan3" type="text" class="active validate" required/>
					</div>
					<div class="input-field col s6">
						<input id="radio'.$_GET['times'].'3" type="radio" name="radio'.$_GET['times'].'" value="'.$_GET['times'].'pilihan3"/>
						<label for="radio'.$_GET['times'].'3">Set Jawaban Benar</label>
					</div>
				</div>
				<div class = "row">
					<div class="input-field col s6">
						<input name="'.$_GET['times'].'pilihan4" placeholder="Pilihan 4" id="'.$_GET['times'].'pilihan4" type="text" class="active validate" required/>
					</div>
					<div class="input-field col s6">
						<input id="radio'.$_GET['times'].'4" type="radio" name="radio'.$_GET['times'].'" value="'.$_GET['times'].'pilihan4"/>
						<label for="radio'.$_GET['times'].'4">Set Jawaban Benar</label>
					</div>
				</div>
			</div><div id = "soal_baru' . ($_GET['times'] + 1) . '"></div>';
	}
?>