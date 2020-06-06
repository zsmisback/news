<?php
session_start();



include 'config.php';

?>

<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="stylesheet.css">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<style>
h1{text-align:center;}
	a{color:black;}
	a:hover{text-decoration:none;}
</style>
</head>
<body>
<h1>News</h1>
<?php include 'navbar2.php'; ?>
<div class="container">
  <div class='row'>
  
<?php 

$sql = "SELECT * FROM category";
$result = $db->query($sql);

while($row = $result->fetch_assoc())
{

echo"
  <div class='col-md-6 mb-4'>
  <a href='articles.php?id=$row[cat_id]'>
  <div class='card' style='width:400px'>
    <img class='card-img-top' src='Profilepics/$row[cat_img]' alt='Card image' style='width:100%'>
    <div class='card-body'>
      <h4 class='card-title'>$row[cat_name]</h4>
      <p class='card-text'>$row[cat_desc]</p>
	  ";
	  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
	  {
        echo "";
      }
	  else
	  {
		  echo"<a href='#' class='btn btn-primary'>Delete</a>";
	  }
	echo"
	</div>
  </div>
  </a>
  </div>
  ";
  
}
 
?>  
  <br>
  
 
  </div>
</div>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();   
});
</script>
</body>
</html>