<!DOCTYPE html>
<html> 
 <head>
  <title>MOrsik</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="tonkusha.css">
  <script>
function xxx() {
    var f = document.createElement("form");
    f.setAttribute('method',"post");
    f.setAttribute('action',"addrecipe.php");
    f.setAttribute('target',"dummyframe");
    
    //hidden rid
    var hrid = document.createElement("input"); //input element, text
    hrid.setAttribute('type',"text");
    hrid.setAttribute('name',"rid");
    var element = document.getElementById("rid");
    hrid.value = <?php echo $_GET["rid"]?>;
    hrid.style.display = 'none';
    
    var stage = document.createElement("input"); //input element, text
    stage.setAttribute('type',"text");
    stage.setAttribute('name',"stage");
    
    var cmd = document.createElement("input"); //input element, text
    cmd.setAttribute('type',"text");
    cmd.setAttribute('name',"instruction");
    
    var i = document.createElement("input"); //input element, text
    i.setAttribute('type',"text");
    i.setAttribute('name',"args");

    var s = document.createElement("input"); //input element, Submit button
    s.setAttribute('type',"submit");
    s.setAttribute('value',"Edit");
    
    var del = document.createElement("input"); //input element, Submit button
    del.setAttribute('type',"button");
    del.setAttribute('value',"X");
    del.addEventListener("click", function(){
    this.parentNode.setAttribute('action', "rmrecipe.php")
    this.parentNode.submit()
    document.body.removeChild(this.parentNode);
}, false);

    f.appendChild(stage);
    f.appendChild(cmd);
    f.appendChild(hrid);
    f.appendChild(i);
    f.appendChild(s);
    f.appendChild(del);

//and some more input elements here
//and dont forget to add a submit button

document.getElementsByTagName('body')[0].appendChild(f);
}
</script>

 </head>
  <body>
   <!--form action="http://shlyakpavel.tk/arhack/addrecipe.php" method="POST"-->
<select id="rid" onchange="document.location='manage.php?rid=' + this.options[this.selectedIndex].value.replace(/[^0-9]/g,'')">
  <option>Рецепт 1</option>
  <option>Рецепт 2</option>
  <option>Рецепт 3</option>
  <option>Рецепт 4</option>
  <option>Рецепт 5</option>
  </select>
  <button onclick="xxx()">Добавить пункт</button>
  <iframe width="100" height="30" border="0" name="dummyframe" id="dummyframe"></iframe>

   <?php
$servername = "localhost";
$username = "root";
$password = "impassible";
$dbname = "arhack";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$rid=$_GET["rid"];

//Connect to data db
$sql = "SELECT * from data where rid ='$rid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
          echo '<form method="post" action="addrecipe.php" target="dummyframe"><input name="stage" type="text" value="'.$row["stage"].'"><input name="instruction" type="text" value="'.$row["instruction"].'"><input name="rid" style="display: none;" type="text" value="'.$rid.'"><input name="args" type="text" value="'.$row["args"].'"><input value="Edit" type="submit"><input value="X" type="button" onclick="this.parentNode.setAttribute(\'action\', \'rmrecipe.php\');    this.parentNode.submit(); document.body.removeChild(this.parentNode);"></form>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>

  </body>  
</html> 
