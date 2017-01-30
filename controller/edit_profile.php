<?php
	include "DBConnect.php";
	if (isset($_POST['nama'])) {
		$sql = "UPDATE user SET nama='" . ucwords(strtolower(($_POST['nama'] ))). "' WHERE id=".$_POST['user'].";";
		$retval = mysqli_query($conn, $sql);
	}
	$sql2 = "SELECT image FROM user WHERE user.id=".$_POST['user'].";";
	$retval = mysqli_query($conn, $sql2);
	$row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
	$file_lama = "../assets/images/profile/".$row["image"];
	$image_file = $_POST['user'];
	$target_dir = "../assets/images/profile/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$target_file = $target_dir . $image_file .".". $imageFileType;

	if (isset($_POST['nameimage'])) {
	
			if(image_handler($target_file, $imageFileType)){
				$sql1 = "UPDATE user SET image='" . $image_file .".".$imageFileType. "' WHERE id=".$_POST['user'].";";
			}
			if (mysqli_query($conn, $sql1)) {
			    echo "Record disimpan.";
			    if ($file_lama != $target_file) {
				    if (!unlink($file_lama))
						  {
						  echo ("Error deleting $file");
						  }
						else
						  {
						  echo ("Deleted $file");
					}
				}
			} else {
			    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
			}
	}
	function image_handler($target_file, $imageFileType){
				$uploadOk = 1;
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
						$check = getimagesize($_FILES["image"]["tmp_name"]);
						if($check !== false) {
								$uploadOk = 1;
						} else {
								echo "File bukan gambar. ";
								$uploadOk = 0;
						}
				}
				// Check file size
				if ($_FILES["image"]["size"] > 1024000) {
						echo "Maaf, gambar terlalu besar. ";
						$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
						echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diijinkan. ";
						$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
						echo "File tidak diupload. ";
				// if everything is ok, try to upload file
				} else {
						if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
								echo "Gambar Cover berhasil diupload. ";
						} else {
								$uploadOk = 0;
								echo "Maaf, terjadi kegagalan saat proses Upload gambar. ";
						}
				}
				return $uploadOk==0?false:true;
	}
	header("Location: ../profile.php");
	mysqli_close($conn);

?>