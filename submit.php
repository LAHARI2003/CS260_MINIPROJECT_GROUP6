<?php
$p=$_POST['rollno'];
$a=$_POST['firstname'];
$b=$_POST['lastname'];
$c=$_POST['email'];
$d=$_POST['password'];
$e=$_POST['confirmpassword'];
$servername= "localhost";
$username = "root";
$password="";
$dbname = "dblab8";
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);


//check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection succesful";
$sql = "INSERT INTO 'register' ('rollno', 'firstname','lastname','email','password') VALUES ('$p', '$a','$b','$c','$d')";

if($conn->query($sql) === TRUE){
    echo "Record created successfully";
} else {
    echo "Error: " . $sql . "<br" . $conn->error;
}

$conn->close();
?>
