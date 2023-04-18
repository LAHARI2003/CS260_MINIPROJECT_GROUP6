<?php
//using mysqli exetension
$servername ="localhost";
$username ="root";
$password ="";
$db="placementdb";

//create connection
$conn = mysqli_connect($servername,$username,$password,$db);
// mysqli_query($conn,$db);
if(!$conn) {
    die("Sorry, we failed to connect: ".mysqli_connect_error());
}
else{
    echo "Connection was successful";
}

?>