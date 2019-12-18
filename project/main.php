<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "learnen";
// Create connection
//$conn = new mysqli($servername, $username, $password);

// Check connection
/*if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "Connected to sql successfully <br>";
}*/
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
  echo "Connected to databas successfully <br>";
}

if(isset($_POST["events"])){
 $arr=($_POST['events']);
 for($i=0;$i<count($arr);$i++){
    $keyname=$arr[$i]['keyname'];
    $keytarget=$arr[$i]['keytarget'];
    $pressdate=$arr[$i]['pressdate'];
    
    $sql="Insert Into eventlocal values('$keyname','$keytarget','$pressdate')";
    $conn->query($sql);
  }
  if($conn->affected_rows > 0){
    echo "Inserted Successfully";
  }
  else{
    echo "Sorry: Problem With Insertion";	
  } 
  }
  if(isset($_GET['events'])){
    $sql = "Select keyname,keytarget,pressdate from eventlocal"; 
    if ($result = $conn->query($sql)){
      if($result->num_rows > 0){
        echo "<table border='1px'><tr><th>KEY NAME</th><th>KEY TARGET</th><th>DATE</th></tr>";
       while($row = $result->fetch_assoc()){
        echo "<tr><td>" . $row["keyname"]. "</td><td>" 
        . $row["keytarget"]. "</td><td>".$row["pressdate"]."</td></tr>";
   }}
   else
   {
    echo "No Data to Retrieve";
   }
  }
  } 
?>