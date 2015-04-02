<?php
$preset = $_GET["preset"];
$r = validateParam("r", 255);
$g = validateParam("g", 255);
$b = validateParam("b", 255);
$a = validateParam("a", 127);
switch ($preset) {
	case (1) :
		$r = 0; $g = 0; $b = 0; $a = 26; // black 80%
		break;
	case (2) :
		$r = 54; $g = 54; $b = 54; $a = 6; // #333333 95%
		break;
}
$size = 1;

$image   = imagecreatetruecolor($size, $size);
imagealphablending($image, false);
imageSaveAlpha($image, true);
$color = imagecolorallocatealpha($image, $r, $g, $b, $a);
imagefilledrectangle($image, 0, 0, $size-1, $size-1, $color);
header("Content-Type: image/png");
imagepng($image);
imagedestroy($image);

function validateParam($key, $max) {
	$value = $_GET[$key];
	if (is_numeric($value))
		switch ($value) {
			case ($value < 0) : return 0;
			case ($value >= $max) : return $max;
			default: return $value;
		}
	else
		return 0;
}
?>