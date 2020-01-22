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

$query = "SELECT customerName
FROM customers
WHERE creditLimit > 20000";


$result=$conn->QUERY($query); 

echo "Customers with credit limit > 20000:<br>";
echo "<br>";

if ($result->num_rows > 0) { 
    
    while($row = $result->fetch_assoc()) { 
        echo $row["customerName"]."<br>";
    }
} else {
    echo "0 results";
}
?>