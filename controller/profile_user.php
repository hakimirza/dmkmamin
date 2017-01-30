<?php
	$msg = "";
  	$sql = "SELECT user.*, jabatan.label FROM user, jabatan WHERE user.id = jabatan.id AND user.id=".$_SESSION['iduser'].";";
  	$stmt = $conn->query($sql);
  	$result = $stmt->fetchAll();
  	$row = $result[0];
	$msg = $msg . '
	<!--Modal edit akun-->
        <div id="modal1" class="modal modal-fixed-footer" >
        <form action="controller/edit_profile.php" method="post" enctype="multipart/form-data">
          <div class="modal-content" style=" overflow-x: hidden">
            <div class="modal-evaluasi-header row">
              <div class="row valign-wrapper col m6 offset-m3" style="height:70px">
                <div class="col s3">
                  <img src="assets/images/profile/'. $row['image'] .'" alt="" class="circle responsive-img">
                </div>
                <div class="col s9">
                  <h5 class="nama" >'.$row['nama'].'</h5>
                  <h6 class="jabatan" style="font-size:15px">'.$row['label'].'</h6>
                </div>
              </div>
            </div>
            <div class="divider-horizontal" style="height:2px"></div>
            <div class="modal-evaluasi-content">
            <h5 style="text-align:center; font-weight:200">Edit Profil</h5>
              <div class="row">
			    <div class="input-field col s12">
			      <input value="'.$row['nama'].'" id="nama" name="nama" type="text" class="validate">
			      <label class="active" for="nama">Name</label>
			      <input type="hidden" name="user" value="'.$_SESSION['iduser'].'">
			    </div>
			  </div>
			  <div class="row">
			  <div class="file-field input-field">
			      <div class="btn">
			        <span>Ganti Foto</span>
			        <input type="file" name="image">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text" name="nameimage">
			      </div>
			    </div>
			    </div>
			          </div>
			          <div class="modal-footer">
			          	<input type="submit" value="Save" name="submit" id="submit" class="modal-action modal-close waves-effect waves-green btn-flat ">
			          </div>
			        </div>
			        </form>
			      </div>
	';
	echo $msg;
?>