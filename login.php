<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
$email = $erremail = $pass = $errpass = $dot = $id = $show = "";

if(isset($_GET['id'])){ $id = intval($_GET['id']);
if($id == 1){ $show = "Your Account has been Successfully Created!<br />JUST LOGIN"; }}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = htmlspecialchars($_POST["email"]);
	$email = trim($email);
	$email = stripslashes($email);
	
	if (empty($email)) {
    $erremail = "Email is required";
  } else {
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erremail = "Invalid email";
    }
  }
    // password validation.
	$pass = htmlspecialchars($_POST["pass"]);
	$pass = trim($pass);
	$pass = stripslashes($pass);  
	
	if (empty($pass)) {
    $errpass = "Password is required";
  }
  $pass = md5($pass);
  
  	  //check credentials
	  
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "select Password,Admin from user where Email = '$email';";

$dot = mysqli_fetch_row($conn->query($sql));
if( $dot[0] !== $pass ){$errpass = "The password that you've entered is incorrect! Try Again";}

  if ($erremail == "" && $errpass == ""){
	  

// redirect users to their profile
	
	// store session data
	$email;
	$_SESSION["asd"] = $email;
	  //echo $_SESSION["asd"];
	  
	  if ($dot[1] == 1){
	header("Location: http://localhost/movie/admin.php");
	  }else { header("Location: http://localhost/movie/index.php"); }
	  
}	
$conn->close();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Strict//EN">
<html>
<head>
  <meta charset="utf-8">
  <title>CONGO MOVIES</title>
  <script src="js/jquery.slides.min.js"></script>
  	<link rel="stylesheet" href="css/style1.css">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div id="container">
	
	<div id="header">
		 <?php include 'header.php'; ?>
	</div>
	<div id="content">
	<div class="main-agileinfo">
			<p id="show"><?PHP echo $show; ?></p>
		<h2>Login Now</h2>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<input type="text" name="email" class="name" placeholder="Enter Your Email" required="" value="<?php if($erremail == ""){echo $email;} ?>">
			<input type="password" name="pass" class="password" placeholder="Enter Your Password" required="">
			<ul>
				<li>
					<input type="checkbox" id="brand1" value="">
					<label for="brand1"><span></span>Remember me</label>
				</li>
			</ul>
			<div id="echo">
					<br><?php echo"$erremail<br>$errpass"; ?><br>
					</div>
			<div class="clear"></div>
			<input type="submit" value="Login">
		</form>
	</div>
	</div>
	<div id="footer">
		 <?php include 'footer.php'; ?>
	</div>
</div>
</body>
</html>