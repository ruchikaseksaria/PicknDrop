<?php
session_start();
?>
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
<?php
if(isset($_POST['submit']))
{
  $eid = $_POST['eid'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM empdeet WHERE Employee_ID = '$eid'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  if($row['Employee_ID'] == $eid && $row['Password'] == $password)
  {
    echo "login success";
    $_SESSION["Employee_ID"] = $eid;
    header("Location:book.php");
  }
  else
  {
     $message = "EmployeeID or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
  }

    if (!isset($_COOKIE['eid'])) {
        setcookie("eid", $_POST['eid'], time() + 3);
    }
}
?>

</head>
<body>
 

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     <a class="navbar-brand"  style="color:  #32CD32; font-style: serif;font-size:  25px;">Pick N drop</a>
    </div>
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
          <li><a href="#"><button name="loginEmp">Login for Employee</button></a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<!-- LOGIN Form starting -->

<form action="" method="post">
  <div class="imgcontainer">
    <img src="10_avatar-512.png" alt="Avatar" class="avatar" style="width: 200px; height: 200px;">
  </div>

 <center> <div class="container">
    <label for="eid"><b></b></label>
    <input type="text" placeholder="Enter Employee ID" name="eid" required style="width: 40%"><br>

    <label for="psw"><b></b></label>
    <input type="password" placeholder="Enter Password" name="password" required style="width: 40%"><br>
        
    <button type="submit" name="submit"style="width: 21%;">Login</button>
  </div></center>

  <div class="container" style="background-color:#f1f1f1">
    <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>



</body>
</html>