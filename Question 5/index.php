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



$query = "SELECT products.productName, SUM(orderdetails.quantityOrdered), SUM(orderdetails.quantityOrdered * orderdetails.priceEach)
FROM orderdetails JOIN products
ON products.productCode = orderdetails.productCode
GROUP BY products.productName
ORDER BY SUM(orderdetails.quantityOrdered) DESC
LIMIT 2";


$result=$conn->QUERY($query);

echo "Most sold products:<br>";
echo "<br>";

if ($result->num_rows > 0) { 
    
    while($row = $result->fetch_assoc()) { 
        echo " || ".$row["productName"]." || ".$row["SUM(orderdetails.quantityOrdered)"]." || ".$row["SUM(orderdetails.quantityOrdered * orderdetails.priceEach)"]." || "."<br>";
    }
} else {
    echo "0 results";
}
?>