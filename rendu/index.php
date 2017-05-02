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

	<div id="page_body">
		<div id="content">
			<p style="display:inline">Main page</p>
			<?php include ("main.php"); ?>
		</div>
		<div id="side">
			<?php include ("side.php"); ?>
		</div>
	</div>

	<footer>
		<?php include ("footer.php"); ?>
	</footer>
	<script>
		
	</script>
</body>
</html>