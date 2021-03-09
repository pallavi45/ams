<?php include "db.php" ?>
<?php
$password="";
$cpassword="";
$ipaddress=getRealIpAddr();
$row;
$msg="";
//echo $ipaddress;              
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
$query="SELECT * FROM students_data WHERE ip_address='$ipaddress'";
        //$result=mysqli_query($connection,$query);
        if($result=mysqli_query($connection,$query))
        {
            $row = $result->fetch_assoc();
            if(!empty($row))
            {
		        //echo $row["id_number"];
		        if(isset($_POST['submit']))
		        {
		            $password=$_POST['password'];
		            $cpassword=$_POST['conformpassword'];
		            //echo $password." ".$cpassword;
		            $salt="tEcHwOrLd";
		            $password=crypt($password,$salt);
		            $cpassword=crypt($cpassword,$salt);		            
		            if($password==$cpassword)
		            {

		                
		                    $update="UPDATE students_data SET password='$password' WHERE ip_address='$ipaddress'";
		                    $password_update=mysqli_query($connection,$update);

		                    if($password_update)
		                    {
		                        echo "<script>window.alert('Password Updated Successfully');</script>";
		                    }
		                    else
		                    {
		                        echo "<script>window.alert('Password Update Failed');</script>";
		                    }
		                
		            }
		            else
		            {
		            	echo "<script>window.alert('Password  and conform password are not same');</script>";
		            }
            	}
            }	
            else
            {
            	//echo "<script>window.alert('IP Address Not found');</script>";   
            	header("Location: newregister.php");
            }
        }
        else
        {
            echo "<script>window.alert('IP Address Not found');</script>";   
        }
        //$row = $result->fetch_assoc();
        
/**/

?>
<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
		<title>Class Management System</title>        
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="icon" type="image/png" href="images/favicon.ico">

    </head>
    <body>
        <div class="navigation">
            <div class="nav-bar">
            	 <div class="logo">
                     <a href="../index.php"><h1>AMS</h1></a>
                </div>
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="newregister.php">New Registration</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="loginform">
            <form method="POST" action="index.php">
                <h3>Register</h3>
                <input type="text" value="<?php echo $row["id_number"]; ?>" name="id" placeholder="Student ID" class="userid" readonly/>
                <input type="text" value="<?php echo $row["student_name"]; ?>" name="id" placeholder="Student Name" class="userid" readonly/>
                <input type="password" value="" placeholder="Password" name="password" class="password" required/>
                <input type="password" value="" placeholder="Password" name="conformpassword" class="password" required/>
                <button class="button" name="submit" type="submit">Submit</button>
                <h1><?php echo $msg; ?></h1>
            </form>
        </div>
    </body>
</html>
