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

$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT ID FROM users
WHERE email = '$username'
AND password = '$password'";


$result=$conn->QUERY($query); 

if ($result->num_rows > 0) { 
    
    echo "Logged in successfully";

}else{
    echo "try again";
}
?>