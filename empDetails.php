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
<center><table border="2">
  <h1 style="font-family: courier; color:#004d00;"><b>Employee Details</b></h1>
 <tr style="background-color:#80ff80; color: black">
   <th width="130px"style="text-align: center;">Name</th>
   <th width="120px"style="text-align: center;">Company Name</th>
   <th width="100px"style="text-align: center;">Employee ID</th>
   <th width="190px"style="text-align: center;">Email</th>
   <th width="120px"style="text-align: center;">Phone Number</th>
   <th width="200px"style="text-align: center;">Address</th>
   <th>Delete</th>
 </tr>
 <tr>
   <?php
     $sql = "SELECT * FROM empdeet WHERE Employee_ID = '".$_SESSION["Employee_ID"]."'";
    $result = $conn->query($sql);

     if ($result->num_rows > 0) {
    // output data of each row
    while($row2 = $result->fetch_assoc()) {
  echo" 
   <th style='text-align: center;'> ". $row2 ['Name']."</th>
   <th style='text-align: center;'> ".$row2 ['Company_Name']."</th>
   <th style='text-align: center;'>" .$row2 ['Employee_ID']."</th>
   <th style='text-align: center;'>".$row2 ['Email']."</th>
   <th style='text-align: center;'>". $row2 ['PhoneNumber']."</th>
   <th style='text-align: center;'>".$row2 ['Address']."</th> 
      <td><center>
              <form method='post'>
              <input type='hidden' name='id' value='".$row2["Employee_ID"]."'>
              <button class='delbt' name='empdele'> Delete<i class='fa fa-trash w3-large'></i></button>
              </form>
              </center>  
              </td>
              ";
                         }   
       if(isset($_POST['empdele'])){
      $id = $_POST['id'];
        $delete1 =("DELETE FROM empdeet WHERE Employee_ID ='".$id."' ");
       if ($conn->query($delete1) === TRUE) {
    echo "deleted";
    }
    }
}

   ?>
 </tr>
</table></center>
<center><table border="1">
  <h1 style="font-family: courier; color:#004d00;"><b>Booking Details</b></h1>
 <tr style="background-color:#80ff80; color: black">
    <th >Booking id</th>
    <th style="text-align: center;">Name</th>
    <th style="text-align: center;" >Pick up Location</th>
    <th style="text-align: center;" >Drop Off Location</th>
    <th style="text-align: center;" >Pick Up Time</th>
    <th style="text-align: center;" >Phone Number</th>
  </tr>
   <?php
$sql3 = "SELECT book.bid,empdeet.Name,book.Pickup,book.Dropoff,book.PickTime,empdeet.PhoneNumber FROM book , empdeet WHERE book.Employee_ID = '".$eid."' AND empdeet.Employee_ID = '".$eid."'";
$res1 = $conn->query($sql3);
if($res1->num_rows>0)
{
  while ($row=$res1->fetch_assoc()) {
 echo " <tr>
    <th  width='100' style='text-align: center;'>".$row['bid']."</th>
    <th width='120' style='text-align: center;' >".$row['Name']."</th>
    <th width='200' style='text-align: center;' >".$row['Pickup']."</th>
    <th width='200' style='text-align: center;' >".$row['Dropoff']."</th>
    <th  width='200' style='text-align: center;' >".$row['PickTime']."</th>
    <th width='150' style='text-align: center;' >".$row['PhoneNumber']."</th></tr>";
  }
}
   ?>
</table><center>
<center><a href="emplogout.php"><button type="button" name="logout" id="logout" style="width: 15%;">Logout</button></a></center>
</body>
</html>