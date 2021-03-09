<?php include "db.php"; ?>
<?php session_start(); ?>
<?php
 if(!isset($_SESSION['nick_name']))   
 {
     header("Location:index.php");
 }   
?>


<?php

if(isset($_GET['comment_date']))
{
    //echo $_GET['comment_data'];
    $commentor_name=$_SESSION['nick_name'];
    $commented_post_date=$_GET['comment_date'];
    if(isset($_POST['submit_comment']))
    {
        $comment_data=$_POST['comment_data'];
        $query="INSERT INTO comments(commenter_name,comment_data,post_time) VALUES ('$commentor_name','$comment_data','$commented_post_date')";
        $comment_query=mysqli_query($connection,$query);
        //echo $commentor_name.$commented_post_date.$comment_data;
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>AMS-Posts</title>
        <!--<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>-->
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/png" href="images/favicon.ico"/>
        <script src="main.js"></script>
    </head>
    <body>
        <div class="navigation">
            <div class="nav-bar">
            	 <div class="logo">
                     <a href="index.php"><h1>AMS</h1></a>
                </div>
                <ul>
                    <li ><a href="index.php">Home</a></li>
                    <li><a href="#">Posts</a></li>
                    <li><a href="student_chat.php">Chat</a></li>
                    <li><a href="studnet_files.php">My Files</a></li>
                    <li><a href="student_attendance.php">Mark Attendance</a></li>

                    <li><a href="logout_student.php">LogOut&#x2192;</a></li>
                </ul>
            </div>
        </div>
        <div class="posts">
           <?php
                $post_title="";
                $post_files="";
                $post_content="";
                $row="";
                $query="SELECT * FROM posts order by date desc"; 
                $result=mysqli_query($connection,$query);
                    while($row = $result->fetch_assoc())
                    {
                        $post_title=$row['title'];
                        $post_files=$row['files'];
                        $post_content=$row['content'];
                        $post_date=$row['date'];
                        echo "<h1><a href='viewpost.php?post_view=$post_date'>$post_title</a></h1>";
                        echo "<h4>$post_content</h4>"; 
                        echo "<h5>Attachements</h5><br>";
                        /*echo "<h5>Preview</h5><br>";
                        echo "<iframe src='post_files/$post_files' width='auto' height='auto'></iframe>";
                        echo "<br>";*/
                        echo "<a href='post_files/$post_files' target='_blank'> $post_files &#x2B07;</a>";
                        //echo "<h1>$post_date</h1>";
                        
                        
                    }
            ?>
                
        </div>
    </body>
</html>
