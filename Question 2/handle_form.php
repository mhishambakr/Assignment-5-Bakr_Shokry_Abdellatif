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

$id = $_GET["id"];

$query = "SELECT *
FROM customers
WHERE customerNumber = $id";


$result=$conn->QUERY($query); 

echo "Customers with id = $id:<br>";
echo "<br>";

if ($result->num_rows > 0) { 
    
    while($row = $result->fetch_assoc()) { 
        echo " || ".$row["customerNumber"]." || ".$row["customerName"]." || ".$row["contactLastName"]." || ".$row["contactFirstName"]." || ".$row["phone"]." || ".$row["addressLine1"]." || ".$row["addressLine2"]." || ".$row["city"]." || ".$row["state"]." || ".$row["postalCode"]." || ".$row["country"]." || ".$row["salesRepEmployeeNumber"]." || ".$row["creditLimit"]." || "."<br>";
    }
} else {
    echo "0 results";
}
?>