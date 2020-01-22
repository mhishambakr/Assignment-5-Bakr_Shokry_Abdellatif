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

$query = "SELECT COUNT(orderdetails.quantityOrdered), orderdetails.orderNumber, customers.customerName
FROM orderdetails JOIN orders JOIN customers
ON orderdetails.orderNumber = orders.orderNumber AND orders.customerNumber = customers.customerNumber
WHERE orderdetails.productCode = '$id'
GROUP BY orderdetails.orderNumber
ORDER BY customers.creditLimit DESC";


$result=$conn->QUERY($query); 

echo "Customers with id = $id:<br>";
echo "<br>";

if ($result->num_rows > 0) { 
    
    while($row = $result->fetch_assoc()) { 
        echo " || ".$row["COUNT(orderdetails.quantityOrdered)"]." || ".$row["orderNumber"]." || ".$row["customerName"]." || "."<br>";
    }
} else {
    echo "0 results";
}
?>