<?php include "db.php" ?>
<?php session_start() ?>
<?php 
    if(isset($_SESSION['student_name']))
    {
        header("Location:student.php");
    }
?>
<?php
    
if(isset($_POST['submitlogin']))
{
//    echo "hello";	
    $student_id=$_POST['id'];
    $student_password=$_POST['password'];
    $salt="tEcHwOrLd";
    $student_password=crypt($student_password,$salt);
    //echo $student_id.$student_password;
    $query="SELECT * FROM students_data WHERE id_number='{$student_id}'";
    $select_user_query=mysqli_query($connection, $query);
    if(!$select_user_query)
    {
        echo "<script>window.alert('Password or User Id combination is not correct');</script>";
        die ("Query Failed".mysqli_error($connection));
    }
    while($row=mysqli_fetch_array($select_user_query))
    {
        $db_student_id=$row['id_number'];
        $db_student_name=$row['student_name'];
        $db_password=$row['password'];
        $db_nick_name=$row['nick_name'];
    }
    
    if($student_id !== $db_student_id && $student_password !== $db_password)
    {
        echo "<script>window.alert('Password or User Id combination is not correct');</script>";
        header("Location:index.php");
    }
    else if ($student_id == $db_student_id && $student_password == $db_password)
    {
        $_SESSION['id_number']=$db_student_id;
        $_SESSION['student_name']=$db_student_name;
        $_SESSION['nick_name']=$db_nick_name;
        header("Location:student.php");
    }
    else
    {
        echo "<script>window.alert('Password or User Id combination is not correct');</script>";
        header("Location:index.php");
    }
}
    
?>    
<?php
$msg="";
$studentname="";
$idnumber="";
$ipaddress="";
$section="";
$password="";
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
                    <li onclick="openLogin()">Login</li>
                    <li onclick="openRegister()">Register</li>
                    <li ><a href="admin.php">Admin</a></li>

                    
                </ul>
            </div>
        </div>
        <div class="home-Container" >
            <h3> Welcome to APIIIT-RK Valley</h3>
            <h3><?php echo $msg; ?></h3>
        </div>
        <div class="loginform-home" id="loginpop">
            <span class="close" onclick="closeForm()">&times;</span>
            <form method="post" action="index.php">
                <h3>Login</h3>
                <input type="text" value="" name="id" placeholder="User ID" class="userid" required/>
                
                <input type="password" value="" placeholder="Password" name="password" class="password" required/>
                <a href='change_password' target='_blank'><h5>Upadate Password</h5></a>
                <button class="button" type="submit" name="submitlogin" >Login &#x21B5;</button>
            </form>
        </div>
    <div class="loginform-home" id="registerpop">
            <span class="close" onclick="closeForm()">&times;</span>
            <form method="post" action="index.php">
                <h3>Register</h3>
                <input type="text" value="" name="studentid" placeholder="User ID" maxlength="7" class="userid" required/>
                <input type="text" value="" name="studentname" class="userid" placeholder="Student Name" required/>
                <input type="text" value="" name="nickname" class="userid" placeholder="Nick Name" required/>
                <input type="text" value="" name="section" class="classroom" placeholder="Ex:S16" required/>
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
						?>" name="ipaddress" class="ip" placeholder="IP Address" required readonly/>
                <input type="password" value="" placeholder="Password" name="password" class="password" required/>
                <input type="password" value="" placeholder="Confirm Password" name="cpassword" class="password" required/>
                
                <button class="button" name="submit" type="submit">Register &#x21B5;</button>
                
            </form>
        </div>
</body>
   
</html>
