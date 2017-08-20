<?php
	$sql = mysql_connect("127.0.0.1", "root", "Salim1987");

	if (!$sql)
	{
		echo "Cant connect to sql";
		die('Error :' . mysql_error());
	}
	else
	{
		#echo "Connected to sql...\n";
	}
	if (!mysql_select_db('camagru', $sql)) {
		echo "Table error\n";
		echo "Error : ". mysql_error();
		exit();
	}
	else {
		#echo "Camagru tatabase selected\n";
	}
?>
