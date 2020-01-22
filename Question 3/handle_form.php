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

$word = $_GET["word"];

$query = "SELECT * 
FROM products
WHERE productName LIKE '%$word%'";


$result=$conn->QUERY($query); 

echo "Products with the '$word':<br>";
echo "<br>";

if ($result->num_rows > 0) { 
    
    while($row = $result->fetch_assoc()) { 
        echo " || ".$row["productCode"]." || ".$row["productName"]." || ".$row["productLine"]." || ".$row["productScale"]." || ".$row["productVendor"]." || ".$row["productDescription"]." || ".$row["quantityInStock"]." || ".$row["buyPrice"]." || ".$row["MSRP"]." || "."<br>";
    }

} else {
    echo "0 results";
}
?>