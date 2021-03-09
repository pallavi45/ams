<?php include "db.php" ?>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['name']))
{
    header ("Location:admin.php");
}
?>
<?php
$msg="";
$studentname="";
$idnumber="";
$ipaddress="";
$section="";
$password="";
$cpassword="";
$nickname="";
if(isset($_POST['submit']))
{
    $studentname=$_POST['studentname'];
    $idnumber=strtoupper($_POST['studentid']);
    $ipaddress=$_POST['ipaddress'];
    $section=$_POST['section'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $nickname=$_POST['nickname'];
    if($password==$cpassword)
    {
            $salt="tEcHwOrLd";
            $password=crypt($password,$salt);
			$res="INSERT INTO students_data(id_number,student_name,section,ip_address,password,nick_name) VALUES('$idnumber','$studentname','$section','$ipaddress','$password','$nickname')";
			$result=mysqli_query($connection,$res);
			if($result)
			{
				echo "<script>window.alert('Registered Successfully');</script>";
			}
			else
			{
				echo "<script>window.alert('Registeration Failed ID is Already Recorded');</script>";
			}
	}
	else
	{
		echo "<script>window.alert('Password  and confirm password are not same');</script>";
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
                    <li><a href="admin.php" class="active">Home</a></li>                   
                    <li><a href="add_student.php">Add Student</a></li>
                    <li><a href="add_post.php">New Post</a></li>
                    <li><a href="delete_post.php">All Posts</a></li>
                    <li><a href="admin_operations.php"> Student List</a></li>
                    <li><a href="admin_attendance.php">Attenance</a></li>
                    <li><a href="logout.php" >LogOut &#x2192;</a></li>
                    
                </ul>
            </div>
        </div>
    <div class="loginform" id="registerpop">
            <form method="post" action="add_student.php">
                <h3>Register</h3>
                <input type="text" value="" name="studentid" placeholder="Student ID" maxlength="7" class="userid" required/>
                <input type="text" value="" name="studentname" class="userid" placeholder="Student Name" required/>
                <input type="text" value="" name="nickname" class="userid" placeholder="Nick Name" required/>
                <input type="text" value="" name="section" class="classroom" placeholder="Ex:S16" required/>
                <input type="text" value="" name="ipaddress" class="ip" placeholder="IP Address" required />
                <input type="password" value="" placeholder="Password" name="password" class="password" required/>
                <input type="password" value="" placeholder="Confirm Password" name="cpassword" class="password" required/>
                
                <button class="button" name="submit" type="submit">Submit</button>
                
            </form>
        </div>
</body>
   
</html>
