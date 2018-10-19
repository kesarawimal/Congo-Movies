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

    <?php
	
	$name = $link = $category = $imgname = "";

    // Check if the form was submitted

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Check if file was uploaded without errors

        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){

            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");

            $filename = $_FILES["photo"]["name"];

            $filetype = $_FILES["photo"]["type"];

            $filesize = $_FILES["photo"]["size"];

        

            // Verify file extension

            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        

            // Verify file size - 5MB maximum

            $maxsize = 5 * 1024 * 1024;

            if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        

            // Verify MYME type of the file

            if(in_array($filetype, $allowed)){

                // Check whether file exists before uploading it

                if(file_exists("upload/" . $_FILES["photo"]["name"])){

                    echo $_FILES["photo"]["name"] . " is already exists.";

                } else{

                    move_uploaded_file($_FILES["photo"]["tmp_name"], "image/" . $_FILES["photo"]["name"]);

                    echo "Your file was uploaded successfully.";

                } 

            } else{

                echo "Error: There was a problem uploading your file. Please try again."; 

            }

        }
		
	$name = $_POST["name"];
	$link = $_POST["link"];
	$category = $_POST["category"];
	$imgname = $_POST["imgname"];
	
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->query("insert into movienext (name,image,link,category) values ('$name','image/$imgname','$link','$category');"))
{echo "<p style='color:red'>your movie successfully uploaded!</p>";}Else{echo "<p style='color:red'>an error occurred where uploading the movie!</p>";}
    }

    ?>



    <!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

    </head>

    <body>
<h1>Upload a Up Coming Movies</h1>
        <form action="movienext.php" method="post" enctype="multipart/form-data">

            <h3>Name:</h3> <input type="text" name="name" size="100"> <br>
			<h3>Link:</h3> <input type="text" name="link" size="100"> <br>
			<h3>Category:</h3> <input type="text" name="category" size="35"> <br>
			<h3>Enter Image name with extension:</h3> <input type="text" name="imgname" size="35"> <br>
			<h3>Upload Image:</h3><input type="file" name="photo" id="fileSelect"><br>
			<p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>

            <br>
            <br>
			<input type="submit" value="     UPLOAD     ">
			<br>
            <br>
            <br>
            <br>
            

        </form>

    </body>

    </html>

