<?php

session_start();



if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
{
	header('location:../index.php');
}
else
{
	include '../config.php';
	
	if(isset($_POST['abtn']))
	{
		
		$art_name = mysqli_real_escape_string($db,$_POST['aname']);
	    $art_desc = mysqli_real_escape_string($db,$_POST['adesc']);
		$vpcode = mysqli_real_escape_string($db,$_POST['vpcode']);
	    $art_desc2 = mysqli_real_escape_string($db,$_POST['adesc2']);
		$art_tit = mysqli_real_escape_string($db,$_POST['artsel']);
		
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
		}
		elseif(empty($art_desc))
		{
			echo "<span class='err'>Please fill in the article summary </span>";
		}
		elseif(empty($vpcode))
	   {
		echo "Plesae enter the vpcode";
	   }
	    elseif($vpcode != 'letsgetrightintothenews')
	   {
		echo "<span class='err'>The vpcode is incorrect </span>";
	   }
		elseif(empty($art_tit) || $art_tit == 'No')
		{
			echo "<span class='err'>There's no category </span>";
		}
		elseif(empty($art_desc2))
		{
			echo "<span class='err'>This is the articles main content.Please double click on the button in order to submit </span>";
		}
		else
		{
			$sql = "INSERT INTO articles(article_name,article_summary,article_content,article_category,article_create) VALUES('$art_name','$art_desc','$art_desc2','$art_tit',NOW())";
			$db->query($sql);
			echo "<script type='text/javascript'>
			   setTimeout(function(){window.location.assign('../index.php');});	</script>";
		}
		
		
	}
	
}

?>