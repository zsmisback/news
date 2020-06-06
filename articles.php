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
  
  
<?php 

$sql = "SELECT * FROM articles WHERE article_category = $_GET[id]";
$result = $db->query($sql);

if($result->num_rows == 0)
{
	echo "<h2>No articles</h2>";
}
while($row = $result->fetch_assoc())
{

echo"
   <a href='content.php?id=$row[article_id]'><h2>$row[article_name]</h2></a>
   
   <h5>$row[article_summary]</h5>
  
  ";
  
}
 
?>  
  <br>
  
 
  
</div>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();   
});
</script>
</body>
</html>