<?php



$servername = "localhost"; 
$dbuser = "root";
$dbpassword = ""; 
$dbname = "route_backend";



$conn = new mysqli($servername,$dbuser,$dbpassword,$dbname); 
if ($conn->connect_error){
    die("Connection failed: ".$conn->connect_error); 
} else{
    //echo "connected successfully";
}


//======================================QUERY======================================

$id = $_POST["id"];
$username = $_POST["username"];
$password = $_POST["password"];

$query = "INSERT INTO users
(id, email, password)
VALUES('$id','$username','$password')";


$result=$conn->QUERY($query); 



 
?>