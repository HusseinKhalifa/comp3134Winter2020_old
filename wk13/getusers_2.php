<form action="getusers_2.php" method='GET'>
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname"><br>
  <input type="submit" value="Submit">
</form> 
<?php
// Set up error display
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// DB Config
$servername = "localhost";
$username = "dbusername";
$dbname = "comp3134db";
$db_password = "dbpassword";
// connect to database
$conn = new mysqli($servername, $username, $db_password, $dbname);
if($conn->connect_error){
   die("Connection failed: " . $conn->connect_error);
}
// Get data from form
if(isset($_GET['fname'])){
 $fname = $_GET['fname'];
$active=1;
// Query the users table
$stmt = $conn->prepare("SELECT * FROM users WHERE firstname=? AND active=?");
$stmt->bind_param("si", $fname,$active);
$stmt->execute();
// Create a while loop to display results in a table
echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Username</th>";
echo "<th>Email</th>";
echo "<th>First Name</th>";
echo "<th>Last Name</th>";
echo "<th>Active</th>";
echo "</tr>";
$result = $stmt->get_result();
if($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['username']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['firstname']."</td>";
    echo "<td>".$row['lastname']."</td>";
    echo "<td>".$row['active']."</td>";
    echo "</tr>";
}
}
else {
  echo "0 results";
}
$stmt->close();
$conn->close();

}
else {
 $fname = "";
}
?>
