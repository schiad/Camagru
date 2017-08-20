<?php

if ($_GET["page"] == "View")
{
	if (file_exists("./uploads/" . $_GET["img"]) && strlen($_GET["img"]) > 0 && strrpos($_GET["img"], "..") === false)
	{
		echo '<img src="./uploads/' . $_GET["img"] . '" width="100%" alt="' . $_GET["img"] . '"/>';
		$CMD = sprintf("SELECT * FROM Articles WHERE ms5name = '%s'", mysql_real_escape_string($_GET["img"]));
		$result = mysql_query($CMD, $sql);
		$nb = mysql_num_rows($result);
		if ($nb == 0) {
			$CMD = sprintf("INSERT INTO Articles (ms5name, text) VALUES ('%s', 'Auto add\n')", mysql_real_escape_string($_GET["img"]));
			$result = mysql_query($CMD, $sql);
			echo "Error";
		} else {
			while ($row = mysql_fetch_assoc($result)) {
				$CMD = sprintf("UPDATE Articles SET visits = %d WHERE ms5name='%s'", ($row["visits"] + 1), mysql_real_escape_string($_GET["img"]));
				echo "<p class='success'>";
				echo $row["text"] . "<br>";
				echo "</p>";
				echo "<p class='success'>";
				echo "Created on: " . $row["create_date"] . "<br>";
				echo "Modified on: " . $row["last_modification"] . "<br>";
				echo "</p>";
				echo "<p class='success'>";
				echo "Visits : " . ($row["visits"] + 1) . ".";
				echo "</p>";
			} 
			$result2 = mysql_query($CMD, $sql);
		}
	}
	else
	{
		echo "<p class='error'>File not found.</p>";
		if (strrpos($_GET["img"], "..") !== false) {
			echo "<p class='error'> Don t try to hack me plz.</p>";
		}
	}
}
?>
