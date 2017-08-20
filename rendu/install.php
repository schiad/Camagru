<?php
include("connect.php");
echo "install...\n";
if (!mysql_select_db("camagru", $sql))
{
	echo "Can t select database\n";
} else {
	echo "Database selected\n";
}
$cmd = "CREATE TABLE Articles (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, ms5name VARCHAR(40) NOT NULL, text VARCHAR(10000), create_date DATE, last_modification DATE, visits INT)";

   if (mysql_query($cmd, $sql)) {
	   echo "Table created";
   } else { 
	   echo "Error creating table: " . mysql_error($sql);
   }

?>
