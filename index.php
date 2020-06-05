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
</style>
</head>
<body>
<h1>News</h1>
<?php include 'navbar2.php'; ?>
<div class="container">
  <div class='row'>
  <div class='col-md-6'>
  <div class="card" style="width:400px">
    <img class="card-img-top" src="cricket.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">Cricket</h4>
      <p class="card-text">News related to cricket</p>
      <a href="#" class="btn btn-primary">See Profile</a>
    </div>
  </div>
  </div>
  <br>
  
 <div class='col-md-6'>
  <div class="card" style="width:400px">
  <img class="card-img-bottom" src="football.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">Football</h4>
      <p class="card-text">News related to football</p>
      <a href="#" class="btn btn-primary">See Profile</a>
    </div>
    
  </div>
  </div>
  </div>
</div>
</body>
</html>