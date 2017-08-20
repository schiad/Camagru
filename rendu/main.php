<?php 

session_start();

?>

<p id="js">Hello World</p>

<form action="./index.php" method="POST" enctype="multipart/form-data">
<div class="gallery">
<div class="image">
<input type="radio" name="mask" onclick="enable();" value="barbe1.png">
<img src="./img_src/barbe1.png" alt="barbe1"/>
</div>
<div class="image">
<input type="radio" name="mask" onclick="enable();" value="barbe2.png"><br>
<img src="./img_src/barbe2.png" alt="barbe2"/>
</div>
</div>
<?php
$extensions = array(".jpg", ".jpeg", ".png", ".gif");
$target_dir = "./uploads/";
<<<<<<< HEAD
$file_name = md5_file($_FILES["fileToUpload"]["tmp_name"]);
$target_file = $target_dir . $file_name; 
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
if(isset($_POST["submit"])) {
#			echo "<p>" . getcwd() . "</p>";
#			echo $target_file;
#			echo "<br>" . var_dump($_FILES);
#			echo "<br> tmp name:" . $_FILES["fileToUpload"]["tmp_name"] . "\n";
=======
if (strlen($_FILES["fileToUpload"]["tmp_name"])) {
	$target_file = $target_dir . md5_file($_FILES["fileToUpload"]["tmp_name"]);
}
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
if(isset($_POST["submit"]) && strlen($_FILES["fileToUpload"]["tmp_name"])) {
	#			echo "<p>" . getcwd() . "</p>";
	#			echo $target_file;
	#			echo "<br>" . var_dump($_FILES);
	#			echo "<br> tmp name:" . $_FILES["fileToUpload"]["tmp_name"] . "\n";
>>>>>>> b7928dbff18edddf4a4592829ee98eecac45c45c
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	$ext_ok = 0;

	foreach ($extensions as &$ext)
	{
		if (strrpos(strtolower($_FILES["fileToUpload"]["name"]), $ext) == (strlen($_FILES["fileToUpload"]["name"]) - strlen($ext)) && !(strrpos(strtolower($_FILES["fileToUpload"]["name"]), $ext) == FALSE))
		{
			$ext_ok = 1;
			$target_file = $target_file . $ext;
			$file_name = $file_name . $ext;
		}
	}
	$uploadOk = ($check !== false && $ext_ok);
	if (!$check)
	{
		echo "<p class=error>File is not an image.<br>";
		echo $_FILES["fileToUpload"]["name"] . "<br></p>";
		$uploadOk = 0;
	}
	if ($uploadOk == 0)
	{
		echo "<p class=error>File is not uploaded</p>";
	} else {
		if (file_exists($target_file)) {
			echo "<p class=error>Error it's seem files already exists.</p>";
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
<<<<<<< HEAD
=======
				echo "<p style='color:green'>The file " . basename( $_FILES["fileToUpload"]["name"]) . "Has been uploaded</p>";
				$dest = imagecreatefrompng($target_file);
				$src  = imagecreatefrompng($_POST['image']);
				imagecopymerge($dest, $src, 0, 0, 0, 0, 100, 100, 100);
				imagepng($target_file);
>>>>>>> b7928dbff18edddf4a4592829ee98eecac45c45c
				echo "<img src='" . $target_file . "' width='100%' alt='target'>";
				$text = $_POST["details"];
				echo "details";
				$CMD = sprintf("INSERT INTO Articles VALUES (0, '%s', '%s', '%s', '%s', 0)", $file_name ,$text , date('Y-m-d'), date('Y-m-d'));
				$result = mysql_query($CMD, $sql);
				if ($result)
				{
					echo 'OK Added';
				} else 
				{
					echo "Error create line" . mysql_error($sql);
				}
			} else {
				echo "<p style='color:red'>Error when moving file.</p>";
			}
		}
	}
}

?>

<p>Select image to upload:</p>
<form action="upload.php" method="post" enctype="multipart/form-data">
<input type="text" name="details" value="Enter text"><br>
<input width="100" type="file" name="fileToUpload" id="fileToUpload">
<br>
<input type="submit" value="Upload Image" name="submit">
</form>
<br>
<div id="page_body">
</div>

<div class="class_div">
<input id="shot" type="submit" onclick="check_validate();" value="shot">
</div>
</form>

<script>
var i;
i = 0;
document.getElementById('shot').disabled = true;

function check_validate()
{
	if (document.getElementById('shot').getAttribute('disabled') == true)
	{
		alert("Please choose a mask !!!!");
	}
	alert ("Hello");
}

function enable()
{
	document.getElementById('shot').disabled = false;
}

function my_func()
{
	i += 1;
	var text;
	text = 'Hello World ' + i;
	document.getElementById('js').innerHTML = text;
}

</script>

<span onclick="my_func();">test</span>

