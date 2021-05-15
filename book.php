<?php
session_start();
if(!isset($_SESSION['Employee_ID'])) 
    {
      header("location:employeelogin.php");
    }
    $eid = $_SESSION['Employee_ID'];
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">

</script>

<?php
$Employee_details = "CREATE TABLE book
(
  bid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Pickup VARCHAR(50) NOT NULL,
  Dropoff VARCHAR(50) NOT NULL,
  PickTime DATETIME NOT NULL,
  Employee_ID VARCHAR(50) NOT NULL
)";
 if(mysqli_query($conn,$Employee_details))
    {
      
    }
    else{
   
  }
?>

<?php
if(isset($_POST['show']))
{
  header("Location:empDetails.php");
}
?>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
   <a class="navbar-brand"  style="color:  #32CD32; font-style: serif;font-size:  25px;">Pick N drop</a>
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
          <li><a href="#"><button name="regemp">Reister for Employee</button></a></li>
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
<!-- Form starting -->
<?php
  if(isset($_POST['book']))
  {
    $pick = $_POST['pa'];
    $drop = $_POST['da'];
    $time = $_POST['time'];
    $book = "INSERT INTO book ( Pickup,Dropoff, PickTime , Employee_ID,status) VALUES ('$pick','$drop','$time','$eid','0')";
    if(mysqli_query($conn,$book))
    {
      echo "<script>alert('Booking Done')</script>";
    }
    else{

  }
  }
?>


<form action="" method="post">
 <div class="col-100">
        <center><label for="Driver"><b><h2 style="color: green;">Booking</b></h2></label></center>
      </div>

 <center> <div class="container">
    <label for="pa"><b></b></label>
    <input type="text" placeholder="Pick Up Address" name="pa" required style="width: 40%"><br>

    <label for="da"><b></b></label>
    <input type="text" placeholder="Drop Off Address" name="da" required style="width: 40%"><br>

<?php
    $currentDateTime = date('Y-m-d H:i:s');
?>
   <input  type="datetime" name = "time" value="<?php echo $currentDateTime;?>"><br>
        
    <button type="submit" name="book" style="width: 21%;">Book</button>
  </div></center>

  <div class="container" style="background-color:#f1f1f1" >
    <a href="empDetails.php"><button type="button" class="cancelbtn"  onclick="getdata('msp.php','mydiv')" name="show">Show Details</button></a>
      <p id="demo"></p>
  </div>
</form>




</body>
</html>