<?php include "db.php" ?>
<?php session_start() ?>
<?php
 if(!isset($_SESSION['nick_name']))   
 {
     header("Location:index.php");
 }
?>
<?php
if(isset($_POST['upload_file']))
{
    $student_id = $_SESSION['id_number'];
    $file_name = $_FILES['upload_files']['name'];
    $temp_file_name = $_FILES['upload_files']['tmp_name'];
    move_uploaded_file ("$temp_file_name","student_files/$file_name");
    $query = "INSERT INTO student_files(student_id,file_name) VALUES ('$student_id','$file_name') ";
    $result = mysqli_query($connection,$query);
    if(!$result)
    {
        echo "<script>window.alert('Uploading failed');</script>";
    }
    else
    {
        echo "<script>window.alert('Uploading Successfull');</script>";
        header("Location:studnet_files.php");
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
        <div class="loginform">
            <form action="" method="POST" enctype="multipart/form-data">
                <h3>Add File</h3>
                <input type="file" name="upload_files" class="files"/>
                <button class="button" name="upload_file" type="submit">Upload File</button>
            </form>
        </div>    
        
    </body>
</html>
