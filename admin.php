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

$sql = "select Admin from user where Email = '$mail';";

$dot = mysqli_fetch_row($conn->query($sql));
$dot = $dot[0];
$conn->close();
if ($dot != 1){
	header("Location: http://localhost/movie/index.php");
	  }
?>
<html>
<head>
</head>
<body>
<h1>Hey, Admin! click below to change your dynamic content</h1>
<ol>
<li><a href="http://localhost/movie/admin/movienow.php">  Upload Now Showing Movie  </a></li>
<li><a href="http://localhost/movie/admin/movienext.php">  Upload Up Coming Movie  </a></li>
<li><a href="http://localhost/movie/admin/deletemovie.php">  Delete Movies  </a></li>
<li><a href="http://localhost/movie/admin/post.php">  Upload Posts  </a></li>
<li><a href="http://localhost/movie/admin/editpost.php">  Edit/Delete Posts  </a></li>
<li><a href="http://localhost/movie/admin/comment.php">  Edit/Delete Comments  </a></li>
</body>
</html>






















