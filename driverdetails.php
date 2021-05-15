  <?php
session_start();
if(!isset($_SESSION["email"]))
    {
      header("location:driverlogin.php");
    }
    $email = $_SESSION["email"];
    $did = $_SESSION["did"];
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
     <a class="navbar-brand"  style="color:  #32CD32; font-style: serif;font-size:  25px;">Pick N drop</a>
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
          <li><a href="employeelogin.php"><button name="loginEmp">Login for Employee</button></a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<center><table border="1">
  <h1 style="font-family: courier; color:#004d00;"><b>Drivers Details</b></h1>
 <tr style="background-color:#80ff80; color: black">
  <th width="70px" style="text-align: center;">Driver ID</th>
   <th width="100px" style="text-align: center;">First Name</th>
   <th width="100px" style="text-align: center;">Last Name</th>
   <th width="200px" style="text-align: center;">Email</th>
   <th width="150px" style="text-align: center;">Phone Number</th>
   <th width="70px" style="text-align: center;">City</th>
   <th width="100px" style="text-align: center;">Car Name</th>
   <th width="100px" style="text-align: center;">Car Number</th>
   <th width="150px" style="text-align: center;">Car Insurane Number</th>
   <th width="100px" style="text-align: center;">Experience</th>
   <th width="50px" style="text-align: center;">Delete</th>
 </tr>
 <tr>
   <?php
   $sql = "SELECT * FROM driver WHERE Email = '".$_SESSION['email']."'";
  $result = mysqli_query($conn,$sql);
  if($result->num_rows > 0)
  {
  while($row  = $result->fetch_assoc())
  {

  echo"
    <th style='text-align: center;'>". $row ['did']."</th>
   <th style='text-align: center;'>". $row ['FirstName']."</th>
   <th style='text-align: center;'>".$row ['LastName']."</th>
   <th style='text-align: center;'>". $row ['Email']."</th>
   <th style='text-align: center;'>".$row ['PhoneNumber']."</th>
   <th style='text-align: center;'>".$row ['City']."</th>
   <th style='text-align: center;'>". $row ['CarName']."</th>
   <th style='text-align: center;'>".$row ['CarNumber']."</th>
   <th style='text-align: center;'>".$row ['CarInsuranceNo']."</th>
   <th style='text-align: center;'>". $row ['Experience']."</th>
   <td><center>
   <form method='POST' action=''>
   <input type='hidden' name='id' value='".$row["did"]."'>
   <button class='delbt' name='deleteempdet'>Delete<i class='fa fa-trash w3-large'></i></button>
   </form>
   </center>
  </td>";
}
if(isset($_POST['deleteempdet']))
   {
    $id = $_POST['id'];
    $delete1 =("DELETE FROM driver WHERE did ='".$id."' " );
    if($conn->query($delete1) === True)
    {
      echo "Deleted";
    }
   }
 }
 ?>
 </tr>
</table></center>
<center><table border="1">
  <h1 style="font-family: courier; color:#004d00;"><b>All Booking</b></h1>
 <tr style="background-color:	 #80ff80; color: black; text-align: center;">
    <th style="text-align: center;">Booking id</th>
    <th style="text-align: center;">Name</th>
    <th style="text-align: center;">Pick up Location</th>
    <th style="text-align: center;">Drop Off Location</th>
    <th style="text-align: center;">Pick Up Time</th>
    <th style="text-align: center;">Phone Number</th>
      <th style="text-align: center;">Accept</th>
  </tr>
   <?php
$sql3 = "SELECT book.bid,book.Pickup,book.Dropoff,book.PickTime,empdeet.Name,empdeet.PhoneNumber,empdeet.Employee_ID,book.Employee_ID FROM book,empdeet WHERE empdeet.Employee_ID = book.Employee_ID AND status = 0 ";
$res1 = $conn->query($sql3);
if($res1->num_rows>0)
{
  while ($row=$res1->fetch_assoc()) {
 echo " <tr>
    <th style='text-align: center;'>".$row['bid']."</th>
    <th style='text-align: center;'>".$row['Name']."</th>
    <th style='text-align: center;'>".$row['Pickup']."</th>
    <th style='text-align: center;'>".$row['Dropoff']."</th>
    <th style='text-align: center;'>".$row['PickTime']."</th>
    <th style='text-align: center;'>".$row['PhoneNumber']."</th>
    <td>
    <form method='POST' action=''>
    <input type='hidden' name='id' value='".$row['bid']."'>
    <button name='show'>Accept</button></form>
    </td>
    </tr>";

  }
}
   ?>

   <div id="show" style="display: none;">
</table><center>

  <table border="1">
    <h1 style="font-family: courier; color:#004d00;"><b>Accepted Bookings</b></h1>
    <tr style="background-color: #80ff80; color: black; text-align: center;">
    <th style="text-align: center;">Booking id</th>
    <th style="text-align: center;">Name</th>
    <th style="text-align: center;">Pick up Location</th>
    <th style="text-align: center;">Drop Off Location</th>
    <th style="text-align: center;">Pick Up Time</th>
    <th style="text-align: center;">Phone Number</th>
  </tr>
  
  <tr>
<?php
$show = "SELECT book.bid,empdeet.Name,book.Pickup,book.Dropoff,book.PickTime,empdeet.PhoneNumber,book.status,empdeet.Employee_ID,book.Employee_ID FROM book,empdeet WHERE empdeet.Employee_ID=book.Employee_ID AND book.status = 1 AND book.DriveID = '$did'";
$res3 = $conn->query($show);
if($res3->num_rows > 0)
{
While($row2 = $res3->fetch_assoc())
{
   echo " <tr>
    <th style='text-align: center;'>".$row2['bid']."</th>
    <th style='text-align: center;'>".$row2['Name']."</th>
    <th style='text-align: center;'>".$row2['Pickup']."</th>
    <th style='text-align: center;'>".$row2['Dropoff']."</th>
    <th style='text-align: center;'>".$row2['PickTime']."</th>
    <th style='text-align: center;'>".$row2['PhoneNumber']."</th>
    </tr>";
}
}
if(isset($_POST['show']))
{
  $id2 = $_POST['id'];
$update = "UPDATE book SET status = 1 , DriveID = '".$did."' WHERE bid = '".$id2."' ";
if(mysqli_query($conn,$update))
{
  echo "<script>alert('Booking updated')</script>";
}
else
{
  echo "not updated";
}
}

?>
    <tr>
  </table>
</div>
<center><a href="driverlogout.php"><button type="button" name="logout" id="logout" style="width: 15%;">Logout</button></a></center>
</body>
</html>