<?php include "db.php" ?>
<?php session_start() ?>
<?php
 if(!isset($_SESSION['nick_name']))   
 {
     header("Location:index.php");
 }
    
  
    
?>
<?php
$msg="";
$studentname="";
$idnumber="";
$ipaddress="";
$section="";
$password="";
if(isset($_POST['submit']))
{
    $studentname=$_POST['studentname'];
    $idnumber=strtoupper($_POST['studentid']);
    $ipaddress=$_POST['ipaddress'];
    $section=$_POST['section'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    if($password==$cpassword)
    {
			$res="INSERT INTO students_data(id_number,student_name,section,ip_address,password) VALUES('$idnumber','$studentname','$section','$ipaddress','$password')";
			$result=mysqli_query($connection,$res);
			if($result)
			{
				echo "<script>window.alert('Registered Successfully');</script>";
			}
			else
			{
				echo "<script>window.alert('Registeration Failed');</script>";
			}
	}
	else
	{
		echo "<script>window.alert('Password  and conform password are not same');</script>";
	}		
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>
    Class Management System
</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/png" href="images/favicon.ico"/>
     

</head>

<body>
    <script type="text/javascript" src="main.js"></script>
        <div class="navigation">
            <div class="nav-bar">
            	 <div class="logo">
                     <a href="index.php"><h1>AMS</h1></a>
                </div>
                <ul>
                    <li ><a href="index.php">Home</a></li>
                    <!--<li onclick="openLogin()">Login</li>-->
                    <!--<li onclick="openRegister()">Register</li>-->
                    <li><a href="student_posts.php">Posts</a></li>
                    <li><a href="student_chat.php">Chat</a></li>
                    <li><a href="studnet_files.php">My Files</a></li>
                    <li><a href="student_attendance.php">Mark Attendance</a></li>

                    <li><a href="logout_student.php">LogOut &#x2192;</a></li>
                </ul>
            </div>
        </div>
        <div class="home-Container" >
            <h3> Welcome Student <?php echo $_SESSION['student_name']; ?></h3>
        </div>

</body>
   
</html>
