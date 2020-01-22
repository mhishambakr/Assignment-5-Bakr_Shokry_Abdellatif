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

$name = $_GET["name"];

$query = "SELECT customerName
FROM customers
WHERE customerName LIKE '%$name%'";


$result=$conn->QUERY($query); 

echo "Customers with the name $name:<br>";
echo "<br>";

if ($result->num_rows > 0) { 
    
    while($row = $result->fetch_assoc()) { 
        echo " || ".$row["customerName"]." || "."<br>";
    }
} else {
    echo "0 results";
}
?>