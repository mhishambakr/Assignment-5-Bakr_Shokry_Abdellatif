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



$query = "SELECT concat(em.lastName) as emLastName, concat(em.firstName) as emFirstName, concat(manag.lastName) as managLastName, concat(manag.firstName) as managFirstName
FROM employees as em JOIN managers as manag
ON em.reportsTo = manag.employeeNumber";


$result=$conn->QUERY($query);

echo "Employers and their managers:<br>";
echo "<br>";

if ($result->num_rows > 0) { 
    
    while($row = $result->fetch_assoc()) { 
        echo " || ".$row["emLastName"].", ".$row["emFirstName"]." || ".$row["managLastName"].", ".$row["managFirstName"]." || "."<br>";
    }
} else {
    echo "0 results";
}
?>