<p>Side space still in building</p>

<div class="gallery">
<?php
$width = 200;
$height = 200;

$extensions = array(".jpg", ".jpeg", ".png", ".gif");
$files = scandir("uploads");
#print_r ($files);
foreach($files as &$file)
{
	foreach ($extensions as &$ext)
	{
		if (strrpos(strtolower($file), $ext) == (strlen($file) - strlen($ext)) && !(strrpos(strtolower($file), $ext)) == FALSE)
		{
			if (!file_exists("./vignettes/" . $file))
			{
				set_time_limit(300);
				list($width_orig, $height_orig) = getimagesize("./uploads/" . $file);

				$ratio_orig = $width_orig/$height_orig;
				if ($width/$height > $ratio_orig) {
					$width = $height*$ratio_orig;
				} else {
					$height = $width/$ratio_orig;
				}

				$image_p = imagecreatetruecolor ($width, $height);
				if (!strcmp($ext, ".jpeg") || !strcmp($ext, ".jpg")){
					$image = imagecreatefromjpeg("./uploads/" . $file);
				} elseif (!strcmp($ext, ".png")){
					$image = imagecreatefrompng("./uploads/" . $file);
				} elseif (!strcmp($ext, ".gif")){
					$image = imagecreatefromgif("./uploads/" . $file);
				}
				if ($image != FALSE)
				{
					imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
					if (!strcmp($ext, ".jpeg") || !strcmp($ext, ".jpg")){
						imagejpeg($image_p, "./vignettes/" . $file);
					} elseif (!strcmp($ext, ".png")){
						imagepng($image_p, "./vignettes/" . $file);
					} elseif (!strcmp($ext, ".gif")){
						imagegif($image_p, "./vignettes/" . $file);
					}
				}
			}
			echo '<div class="image">';
			echo '<a href="index.php?page=View&img='. $file . '">';
			echo '<img src="./vignettes/';
			echo $file;
			echo '" alt="' . $file . '"/>';
			echo '</a>';
			echo '</div>';
		}
	}
}
?>
</div>
