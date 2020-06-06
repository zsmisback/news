<?php
session_start();



include 'config.php';

?>

<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

<div class='container-fluid'> 
  
<?php 

$sql = "SELECT * FROM articles INNER JOIN category ON article_category = cat_id WHERE article_id = $_GET[id]";
$result = $db->query($sql);





if($result->num_rows == 0)
{  
    echo"<h6><a href='index.php' style='text-decoration:underline'>Home</a> > <a href='articles.php?id=$row[article_category]' style='text-decoration:underline'>Articles</a> </h6>";
	echo "<h2>No articles</h2>";
}
while($row = $result->fetch_assoc())
{
echo"<h6><a href='index.php' style='text-decoration:underline'>Home</a> > <a href='articles.php?id=$row[article_category]' style='text-decoration:underline'>Articles</a> </h6>";
echo"
  <h2 class='text-center'>$row[article_name]</h2>
   $row[article_content]
   <h4>Comments:</h4>
   
  
  ";
  
  $sql = "SELECT * FROM comments WHERE comment_article = $_GET[id]";
  $result=$db->query($sql);
  
  if($result->num_rows == 0)
  {
	  echo "No comments";
  }
  else
  {
	  while($row = $result->fetch_assoc())
	  {
		  echo "<h6>Posted on: $row[comment_create]</h6>";
		   
		       if(empty($row['comment_by']))
			   {
				   echo "<h6>By: Anonymous user</h6>";
			   }
			   else
			   {
		        echo "<h6>By: $row[comment_by]</h6>";
		       }
			   if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
           {
	        echo"";
           }
            else
           {
	        echo"<a href='Commentaddons/editcomment.php?id=$row[comment_id]' class='float-right'>Edit</a>
			     <br><br>
			     <a href='Commentaddons/deletecomment.php?id=$row[comment_id]' class='float-right'>Delete</a>";
           }
			   echo "<p>$row[comment_summary]</p><hr>";
		  
	  }
	 
  }
  
  
}

echo " <form name='com' method='post' id='comments'>

                      <h3 id='user'>Reply</h3>
                      <textarea class='form-control' name='com_desc' rows='4' cols='155' id='cdesc' placeholder='Summary'></textarea>
					  <br>
					  <p class='err' id='error'></p>
					  <button type='submit' id='cbtn' class='btn btn-dark btn-lg float-right' name='newcom' >Submit</button>";
 
?>  
  <br>
  
 
  </div>

<script>
$(document).ready(function(){
  $('#comments').submit(function(event){
		event.preventDefault();
		var cdesc = $('#cdesc').val();
		var cbtn = $('#cbtn').val();
      
		$.ajax({
			url:'Commentaddons/commenthandle.php?id=<?php echo $_GET['id']; ?>',
			method:'POST',
			data:{cdesc:cdesc,
				  cbtn:cbtn},
				  
				  beforeSend:function(){
			
			$('input').prop('disabled',true);
			$('button').prop('disabled',true);
			
			$('#error').html("<span class='spinner-border text-info'></span>");
			$('#cbtn').html("<span id='forpasspn' class='spinner-grow spinner-grow-sm'></span> Processing");
		},

        complete:function(){
			$('input').prop('disabled',false);
			$('button').prop('disabled',false);
			
			$('#cbtn').html("Submit");
			
		},
		
		success:function(data){
				$('#error').html(data);
				
		},

        error:function(){
			$('#error').html('Failed to process data');
		}		
			
		})
		
		
		
	});  
  
  
});
</script>
</body>
</html>