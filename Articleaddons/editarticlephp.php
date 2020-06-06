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
		$ok = $_POST['ok'];
		
		
		
	 
	 

		
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
			$sql = "UPDATE articles SET article_name = '$art_name',article_summary = '$art_desc',article_content = '$art_desc2',article_category = '$art_tit',article_create = NOW() WHERE article_id = $_GET[id]";
			$db->query($sql);
			
		}
		
		
	}
	
}

?>