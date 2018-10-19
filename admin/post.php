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
<?PHP
$title = $content = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$title = $_POST["title"];
	$content = $_POST["content"];
	
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->query("insert into post (title,content) values ('$title','$content');"))
{echo "<p style='color:red'>your post successfully uploaded!</p>";}Else{echo "<p style='color:red'>an error occurred when uploading the post!</p>";}
}
?>
<html>
<head>
</head>
<body>


<h1>upload a post</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<h3>title:</h3><br> <textarea name="title" cols="100" rows="5"></textarea><br>
<h3>content:</h3><br> <textarea name="content" cols="100" rows="10"></textarea><br><br>
<input type="submit" value="     UPLOAD     ">
</form>

</body>
</html>