<?php include "db.php" ?>
<?php session_start() ?>
<?php
 if(!isset($_SESSION['nick_name']))   
 {
     header("Location:index.php");
 }
?>
<?php
if(isset($_GET['delete_file']))    
{
    $the_file_id = ($_GET['delete_file']);
    $display = "SELECT * FROM student_files WHERE id='$the_file_id'";
    $display_result = mysqli_query($connection,$display);
    $row = $display_result->fetch_assoc();
    $title = $row['file_name'];
    $delete_query = "DELETE FROM student_files WHERE id='$the_file_id'";
    $delete_result = mysqli_query($connection,$delete_query);
    
    if($delete_result )
    {
        if(unlink("student_files/".$title))
        {
            echo "<script>window.alert('Deleted Successfully');</script>";
        }
        else        {
            echo "<script>window.alert('Failed to delete);</script>";
        }
        
    }
    else
    {
        echo "<script>window.alert('Failed to delete');</script>";
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
                    <li><a href="studentFileUpload.php">UploadNew File</a></li>
                    <li><a href="student_attendance.php">Mark Attendance</a></li>

                    <li><a href="logout_student.php">LogOut &#x2192;</a></li>
                </ul>
            </div>
        </div>
        <div class="post_details">
            <table>
                <tr>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Delete</th>
                </tr>
            <?php
                $id = $_SESSION['id_number'];
                //echo $id;
                $query="SELECT * FROM student_files WHERE student_id = '$id'";    
                $result = mysqli_query($connection,$query);
                while($row = $result->fetch_assoc())
                {
                    $file_title = $row['file_name'];
                    $file_id = $row['id'];
                    echo "<tr>";
                    echo "<td>$file_title</td>";
                    echo "<td><a href='student_files/$file_title' download>$file_title</a>";
                    echo "<td><a href='studnet_files.php?delete_file=$file_id'>Delete</a></td>";
                    echo "</tr>";
                        
                }
                echo "</table>";
                
            ?>
    
    </div>
    </body>
</html>
