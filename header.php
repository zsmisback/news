<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Champions.in-Read about news/gossips and behind the scene stories about sports</title>
      <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <!-- //web fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
  </head>
  <body>
<!-- //Top Menu 1 -->
<section class="w3l-bootstrap-header">
  <nav class="navbar navbar-expand-lg navbar-light py-lg-2 py-2 sticky-top"  style="background-color:darkgreen">
    <div class="container" style="color:white;">
    <a class="navbar-brand" href="index.php" style="color:white;"><span class="fa fa-trophy" style="color:#D4AF37;"></span> Champion News</a>
      <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'
        aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon fa fa-bars'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <ul class='navbar-nav ml-auto'>
          <li class='nav-item'>
            <a class='nav-link' href='index.php' style='color:white;'>Home</a>
          </li>
	<?php 	
 
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
		{			
		  echo"<li class='nav-item'>
		  <div class='dropdown'>
            <a class='nav-link dropdown-toggle' style='color:white;' data-toggle='dropdown' href='#'>Articles</a>
			<div class='dropdown-menu'>
               <a class='dropdown-item' href='content.php?id=1'>View articles</a>
                <a class='dropdown-item' href='listarticles.php?page=1'>List articles</a>
              </div>
			  </div>
          </li>";
		}
		else
		{
			echo "<div class='collapse navbar-collapse' id='navi'>
 <ul class='navbar-nav mr-auto'>
 <li class='nav-item'>
<div class='dropdown'>
<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' style='color:white;'>Category</a>
<div class='dropdown-menu'>
      <a class='dropdown-item' href='Categoryaddons/catadd.php'>Add category</a>
      <a class='dropdown-item' href='Categoryaddons/categorylist.php'>List categories</a>
    </div>
</div>
</li>
 <li class='nav-item'>
 <div class='dropdown'>
  <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' style='color:white;'>Articles</a>
  <div class='dropdown-menu'>
      <a class='dropdown-item' href='Articleaddons/articleadd.php'>Add articles</a>
      <a class='dropdown-item' href='Articleaddons/articlelist.php'>List articles</a>
	  <a class='dropdown-item' href='listarticles.php?page=1'>List articles(User)</a>
      
    </div>
 </div>
 </li>
 <li class='nav-item'>
 <div class='dropdown'>
  <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' style='color:white;'>Comments</a>
  <div class='dropdown-menu'>
      <a class='dropdown-item' href='Commentaddons/commentadd.php'>Add comment</a>
      <a class='dropdown-item' href='Commentaddons/commentlist.php'>List comments</a>
    </div>
	</div>
 </li>
 <li class='nav-item'>
  <a class='nav-link' href='logout.php' style='color:white;'>Logout</a>
 </li>";
		}
		  
		  ?>
		  
          
        </ul>
       
      </div>
    </div>
  </nav>
</section>
<br>