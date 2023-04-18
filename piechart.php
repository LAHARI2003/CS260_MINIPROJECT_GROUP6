<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "placementdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the data from the database
$sql = "SELECT company, COUNT(*) as count FROM details WHERE placed = 'Yes' GROUP BY company";
$result = $conn->query($sql);

$data = array();

while($row = $result->fetch_assoc()) {
    $r= $row['company'];
    $data[$r] = $row['count'];
}

// Calculate the total number of students placed
$total = array_sum($data);

// Calculate the percentage of students placed in each company
$labels = array_keys($data);
$sizes = array();
foreach ($data as $count) {
    $sizes[] = $count / $total * 100;
}

// Create the pie chart using the GD library
$width = 400;
$height = 400;

$image = imagecreatetruecolor($width, $height);
$background_color = imagecolorallocate($image, 255, 255, 255);
$border_color = imagecolorallocate($image, 0, 0, 0);

imagefill($image, 0, 0, $background_color);
imageellipse($image, $width/2, $height/2, $width, $height, $border_color);

$angle = 0;
foreach ($sizes as $key => $size) {
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    $start_angle = $angle;
    $end_angle = $start_angle + $size * 3.6;
    imagefilledarc($image, $width/2, $height/2, $width-40, $height-40, $start_angle, $end_angle, $color, IMG_ARC_PIE);
    $x = ($width/2) + cos(deg2rad(($start_angle + $end_angle)/2)) * ($width/4);
    $y = ($height/2) + sin(deg2rad(($start_angle + $end_angle)/2)) * ($height/4);
    imagefilledellipse($image, $x, $y, 20, 20, $color);
    imagettftext($image, 12, 0, $x+25, $y, $color, "arial.ttf", $labels[$key]);
    $angle = $end_angle;
}

header('Content-type: image/png');
imagepng($image);
imagedestroy($image);

$conn->close();
?>