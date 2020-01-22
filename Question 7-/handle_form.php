<?php



$servername = "localhost"; 
$dbuser = "root";
$dbpassword = ""; 
$dbname = "route_backend_company";



$conn = new mysqli($servername,$dbuser,$dbpassword,$dbname); 
if ($conn->connect_error){
    die("Connection failed: ".$conn->connect_error); 
} else{
    //echo "connected successfully";
}


//======================================QUERY======================================

$city = $_GET["city"];

$query = "SELECT customerName
FROM customers
WHERE city = '$city'
ORDER BY customerName";


$result=$conn->QUERY($query); 

echo "Customers from $city:<br>";
echo "<br>";

if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) { 
        echo " || ".$row["customerName"]." || "."<br>";
    }
} else {
    echo "0 results";
}
?>