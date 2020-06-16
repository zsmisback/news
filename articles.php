<?php
session_start();



include 'config.php';

if(!isset($_GET['id']))
{
	header("Location:index.php");
}

?>

<?php include 'header.php'; ?>

<div class="container">
  
  
<?php 

$sql = "SELECT * FROM articles WHERE article_category = $_GET[id]";
$result = $db->query($sql);

echo"<h6><a href='index.php' style='text-decoration:underline'>Home</a></h6>";

if($result->num_rows == 0)
{
	echo "<h2>No articles</h2>";
}
while($row = $result->fetch_assoc())
{
	 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
  {
	echo"";
  }
  else
  {
	  echo"<a href='Articleaddons/editarticle.php?id=$row[article_id]' class='float-right'>Edit</a>
	       <br><br>";
		  if($row['article_block'] == 0)
		  {
		   echo"<a href='Articleaddons/blockarticle.php?id=$row[article_id]' class='float-right'>Block</a>
		       <br><br>";
		  }
		  else
		  {
			  echo"<a href='Articleaddons/blockarticle.php?id=$row[article_id]' class='float-right'>Unblock</a>
		       <br><br>";
		  }
	  echo"<a href='Articleaddons/deletearticle.php?id=$row[article_id]' class='float-right'>Delete</a>";
  }

 if($row['article_block'] == 0)
 {	 
echo"
   <a href='content.php?id=$row[article_id]'>
   <div class='row'>
   <div class='col-md-6'>
   <img src='Profilepics/Articles/$row[article_unique_key]/$row[article_image]' alt = 'image' style='width:400px;height:200px;'>
   </div>
   <div class='col-md-6'>
   <h2 class='text-right'>$row[article_name]</h2>
   </a>
   ";
 }
 else
 {
	 echo"
	 
	   
			   
   <a href='articles.php?id=$row[article_category]' onclick='Blockalert()'>
   <div class='row'>
   <div class='col-md-6'>
   <img src='Profilepics/Articles/$row[article_unique_key]/$row[article_image]' alt = 'image' style='width:400px;height:200px;'>
   </div>
   <div class='col-md-6'>
   <h2 class='text-right'>$row[article_name]</h2>
   </a>
   ";
 } 
   
echo"
   <h5 class='text-right'>$row[article_summary]</h5>
   </div>
   </div>
   <hr>
  
  ";
  
}
 
?>  
  <br>
  
 
  
</div>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();   
});

function Blockalert(){
	alert('This article has been blocked by an admin');
}
</script>
</body>
</html>