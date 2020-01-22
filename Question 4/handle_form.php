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

$customer = $_GET["customer"];

$query = "SELECT COUNT(orders.orderNumber), customers.customerName
FROM orders JOIN customers
ON customers.customerNumber = orders.customerNumber
WHERE customerName LIKE '%$customer%'
GROUP BY customers.customerName";

$result=$conn->QUERY($query); 

echo "Orders of $customer:<br>";
echo "<br>";

if ($result->num_rows > 0) { 
    
    while($row = $result->fetch_assoc()) { 
        echo " || ".$row["customerName"]." || ".$row["COUNT(orders.orderNumber)"]." || "."<br>";
    }
} else {
    echo "0 results";
}
?>