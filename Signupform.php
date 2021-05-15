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
      $Driver_Details="CREATE TABLE driver
      (
      did INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      FirstName CHAR(15) NOT NULL,
      LastName CHAR(15) NOT NULL,
      Email VARCHAR(20) NOT NULL,
      PhoneNumber INT(10) NOT NULL,
      Password VARCHAR(10) NOT NULL,
      City CHAR(10) NOT NULL,
      CarName VARCHAR(10) NOT NULL,
      CarNumber VARCHAR(10) NOT NULL,
      CarInsuranceNo VARCHAR(15) NOT NULL,
      Experience VARCHAR(30) NOT NULL
    )";
if(mysqli_query($conn,$Driver_Details))
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
          <li><a href="#"><button name="regdir">Reister for Driver</button></a></li>
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
<!-- Form starting -->
<?php
if(isset($_POST['Submit']))
{
  $flag = 0;
  $Firstname = $_POST['firstname'];

  $Lastname = $_POST['lastname'];
  $Email = $_POST['email'];
  
  function validate_email($Email)
{
return eregi("^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]    {2,6}$", $Email);
}


  $Phonenumber = $_POST['phonenumber'];
  
  
  $Password = $_POST['pass'];
  $City = $_POST['City'];
  $Carbrand = $_POST['cb'];
  $Carnum = $_POST['cn'];
  $CarInsur = $_POST['ci'];
  $Experience = $_POST['experience'];
  $dl = $_POST['dl'];
  $sql = "SELECT * FROM driver";
  $result = $conn->query($sql);
  if($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
        if($row['FirstName'] == $Firstname && $row['LastName'] == $Lastname)
            {
              $flag =1;
            }
        elseif($row['CarNumber'] == $Carnum)
            {
              $flag = 2;
            }
        elseif ($row['Dlno'] == $dl)
           {
              $flag =3;
           }
		   
    }
  }
  if($flag == 0){
  $DriverInsert = "INSERT INTO  driver (FirstName,LastName,Email,PhoneNumber,Password,City,CarName,CarNumber, CarInsuranceNo,Experience,Dlno)
   VALUES('$Firstname','$Lastname','$Email','$Phonenumber','$Password','$City','$Carbrand','$Carnum','$CarInsur','$Experience','$dl')";
    mysqli_query($conn,$DriverInsert);
  }
  elseif($flag==1)
  {
    echo "<script>alert('Driver Name  Already Exists')</script>";
  }
   elseif($flag==2)
  {
    echo "<script>alert('Car Number  Already Exists')</script>";
  }
   elseif($flag==3)
  {
    echo "<script>alert('Driving Licence  Already Exists')</script>";
  }
}


?>
<div class="container">
  <form name="driverform" method="POST" action="">
    <div class="row">
    <div class="col-100">
        <center><label for="Driver"><b><h2 style="color: green;">Driver Registration Form</b></h2></label></center>
      </div>
      <div class="col-25">
        <label for="fname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" placeholder="Your name.." style="width: 100%;" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lastname" placeholder="Your last name.." style="width: 100%;" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">Email</label>
      </div>
      <div class="col-75">
        <input type="email" id="email" name="email" placeholder="Your Email.." required>
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
        <label for="pass">Password</label>
      </div>
      <div class="col-75">
        <input type="Password" id="pass1" name="pass" placeholder="Your Password.." style="width: 100%;">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="confirmpass">Password</label>
      </div>
      <div class="col-75">
        <input type="Password" id="pass2" name="repass" placeholder="re-enter Password.." style="width: 100%;">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="City">City</label>
      </div>
      <div class="col-75">
        <select id="City" name="City">
         <option value="SYC">Select Your City</option>
          <option value="Banglore">Banglore</option>
          <option value="Mumbai">Mumbai</option>
          <option value="Pune">Pune</option>
        </select>
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="carbrand">Car Brand</label>
      </div>
      <div class="col-75">
        <input type="text" id="cb" name="cb" placeholder="Enter Brand.." style="width: 100%;">
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="cn">Car Number</label>
      </div>
      <div class="col-75">
        <input type="text" id="cn" name="cn" placeholder="Enter Car Number.." style="width: 100%;">
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="ci">Car Insurance No.</label>
      </div>
      <div class="col-75">
        <input type="text" id="ci" name="ci" placeholder="Enter Car Insurance No.." style="width: 100%;">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="experience">About your Experience</label>
      </div>
      <div class="col-75">
        <textarea id="experience" name="experience" placeholder="Write something.." style="width: 100%;"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="DL">Driving Licence No.</label>
      </div>
      <div class="col-75">
        <input type="text" id="dl" name="dl" placeholder="Enter Driving Licence Number" style="width: 100%;">
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit" name="Submit" id="Submit">
    </div>
  </form>
</div>
</body>
</html>