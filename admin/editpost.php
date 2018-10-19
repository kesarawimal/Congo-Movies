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
$dltid = $edtid = $title = $content = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$dltid = $_POST["dltid"];
	$edtid = $_POST["edtid"];
	$title = $_POST["title"];
	$content = $_POST["content"];
	
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if($dltid != ""){
if($conn->query("DELETE FROM post WHERE id='$dltid';"))
{echo "<p style='color:red'>that post successfully deleted!</p>";}Else{echo "<p style='color:red'>an error occurred when deleting that post!</p>";}
}
if($edtid != ""){
if($conn->query("UPDATE post SET content='$content', title='$title' WHERE id='$edtid';"))
{echo "<p style='color:red'>that post successfully edited!</p>";}Else{echo "<p style='color:red'>an error occurred when editing that post!</p>";}
}
}
?>
<html>
<head>
</head>
<body>



<form action="editpost.php" method="post">
<h1>Delete Post</h1>
<h3>Enter Post ID which you want to delete:</h3><input type="text" name="dltid" size="4"><br><br>
<input type="submit" value="     DELETE     "><br><br>	
<h1>Edit Post</h1>
<h3>Enter Post ID which you want to edit:</h3><input type="text" name="edtid" size="4"><br>
<h3>Enter Post title which you want to edit:</h3><br> <textarea name="title" cols="100" rows="5"></textarea><br>
<h3>Enter Post content which you want to edit:</h3><br> <textarea name="content" cols="100" rows="10"></textarea><br><br>
<input type="submit" value="     EDIT     ">
</form>
<br>
<br>
<br>
<br>
</body>
</html>
<?php 
		$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = 'SELECT p.id,p.title,p.content,p.date,c.body,c.cdate,c.email,c.postid FROM post p left JOIN comment c ON p.id = c.postid ORDER BY p.id DESC, c.postid DESC';
$result = $conn->query($sql);
$previous_post = 0;
while ($data = mysqli_fetch_assoc($result)) {
    if ($previous_post != $data['id']) {
		echo '<p style="color:red;">COMMENT ID : ' . $data['id'] . '</p>';
        echo '<h1 id="title">' . $data['title'] . '</h1>';
		echo '<h3 id="contents">' . $data['content'] . '</h3><br><br><br>';
        $previous_post = $data['id'];
    }
	
}
?>