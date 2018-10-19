<?php

$fname = $lname = $pass = $rpass = $email = "";
$errfname = $errlname = $erremail = $errpass = $errrpass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// firstname validation.
	$fname = htmlspecialchars($_POST["fname"]);
	$fname = trim($fname);
	$fname = stripslashes($fname);
	
  if (empty($fname)) {
    $errfname = "First Name is Mandatory";
  } else {
		if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
		$errfname = "Only letters allowed within First Name field";
		}
  }
   // last name validation.
	$lname = htmlspecialchars($_POST["lname"]);
	$lname = trim($lname);
	$lname = stripslashes($lname);
	
  if (empty($lname)) {
    $errlname = "Last Name is Mandatory";
  } else {
		if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
		$errlname = "Only letters allowed within Last Name field";
		}
  }
   // email validation.
	$email = htmlspecialchars($_POST["email"]);
	$email = trim($email);
	$email = stripslashes($email);
	
  	if (empty($email)) {
    $erremail = "Email is Mandatory";
  } else {
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erremail = "Invalid email format";
    }
  }
  // password validation.
	$pass = htmlspecialchars($_POST["pass"]);
	$pass = trim($pass);
	$pass = stripslashes($pass);  
	
	if (empty($pass)) {
    $errpass = "Password is Mandatory";
  } else {
		if (strlen($pass) < '8') {
            $errpass = "Your Password Must Contain At Least 8 Characters!";
        }
  }
  
  // re entered password validation.
    $rpass = htmlspecialchars($_POST["rpass"]);
	$rpass = trim($rpass);
	$rpass = stripslashes($rpass);  
	
	if (empty($rpass)) {
    $errrpass = "Re-Entered Password is Mandatory";
  } else {
	  if ($pass != $rpass){
		  $errrpass = "Passwords are mismatched";
	  }
	$pass = md5($pass);   
  }
  
  	  //check email excist
	  
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "select Email from user where Email= '$email';";
$row = mysqli_num_rows($conn->query($sql));
if($row > 0){ $erremail = "Email already exist"; }
else {$conn->close();}

  // redirect if error free
  if ($errfname == "" && $errlname == "" && $errpass == "" && $errrpass == ""){
	  
	  //feed data into database
	  
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO user (First_Name, Last_Name, Email, Password)
VALUES ('$fname', '$lname', '$email', '$pass');";

$conn->query($sql);

$conn->close();

	// redirect users to their profile
	  
	  header("Location: http://localhost/movie/login.php?id=1#content");
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Strict//EN">
<html>
<head>
  <meta charset="utf-8">
  <title>CONGO MOVIES</title>
  <script src="js/jquery.slides.min.js"></script>
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Raleway+Dots' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="container">
	
	<div id="header">
		 <?php include 'header.php'; ?>
	</div>
	<div id="content">
		<div class="main-agileits">
	<h2 class="sub-head">Sign Up</h2>
		<div class="sub-main">	
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<input placeholder="First Name" name="fname" class="name" type="text" required="" value="<?php if($errfname == ""){echo $fname;} ?>">
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span><br>
				<input placeholder="Last Name" name="lname" class="name2" type="text" required="" value="<?php if($errlname == ""){echo $lname;} ?>">
					<span class="icon2"><i class="fa fa-user" aria-hidden="true"></i></span><br>
				<input placeholder="Email" name="email" class="mail" type="text" required="" value="<?php if($erremail == ""){echo $email;} ?>">
					<span class="icon4"><i class="fa fa-envelope" aria-hidden="true"></i></span><br>
				<input  placeholder="Password with 8 characters" name="pass" class="pass" type="password" required="">
					<span class="icon5"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>
				<input  placeholder="Confirm Password" name="rpass" class="pass" type="password" required="">
					<span class="icon6"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>
					<div id="echo">
					<?php echo"$errfname<br>$errlname<br>$erremail<br>$errpass<br>$errrpass" ?><br>
					</div>
				<input type="submit" value="sign up">
			</form>
		</div>
		<div class="clear"></div>
</div>
	</div>
	<div id="footer">
		 <?php include 'footer.php'; ?>
	</div>
</div>
</body>
</html>