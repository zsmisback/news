<?php

session_start();



if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
{
	header('location:../index.php');
}
else
{
	include '../config.php';
	
	if(isset($_POST['newart']))
	{
		
		$art_name = mysqli_real_escape_string($db,$_POST['art_name']);
	    $art_desc = mysqli_real_escape_string($db,$_POST['art_desc']);
		$vpcode = mysqli_real_escape_string($db,$_POST['vpc']);
	    $art_desc2 = mysqli_real_escape_string($db,$_POST['art_desc2']);
		$art_tit = mysqli_real_escape_string($db,$_POST['artselect']);
		$cl = false;
		
		$queryCreateUsersTable = "CREATE TABLE IF NOT EXISTS `articles` (
    `article_id` int(255) AUTO_INCREMENT,
    `article_name` varchar(255) NOT NULL,
    `article_summary` varchar(255) NOT NULL,
	`article_content` varchar(255) NOT NULL,
	`article_category` int(255) NOT NULL,
     PRIMARY KEY  (`article_id`))";
	 
	 

    $ress = $db->multi_query($queryCreateUsersTable);
		
		if(empty($art_name))
		{
			echo "<span class='err'>Please fill in the article name </span>";
			$cl = false;
		}
		elseif(empty($art_desc))
		{
			echo "<span class='err'>Please fill in the article summary </span>";
			$cl = false;
		}
		elseif(strlen($art_desc) > 150)
		{
			echo "<span class='err'>Please summarize in under 150 characters</span>";
			$cl = false;
		}
		elseif(empty($vpcode))
	   {
		echo "Plesae enter the vpcode";
		$cl = false;
	   }
	    elseif($vpcode != 'letsgetrightintothenews')
	   {
		echo "<span class='err'>The vpcode is incorrect </span>";
		$cl = false;
	   }
	   elseif(!isset($_FILES['file']['name']))
	  {
		echo "<span class='err'>Please select an image</span>";
		$cl = false;
	  }
		elseif(empty($art_tit) || $art_tit == 'No')
		{
			echo "<span class='err'>There's no category </span>";
			$cl = false;
		}
		else{
			$target_dir = "../Profilepics/";
            
            $uploadOk = 1;
            $base = mysqli_real_escape_string($db,basename($_FILES['file']['name']));
			$clean = clean($base);
            $target_file = $target_dir . $clean;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $file = $_FILES['file']['name'];
            $check = getimagesize($_FILES["file"]["tmp_name"]);
  
  
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
  echo "<span class='err'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</span>";
  $uploadOk = 0;
  $cl = false;
}
elseif ($_FILES["file"]["size"] > 5000000) {
  echo "<span class='err'>Sorry, your file is too large.</span>";
  $uploadOk = 0;
  $cl = false;
} 
 elseif($check == false) {
    echo "<span class='err'>File is not an image.</span>";
    $uploadOk = 0;
	$cl = false;
  }
  else
  {             $cl = true;
	            echo "<span class='err'></span>";
				
		if(empty($art_desc2))
		{
			echo "<span class='err'>This is the articles main content.Please double click to submit.</span>";
		}
        else
		{
			echo "<span class='err'></span>";
	            move_uploaded_file($_FILES['file']['tmp_name'],$target_file);
				$sql = "INSERT INTO articles(article_name,article_summary,article_content,article_category,article_create,article_image) VALUES('$art_name','$art_desc','$art_desc2','$art_tit',NOW(),'$clean')";
				$results = $db->query($sql);
				echo "<script type='text/javascript'>
			   setTimeout(function(){window.location.assign('../index.php');});	</script>";
		}			
	            
  }
  
  
 
	}
			
		
		
	}
	
}

 function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-.]/', '', $string); // Removes special chars.
}

?>

<script>

var aname = "<?php echo $art_name; ?>";
var adesc = "<?php echo $art_desc; ?>";
var artsel = "<?php echo $art_tit; ?>";
var vpcode = "<?php echo $vpcode; ?>";
var cls = "<?php echo $cl; ?>";

if(aname !== '' && adesc !== '' && artsel !== 'No' && vpcode !== '' && vpcode == 'letsgetrightintothenews' && cls == true)
			
		{
			
			$('#mainart').css('display','block');
			$('#firstart').css('display','none');
			$('#abtn').css('display','none');
			$('#abtn').css('display','block');
			
			
		}


</script>