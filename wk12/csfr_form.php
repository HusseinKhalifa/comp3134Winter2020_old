<?php
session_start();
$_SESSION['confirmation'] = 'undefined';
?>

<body onload="sendData()">
    <form action="csfr_action.php" method="POST">
	<input type="text" name="confirmation" value=<?php echo $_SESSION['confirmation'];?>>
        <label for="fname">Username:</label><br>
        <input type="text" name="username" value="host"><br>
        <label for="lname">Password:</label><br>
        <input type="text" name="password" value="pass"><br><br>
        <button id ="submit" type="submit" value="Submit">
      </form> 
</body>
<script>
function sendData() {
    document.getElementById("submit").click();
  }
</script>

