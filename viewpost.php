<?php include "db.php" ?>
<?php session_start() ?>
<?php
 if(!isset($_SESSION['nick_name']))   
 {
     header("Location:index.php");
 }
?>
<?php
$title="";
$contentbody="";
$post_date="";
if(isset($_GET['post_view']))
{

    $post_date = $_GET['post_view'];
    if($post_date !=null)
    {
        $query = "SELECT * FROM posts WHERE date='$post_date'";
        $result = mysqli_query($connection,$query);
        $row = $result->fetch_assoc();
        $file = $row['files'];
        $title = $row['title'];
        $contentbody= $row['content'];
    }

    
}
else
    {
        header("Location:student_posts.php");
    }


?>
<?php

$post_date;
$commentor_name=$_SESSION['nick_name'];
$comment_data="";
if(isset($_POST['submit']))
{
    $comment_data=$_POST['comment_data'];
    $query="INSERT INTO comments(commenter_name,comment_data,post_time) VALUES ('$commentor_name','$comment_data','$post_date')";
    $comment_query=mysqli_query($connection,$query);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>
    Class Management System
</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
    <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css">-->
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
        <section class="blog_area section-gap single-post-area">
        <div class="container box_1170">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main_blog_details">
                        <h4><?php echo $title; ?></h4>
                        <div class="user_details">
                            <div class="float-right">
                                <div class="media">
                                    <div class="media-body">
                                        
                                        <p><?php echo $post_date; ?></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <p><?php echo $contentbody; ?></p>
                        <p>Attachments</p>
                        <p><a href='post_files/<?php echo $file; ?>' target="_blank"><?php echo $file; ?></a></p>
                    </div>
                    <?php
                        $comment_query = "SELECT * FROM comments WHERE post_time='$post_date'";
                        $my_comment_query=mysqli_query($connection,$comment_query);
                        while($comment_row=$my_comment_query->fetch_assoc())
                            {
                                $commenter=$comment_row['commenter_name'];
                                $commenter_data=$comment_row['comment_data'];
                                /*echo "<li><b>$commenter</b>:$commenter_data</li>";*/
                                echo "<div class='comments-area'>
                                        <div class='comment-list'>
                                            <div class='single-comment justify-content-between d-flex'>
                                                <div class='user justify-content-between d-flex'>
                                                    
                                                    <div class='desc'>
                                                        <h5><a href='#'>$commenter</a></h5>
                                                        <p class='comment'>
                                                            $commenter_data
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                            }
                    ?>
                    

                    
                    <div class="comment-form">
                        <h4 style="color: black;">Comment</h4>
                        <form method="POST" action="">
                            <div class="form-group">

                                <textarea class="form-control mb-10" rows="5" name="comment_data" placeholder="Comment goes here" required></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn">Comment!!!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
    </html>
