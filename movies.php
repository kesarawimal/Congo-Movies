<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Strict//EN">
<html>
<head>
  <meta charset="utf-8">
  <title>CONGO MOVIES</title>
  <link rel="stylesheet" type="text/css" href="css/movies.css">
  <script src="js/jquery.slides.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
	<div id="header">
		 <?php include 'header.php'; ?>
	</div>
	<div id="content">
		<div id="now">
		<p id="upper">Now Showing</p>
			<!-- test -->
		<?php 
		$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

  if($result = $conn->query("select name,image,link,imdb,category from movienow order by ID desc;")){
    if($count = $result->num_rows){
      while($row = $result->fetch_object()){
?>
        <div class = "jumbotron">
          <p id="m-name"> <?php echo $row->name; ?><br></p>
          <img id="m-img" src="<?php echo $row->image; ?>" height="400px" width="300px"/>
		  <iframe id="iframe" width="560" height="315" src="<?php echo $row->link; ?>" frameborder="0" allowfullscreen></iframe>
		  <p id="rate">iMDb Rating:<br><?php echo $row->imdb; ?> <br><br> Category:<br><?php echo $row->category; ?></p>
        </div>
<?php          
      }
    $result->free();
    }
  }
?>
		</div>
<!-- next div -->
		<div id="next">
	<p id="upper">Up Coming Movies</p>
			<!-- test -->
		<?php 
		$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

  if($result = $conn->query("select name,image,link,category from movienext order by ID desc;")){
    if($count = $result->num_rows){
      while($row = $result->fetch_object()){
?>
        <div class = "jumbotron">
          <p id="m-name"> <?php echo $row->name; ?><br></p>
          <img id="m-img" src="<?php echo $row->image; ?>" height="400px" width="300px"/>
		  <iframe id="iframe" width="560" height="315" src="<?php echo $row->link; ?>" frameborder="0" allowfullscreen></iframe>
		  <p id="rate">Category:<br><?php echo $row->category; ?></p>
        </div>
<?php          
      }
    $result->free();
    }
  }
?>
		</div>
	</div>
	<div id="footer">
		 <?php include 'footer.php'; ?>
	</div>
</div>
</body>
</html>