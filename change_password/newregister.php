<?php include "db.php" ?>
<?php
$msg="";
$studentname="";
$idnumber="";
$ipaddress="";
$section="";
$dob="";
$password="";
$cpassword="";

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
            $salt="tEcHwOrLd";
		      $password=crypt($password,$salt);
			$res="INSERT INTO students_data(id_number,student_name,section,ip_address,password) VALUES('$idnumber','$studentname','$section','$ipaddress','$password')";
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
                     <a href="../index.php"><h1>AMS</h1></a>
                </div>
                <ul>
                    <li ><a href="index.php">Home</a></li>
                    <li><a href="newregister.php">New Registration</a></li>
                    
                </ul>
            </div>
        </div>
    <div class="loginform" id="registerpop">
            <form method="post" action="newregister.php">
                <h3>Register</h3>
                <input type="text" value="" name="studentid" placeholder="Student ID" maxlength="7" class="userid" required/>
                <input type="text" value="" name="studentname" class="userid" placeholder="Student Name" required/>
                <input type="text" value="" name="section"  placeholder="Ex:S16" required/>
                <input type="text" value="<?php
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
						echo getRealIpAddr();
						?>" name="ipaddress"  placeholder="IP Address" required readonly/>
                <input type="password" value="" placeholder="Password" name="password" class="password" required/>
                <input type="password" value="" placeholder="Confirm Password" name="cpassword" class="password" required/>
                
                <button class="button" name="submit" type="submit">Submit</button>
                
            </form>
        </div>
</body>
   
</html>
