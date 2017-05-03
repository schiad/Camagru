<?php
session_start();

?>

<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<title>Camagru</title>
</head>

<body>

	<header>
		<?php include ("header.php"); ?>
	</header>

	<?php
		$target_dir = "/uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
		if(isset($_POST["submit"])) {
			echo getcwd();
			echo $target_file;
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File not an image.";
				$uploadOk = 0;
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

	<footer>
		<?php include ("footer.php"); ?>
	</footer>
	<script>
		
	</script>
</body>
</html>
