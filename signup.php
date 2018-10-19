<html>
<?php include 'header.php'; ?></div>
<?php

$email = $erremail = $succ = "";
$hash = md5( rand(0,1000) );
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = htmlspecialchars($_POST["email"]);
	$email = trim($email);
	$email = stripslashes($email);
	
	if (empty($email)) {
    $erremail = "Email is required";
  } else {
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erremail = "Invalid email format";
    }
  }
  if (empty($erremail)){
	$link = "'http://localhost/movie/register.php?email='.$email.'&hash'.$hash";
	$msg = "'use this link to sign up' .$link";
	$headers = "From: admin@congomovies.ml";
	if (mail($email,"Register",$msg, $headers)){
		$succ = "Email has been sent to your email id, check it out!";
	}
  }
  	//database connection.
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO temp (Email, Hash)
VALUES ('". mysql_escape_string($email) ."', 
'". mysql_escape_string($hash) ."');";

$conn->query($sql);

$conn->close();
}
?>

<body>

<div style="	position: absolute;
	right: 0;
	top: 0;
	left: 0;"><?php include 'header.php'; ?></div>
<div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Email Address : <input type="text" name="email"><br><br>
<?php echo $erremail; ?><br><br>
<input type="submit" value="Sign Up">
</form>
<?php echo $email ?><br>
<?php echo $succ ?>
</div>
<div style="body {
	position: absolute;
	right: 0;
	bottom: 0;
	left: 0;
}"><?php include 'footer.php'; ?></div>

</body>
</html>



