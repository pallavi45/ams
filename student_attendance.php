<?php include "db.php" ?>
<?php session_start() ?>
<?php
 if(!isset($_SESSION['nick_name']))   
 {
     header("Location:index.php");
 }
?>
<?php
$name="";
$query="SELECT * FROM attendance";
$result=mysqli_query($connection,$query);
while($row=$result->fetch_assoc())
{
    $name=$row['subject'];
}

?>
<?php
$ip_address="";
	function getRealIpAddr()
	{
	   if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
		{
			  $ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
		{
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
}
		$ip_address = getRealIpAddr();
//echo $ip_address;
?>
<?php
$msg="";
$date=date('Y-m-d');
$student_id=$_SESSION['id_number'];
$ip_query="SELECT * FROM students_data WHERE ip_address='$ip_address'";
$main = mysqli_query($connection,$ip_query);
$row=$main->fetch_assoc();
if($row!=null)
{
    //echo "<script>window.alert('IP Found);</script>";
    if(isset($_POST['mark']))
    {
        $query = "INSERT INTO $name (student_id,date) VALUES ('$student_id','$date')";
        if($result = mysqli_query($connection,$query))
        {
            echo "<script>window.alert('Successfully Marked Attendance for $name');</script>";
        }
        else
        {
            $msg="Already Marked ";
        }

    }
}
else
{
    //echo "<script>alert('IP NOT Found);</script>";
    $msg="You Are Not in class and attendance will not be marked";
    //echo $msg;
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
                    <li><a href="#">Chat</a></li>
                    <li><a href="studnet_files.php">My Files</a></li>
                    <li><a href="student_attendance.php">Mark Attendance</a></li>

                    <li><a href="logout_student.php">LogOut &#x2192;</a></li>
                </ul>
            </div>
        </div>
       <!-- <div class="home-Container" >
            <h3> Mark Attendance for <?php echo $name; ?></h3>
            
        </div>-->
    <div class="loginform">
                <form method="post" action="">
                    
                    <h3>Mark Here</h3>
                    
                    <button class="button" type="submit" name="mark">Mark for <?php echo $name; ?>&#x21B5;</button>
                    <h3 ><?php echo $msg; ?></h3>
                </form>
        </div>
    

</body>
   
</html>
