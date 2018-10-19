<?PHP
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
$mail = $dot = "";
if(isset($_SESSION['asd'])){ $mail = $_SESSION['asd']; }
// DB
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "select First_Name from user where Email = '$mail';";

$dot = mysqli_fetch_row($conn->query($sql));
$dot = $dot[0];
$conn->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Strict//EN">
<html>
<head>
  <meta charset="utf-8">
  <title>CONGO MOVIES</title>
  <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js/jquery.slides.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
	
	<div id="header">
		<div id="slides">
			<img src="img/a.jpg" alt="slidshow1" class="fixed-height">
			<img src="img/b.jpg" alt="slidshow2" class="fixed-height">
			<img src="img/c.jpg" alt="slidshow3" class="fixed-height">
			<img src="img/d.jpg" alt="slidshow4" class="fixed-height">
			<img src="img/e.jpg" alt="slidshow5" class="fixed-height">
		</div>
		<div id="menu">
			<div id="menu1">
			</div>
			<div id="menu2">
				<a href="http://localhost/movie/index.php" style="color:white;">
				<img src="img/logo.png" id="logo" alt="logo">
				<p id="head">CONGO MOVIES</p></a>
			</div>
			<div id="menu3">
				<nav class="navbar navbar-default">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="http://localhost/movie/index.php">HOME</a></li>
        <li><a href="http://localhost/movie/movies.php">MOVIES</a></li>
        <li><a href="http://localhost/movie/tickets.php">BUY TICKETS</a></li>
        <li><a href="http://localhost/movie/blog.php">BLOG</a></li>
        <li><a href="http://localhost/movie/aboutus.php">ABOUT US</a></li>
        <li><a href="http://localhost/movie/contactus.php">CONTACT US</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><?php if($dot == ""){echo "<a href='http://localhost/movie/register.php'><span class='glyphicon glyphicon-user'></span> REGISTER</a>";} 
		else{ echo "<a href='http://localhost/movie/index.php' style='text-transform: uppercase; color: #c44479;'><span class='glyphicon glyphicon-user'></span> $dot</a>"; }	?>
		</li>
        <li><?php if($mail == ""){echo "<a href='http://localhost/movie/login.php'><span class='glyphicon glyphicon-log-in'></span> LOG IN</a>";}
		else{ echo "<a id='atag' href='http://localhost/movie/logout.php'><span class='glyphicon glyphicon-log-out'></span> LOG OUT</a>";
			//session_destroy();	
			}	?>
		</li>
      </ul>
    </div>
</nav>
			</div>
		</div>
	</div>
	</body>
</html>