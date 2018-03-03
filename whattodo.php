 <?php
//pass

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_GET["id"];
$sql = "SELECT * from users where id ='$id'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
$rid=$row["recipe"];
$stage=$row["stage"];
//echo $rid . $stage;

//Connect to data db
$sql = "SELECT * from data where rid ='$rid' && stage='$stage'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["instruction"]."\n";
        echo $row["args"]."\n";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
