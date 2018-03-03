 <?php

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id=$_GET["id"];
$recipe=$_GET["recipe"];

$query = "SELECT * from users where id ='$id'";
 if ($result=mysqli_query($conn,$query))
  {
   if(mysqli_num_rows($result) > 0)
    {
      $row = $result->fetch_assoc();
      $cur=$row["stage"];
      $cur=$cur + 1;
      $sql = "UPDATE users SET stage = $cur WHERE id = $id;";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated";
        }
          
    }
  else{
      $sql = "INSERT INTO users (id, recipe, stage) VALUES ($id, $recipe, '0')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $sql = "INSERT INTO log (id, recipe) VALUES ($id, $recipe)";
    $conn->query($sql);
  }
else
    echo "Query Failed.";    

$conn->close();
?> 
