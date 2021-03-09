<?php include"db.php"; ?>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['name']))
{
    header ("Location:admin.php");
}
?>
<?php
if(isset($_POST['create_post']))
{
    $post_title=$_POST['post_title'];
    $post_content=$_POST['post_content'];
    $post_image=$_FILES['upload_files']['name'];
    $post_image_temp=$_FILES['upload_files']['tmp_name'];
    $post_date=date('y/m/d,H:i:s');
   /* $post_image_size=$_FILES['upload_files']['size'];
    echo $post_image_size;*/
    move_uploaded_file("$post_image_temp","post_files/$post_image");
    $query="INSERT INTO posts (title,files,content,date) VALUES ('$post_title','$post_image','$post_content','$post_date')";
    $create_post_query=mysqli_query($connection,$query);
    if(!$create_post_query)
    {
       echo "<script>window.alert('Posting failed');</script>";
    }
    else
    {
       echo "<script>window.alert('Posting Succeeded');</script>";
    }
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Add Post
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" type="image/png" href="images/favicon.ico"/>
        <meta name="viewport" content="width=device-width,initial-scale=1">
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
            <form action="" method="POST" enctype="multipart/form-data">
                <h3>Add Post</h3>
                <input type="text" value="" name="post_title" class="posttile" placeholder="Title" required/>
                <textarea name="post_content" rows="10" cols="60" required></textarea>
                <input type="file" name="upload_files" class="files"/>
                <button class="button" name="create_post" type="submit">Upload Post</button>
            </form>
        </div>    
    </body>
</html>
