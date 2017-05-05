<?php
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	if(isset($_POST["submit"])) {
		echo "<p>" . getcwd() . "</p>";
		echo $target_file;
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "<p>File is an image - " . $check["mime"] . ".</p>";
			$uploadOk = 1;
		} else {
			echo "<p>File not an image.</p>";
			$uploadOk = 0;
		}
		if ($uploadOk == 0)
		{
			echo "<p style='color:red;'>Not uploaded</p>";
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "<p style='color:green'>The file " . basename( $_FILES["fileToUpload"]["name"]) . "Has been uploaded</p>";
			} else {
				echo "<p style='color:red'>Error to move file.</p>";
			}
		}
	}
?>

<div id="page_body">
	<form action="upload.php" method="post" enctype="multipart/form-data">
	    Select image to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload Image" name="submit">
	</form>
</div>
