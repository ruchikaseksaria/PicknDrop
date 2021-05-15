<?php
  include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Transport Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin.php"style="color:  #32CD32; font-style: serif;font-size:  25px;">Pick N drop</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
       <li class="active"><a href="#">Serives</a></li>
      <li><a href="#">Contact US</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"> Signup</span><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Signupform.php"><button name="regdir">Reister for Driver</button></a></li>
          <li><a href="Empsignupform.php"><button name="regemp">Reister for Employee</button></a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"> Login</span><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="driverlogin.php"><button name="logindir">Login for Driver</button></a></li>
          <li><a href="employeelogin.php"><button name="loginEmp">Login for Employee</button></a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<!-- slide show -->

<div class="slideshow-container">

<div class="mySlides fade">
  <img src="maxresdefault.jpg" style="width:100%; height: 450px;">
</div>

<div class="mySlides fade">
  <img src="mobility.jpg" style="width:100%; height:450px;">
</div>

<div class="mySlides fade">
  <img src="Featured-Image1.jpg" style="width:100%; height:450px;">
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 1000); // Change image every 2 seconds
}
</script>
</body>
</html>