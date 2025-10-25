<?php declare(strict_types=1);

list($width, $height) = getSizes();
list($r, $g, $b) = getColor();

// Set the content type header to indicate this is a PNG image
header('Content-Type: image/png');

$image = imagecreate($width, $height);

// Define some colors
$back = imagecolorallocate($image, $r, $g, $b); // Background color
$black = imagecolorallocate($image, 0, 0, 0);       // Black text
$red = imagecolorallocate($image, 255, 0, 0);       // Red rectangle

// Fill the background with the specified color
imagefill($image, 0, 0, $back);

// Draw a red rectangle
imagerectangle($image, 10, 10, $width-10, $height-10, $red);

// Add some text to the image
$text = "$r,$g,$b";
$font = 5; // Built-in GD font (1-5)
$text_x = (int)(($width - imagefontwidth($font) * strlen($text)) / 2);
$text_y = (int)(($height - imagefontheight($font)) / 2);
imagestring($image, $font, $text_x, $text_y, $text, $black);

// Output the image as PNG
imagepng($image);

// Free up memory
imagedestroy($image);

function getSizes(): array
{
	// Get the size parameter from the query string
	$size = $_GET['size'] ?? '100x100';
	// Parse the size parameter (format: WIDTHxHEIGHT)
	$dimensions = explode('x', $size);

	// Validate and set dimensions
	if (count($dimensions) === 2 && is_numeric($dimensions[0]) && is_numeric($dimensions[1])) {
		$width = max(1, min(2000, intval($dimensions[0])));  // Limit to reasonable size
		$height = max(1, min(2000, intval($dimensions[1]))); // Limit to reasonable size
	} else {
		// Default size if invalid format
		$width = 100;
		$height = 100;
	}
	return [$width, $height];
}

function getColor(): array
{
    $values = explode(',', $_GET['color'] ?? '239,255,239');
    
    if (count($values) !== 3) return [239, 255, 239];
    
    $result = array_map(
		fn($v) => 
		min(max(0,(int)($v)),255), 
		$values
	);
    return $result;
}