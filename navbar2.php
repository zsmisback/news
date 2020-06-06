
<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">

 <?php
 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
 echo "<ul class='navbar-nav'>
 <li class='nav-item'>
  <a class='nav-link' href='login.php'>Login&nbsp<span class='fas fa-lock-open'></span></a>
 </li>

 </ul>
 </div>";
 }
 else{
 
 echo"
 <ul class='navbar-nav'>
<li class='nav-item'>
<div class='dropdown'>
<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#'>Category</a>
<div class='dropdown-menu'>
      <a class='dropdown-item' href='Categoryaddons/catadd.php'>Add category</a>
      <a class='dropdown-item' href='Categoryaddons/catdelete.php'>Delete category</a>
      <a class='dropdown-item' href='#'>Edit Category</a>
    </div>
</div>
</li>
</ul>

<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navi'>
<span class='navbar-toggler-icon'></span>
</button>

<div class='collapse navbar-collapse' id='navi'>
 <ul class='navbar-nav mr-auto'>
 <li class='nav-item'>
 <div class='dropdown'>
  <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#'>Articles</a>
  <div class='dropdown-menu'>
      <a class='dropdown-item' href='Articleaddons/articleadd.php'>Add articles</a>
      <a class='dropdown-item' href='Articleaddons/articledelete.php'>Delete articles</a>
      <a class='dropdown-item' href='#'>Edit articles</a>
    </div>
 </div>
 </li>
 <li class='nav-item'>
 <div class='dropdown'>
  <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#'>Comments</a>
  <div class='dropdown-menu'>
      <a class='dropdown-item' href='Commentaddons/commentadd.php'>Add comment</a>
      <a class='dropdown-item' href='Commentaddons/commentdelete.php'>Delete comments</a>
      <a class='dropdown-item' href='#'>Edit comments</a>
    </div>
	</div>
 </li>

 
 </ul>
 <ul class='navbar-nav'>
 <li class='nav-item'>
  <a class='nav-link' href='logout.php'>Logout</a>
 </li>
 
 
 </ul>
 </div>";
 }
 ?>
 
 


</nav>

<br>