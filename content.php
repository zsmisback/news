<?php
session_start();



include 'config.php';

?>

<?php include 'header.php'; ?>

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
  <div class='row'>
  <div class='col-md-10'>
   $row[article_content]
  </div>
  <div class='col-md-2'>
  <h5 class='text-center'>More articles</h5>
  <br>";
  $sql2="SELECT * FROM articles";
  $res=$db->query($sql2);
  while($row3=$res->fetch_assoc())
  {
  echo"
  <a href='content.php?id=$row3[article_id]'>
  <div class='row'>
  <div class='col-md-4'>
  <img src='Profilepics/Articles/$row3[article_unique_key]/$row3[article_image]' alt = 'image' style='width:90px;height:70px;'>
   </div>
   <div class='col-md-8'>
   <b>$row3[article_name]</b>
   
   <p>$row3[article_summary]</p>
   
   <p>$row3[article_create]</p>
   </div>
   </div>
   </a>
   <hr>
   <br>
  ";
  }
 echo"</div>
   </div>  
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