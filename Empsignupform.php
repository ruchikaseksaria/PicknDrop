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
<?php
$Employee_details = "CREATE TABLE empdeet
(
  bid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Name CHAR(20) NOT NULL,
Company_Name VARCHAR(15) NOT NULL,
Employee_ID VARCHAR(6) NOT NULL,
Email VARCHAR(20) NOT NULL,
Password VARCHAR(10) NOT NULL,
PhoneNumber INT(10) NOT NULL,
Address VARCHAR(30) NOT NULL
)";
if(mysqli_query($conn,$Employee_details ))
{
 
}
else
{
  
}
?>
<script type="text/javascript">
    $(function () {
        $("#Submit").click(function () {
            var password = $("#pass1").val();
            var confirmPassword = $("#pass2").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
   <a class="navbar-brand"  href="index.php"style="color:  #32CD32; font-style: serif;font-size:  25px;">Pick N drop</a>
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
  if(isset($_POST['Submit']))
  { $flag=0;
    $Name = $_POST['name'];
    $cmpname = $_POST['cmpname'];
    $eid = $_POST['eid'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $number = $_POST['phonenumber'];
    $address = $_POST['address'];
    $sql2 = "SELECT * FROM empdeet";
    $result = $conn->query($sql2);
    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {

        if($row['Employee_ID'] == $eid)  
      {
        $flag=1;
      }
        elseif($row['Name'] == $Name)
      {
        $flag =2;
      }
      }
    }
   
    if($flag==0)
    {
      $Empinsert = "INSERT INTO empdeet (Name,Company_Name,Employee_ID,Email,Password,PhoneNumber,Address) VALUES ('".$Name."','".$cmpname."','".$eid."','".$email."','".$pass."','".$number."','".$address."')";
       mysqli_query($conn,$Empinsert);
    }
        elseif($flag == 1)
        {
            echo "<script>alert('Employee ID is Already Exists')</script>";       
        }
         elseif($flag == 2)
        {
            echo "<script>alert('Employee Name is Already Exists')</script>";       
        }
 
 } 
        
?>


<div class="container">
  <form name="empform" method="POST" action="">
    <div class="row">
    <div class="col-100">
        <center><label for="Driver"><b><h2 style="color: green;">Employee Registration Form</b></h2></label></center>
      </div>
      <div class="col-25">
        <label for="name">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="Your name.." style="width: 100%;" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="cmpname">Company Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="cmpname" name="cmpname" placeholder="Your Company Name.." style="width: 100%;" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="eid">Employee ID</label>
      </div>
      <div class="col-75">
        <input type="text" id="eid" name="eid" placeholder="Your Employee ID.." style="width: 100%;" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">Email</label>
      </div>
      <div class="col-75">
        <input type="email" id="email" name="email" placeholder="Your Email.." required()>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="pass">Password</label>
      </div>
      <div class="col-75">
        <input type="Password" id="pass1" name="pass" placeholder="Your Password.." style="width: 100%;" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="donfirmpass">Re-Enter Password</label>
      </div>
      <div class="col-75">
        <input type="Password" id="pass2" name="repass" placeholder="re-enter Password.." style="width: 100%;" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="num">Phone Number</label>
      </div>
      <div class="col-75">
        <input type="number" id="number" name="phonenumber" placeholder="Your Phone Number.." style="width: 100%; height: 45px; border-radius: 5px;">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Address">Address</label>
      </div>
      <div class="col-75">
        <textarea id="address" name="address" placeholder="Address.." style="width: 100%;"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit" name="Submit" id="Submit">
    </div>
  </form>
</div>

</body>
</html>