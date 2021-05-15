<?php
session_start();
if(!isset($_SESSION['admin']))
{
	header("location:admin.php");
	 $_SESSION["admin"] = $admin;
}

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
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" style="color:  #32CD32; font-style: serif;font-size:  25px;">Pick N drop</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"> Signup</span>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Signupform.php"><button name="regdir">Reister for Driver</button></a></li>
          <li><a href="Empsignupform.php"><button name="regemp">Reister for Employee</button></a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"> Login</span>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="driverlogin.php"><button name="logindir">Login for Driver</button></a></li>
          <li><a href="driverlogin.php"><button name="loginEmp">Login for Employee</button></a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<center><table border="1">
  <h1 style="font-family: courier; color:#004d00;"><b>Employee Details</b></h1>
 <tr style="background-color:#80ff80; color: black">
   <th width="90px"  style="text-align: center;">Name</th>
   <th width="120px" style="text-align: center;">Company Name</th>
   <th width="100px" style="text-align: center;">Employee ID</th>
   <th width="190px" style="text-align: center;">Email</th>
   <th width="120px" style="text-align: center;">Phone Number</th>
   <th width="200px" style="text-align: center;">Address</th>
 </tr>
 <tr>
   <?php
     $sql = "SELECT * FROM empdeet ";
    $result = $conn->query($sql);

     if ($result->num_rows > 0) {
    // output data of each row
    while($row2 = $result->fetch_assoc()) {
  echo" <tr>
  <th width='200px' style='text-align: center;'> ". $row2 ['Name']."</th>
   <th style='text-align: center;'> ".$row2 ['Company_Name']."</th>
   <th style='text-align: center;'>" .$row2 ['Employee_ID']."</th>
   <th style='text-align: center;'>".$row2 ['Email']."</th>
   <th style='text-align: center;'>". $row2 ['PhoneNumber']."</th>
   <th style='text-align: center;'>".$row2 ['Address']."</th> </tr>";
      }
}

   ?>
 </tr>
</table></center>
<center><table border="1">
  <h1 style="font-family: courier; color:#004d00;"><b>Booking Details</b></h1>
 <tr style="background-color:#80ff80; color: black">
    <th style="text-align: center;">Booking id</th>
    <th style="text-align: center;">Name</th>
    <th style="text-align: center;">Pick up Location</th>
    <th style="text-align: center;">Drop Off Location</th>
    <th style="text-align: center;">Pick Up Time</th>
    <th style="text-align: center;">Phone Number</th>
    <th style="text-align: center;">Drive ID</th>
  </tr>
   <?php
$sql3 = "SELECT book.bid,book.Pickup,book.Dropoff,book.PickTime,empdeet.Name,empdeet.PhoneNumber,empdeet.Employee_ID,book.Employee_ID,book.DriveID FROM book,empdeet WHERE empdeet.Employee_ID = book.Employee_ID";
$res1 = $conn->query($sql3);
if($res1->num_rows>0)
{
  while ($row=$res1->fetch_assoc()) {
 echo " <tr>
    <th style='text-align: center;'>".$row['bid']."</th>
    <th width='200px' style='text-align: center;'>".$row['Name']."</th>
    <th width='200px' style='text-align: center;'>".$row['Pickup']."</th>
    <th width='200px' style='text-align: center;'>".$row['Dropoff']."</th>
    <th width='200px' style='text-align: center;'>".$row['PickTime']."</th>
    <th width='150px' style='text-align: center;'>".$row['PhoneNumber']."</th>
    <th style='text-align: center;'>".$row['DriveID']."</th></tr>";
  }
}
   ?>
</table><center>
<center><table border="1">
  <h1 style="font-family: courier; color:#004d00;"><b>Driver Details</b></h1>
 <tr style="background-color:#80ff80; color: black">
  <th width="70px" style="text-align: center;">Driver ID</th>
   <th width="100px" style="text-align: center;">First Name</th>
   <th width="100px" style="text-align: center;">Last Name</th>
   <th width="200px" style="text-align: center;">Email</th>
   <th width="120px" style="text-align: center;">Phone Number</th>
   <th width="70px" style="text-align: center;">City</th>
   <th width="100px" style="text-align: center;">Car Name</th>
   <th width="100px" style="text-align: center;">Car Number</th>
   <th width="200px" style="text-align: center;">Car Insurane Number</th>
   <th width="300px" style="text-align: center;">Experience</th>
 </tr>
 <tr>
   <?php
   $sql = "SELECT * FROM driver ";
  $result = mysqli_query($conn,$sql);
  if($result->num_rows > 0)
  {
  while($row  = $result->fetch_assoc())
  {

  echo"
    
    <tr><th style='text-align: center;'>". $row ['did']."</th>
   <th style='text-align: center;'>". $row ['FirstName']."</th>
   <th style='text-align: center;'>".$row ['LastName']."</th>
   <th style='text-align: center;'>". $row ['Email']."</th>
   <th style='text-align: center;'>".$row ['PhoneNumber']."</th>
   <th style='text-align: center;'>".$row ['City']."</th>
   <th style='text-align: center;'>". $row ['CarName']."</th>
   <th style='text-align: center;'>".$row ['CarNumber']."</th>
   <th style='text-align: center;'>".$row ['CarInsuranceNo']."</th>
   <th style='text-align: center;'>". $row ['Experience']."</th>
</tr>";
}
 }
 ?>
 </tr>
</table>
<center><a href="admin.php"><button type="button" name="logout" id="logout" style="width: 15%;">Logout</button></a></center>
</body>
</html>