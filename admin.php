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
  $admin = $_POST['admin'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM addd";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  if($row['admin'] == $admin && $row['password'] == $password)
  {
    echo "login success";
    $_SESSION["admin"] = $admin;
    header("Location:det.php");
  }
  else
  {
     $message = "Admin or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
  }
}
?>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     <a class="navbar-brand"style="color:  #32CD32; font-style: serif;font-size:  25px;">Pick N drop</a>
    </div>
  </div>
</nav>
<!-- LOGIN Form starting -->

<form action="" method="post">
  <div class="imgcontainer">
    <img src="10_avatar-512.png" alt="Avatar" class="avatar" style="width: 200px; height: 200px;">
  </div>

 <center> <div class="container">
    <label for="admin"><b></b></label>
    <input type="text" placeholder="Admin" name="admin" required style="width: 40%;"><br>

    <label for="adminpass"><b></b></label>
    <input type="password" placeholder="Enter Password" name="password" required style="width: 40%"><br>
        
    <a href="det.php"><button type="submit" name="submit"style="width: 21%;">Login</button></a>
  </div></center>

  <div class="container" style="background-color:#f1f1f1">
    <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a>
  </div>
</form>



</body>
</html>