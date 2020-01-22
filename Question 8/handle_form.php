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

$min = $_GET["min"];
$max = $_GET["max"];

$query = "SELECT productName, quantityInStock
FROM products
WHERE quantityInStock <= $max
AND quantityInStock >= $min";


$result=$conn->QUERY($query); 

echo "Products with quantities betwee $min and $max:<br>";
echo "<br>";

if ($result->num_rows > 0) { 
    
    while($row = $result->fetch_assoc()) { 
        echo " || ".$row["productName"]." || ".$row["quantityInStock"]." || "."<br>";
    }
} else {
    echo "0 results";
}
?>