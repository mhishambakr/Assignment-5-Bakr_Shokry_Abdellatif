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

if (is_numeric($id) == false) {
    echo "'$id' is not a number";
} elseif(strlen($username) > 25){
    echo "length of username should be 25 character or less";
} elseif (strlen($password) > 15){
    echo "password length should be 15 character or less";
} else{
    $query = "INSERT INTO users
    (id, email, password)
    VALUES('$id','$username','$password')";

    $result=$conn->QUERY($query); 
}

?>