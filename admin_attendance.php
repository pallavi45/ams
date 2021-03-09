<?php include "db.php"; ?>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['name']))
{
    header ("Location:admin.php");
}

?>
<?php
if(isset($_POST['subject']))    
{
    $subject_name = $_POST['presubject'];
    //echo $subject_name;
    $sql="UPDATE attendance SET subject='$subject_name' WHERE id=1";
    mysqli_query($connection,$sql);
    header("Location:admin_attendance.php");
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
<!DOCTYPE html>
<html>

    <head>
        <title>Class Management System</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="icon" type="image/png" href="images/favicon.ico">
        <script type="text/javascript" src="main.js"></script>
    </head>
    <body>
        
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
                    <li><a href="admin_operations.php">Student List</a></li>
                    <li><a href="admin_attendance.php">Attenance</a></li>
                    <li><a href="logout.php" >LogOut &#x2192;</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="loginform">
                <form method="post" action="">
                    <h3>Present Subject:<?php echo $name ?></h3>
                    <h3>Select Subject</h3>
                    
                    
                    <select name="presubject">
                        <option value="" >Select a Subject</option>
                        <option value="SE">SOFTWARE ENGINEERING</option>
                        <option value="CN">COMPUTER NETWORKS</option>
                        <option value="MAD">MOBILE APPLICATION DEVELOPMENT</option>
                        <option value="IAI">INTRODUCTION TO ARTIFICIAL INTELLIGENCE</option>
                        <option value="ICC">INTRODUCTION TO CLOUD COMPUTING</option>
                        <option value="IR">INTRODUCTION TO ROBOTICS</option>
                        <option value="SELAB">SOFTWARE ENGINEERING LAB</option>
                        <option value="MADLAB">MOBILE APPLICATION DEVELOPMENT LAB</option>
                        <option value="CNLAB">COMPUTER NETWORKS LAB</option>
                        <option value="ENG">ENGLISH</option>
                    </select>
                    
                    <button class="button" type="submit" name="subject">Submit &#x21B5</button>
                </form>
        </div>
    </body>
</html>