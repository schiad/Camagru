<?php

	if ($_GET["page"] == "View")
	{
		if (file_exists("./uploads/" . $_GET["img"]) && strlen($_GET["img"]) > 0 && strrpos($_GET["img"], "..") === false)
		{
			echo '<img src="./uploads/' . $_GET["img"] . '" width="100%" alt="' . $_GET["img"] . '"/>';
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
