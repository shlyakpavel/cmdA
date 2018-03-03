 <?php


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$instruction=$_POST["instruction"];
$rid=$_POST["rid"];
$args=$_POST["args"];
$stage=$_POST["stage"];

$query = "INSERT INTO data (rid, instruction, args,stage) VALUES ($rid, $instruction, '$args', $stage)";
echo $query;
 if ($result=mysqli_query($conn,$query))
  {
        echo "OK";
  }
else
    echo "Query Failed.";
    
    

$conn->close();
?> 
 
