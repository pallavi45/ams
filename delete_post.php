<?php include"db.php"; ?>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['name']))
{
    header ("Location:admin.php");
}


?>

<?php
if(isset($_GET['delete_posts']))
    {
        $the_post_id=($_GET['delete_posts']);
        $delete_query="DELETE FROM posts WHERE date='{$the_post_id}'";
        $query_delete=mysqli_query($connection,$delete_query);
        $delete_comments="DELETE FROM comments WHERE post_time='{$the_post_id}'";
        $comments_delete=mysqli_query($connection,$delete_comments);
        //unlink("post_files/".$title)
        if($query_delete && $comments_delete)
        {
            echo "<script>window.alert('Deleted Successfully');</script>";
        }
        else
        {
            echo "<script>window.alert('Deletion Failed');</script>";
        }
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
        <div class="post_details" id="studentDetails">
          
            <table>
                  <tr>
                    <th >Title</th>
                    <th>Files</th>
                    <th>Content</th>
                    <th>Date & Time</th>
                    <th>Delete</th>
                  </tr>
               
                  <?php
                    
                    
                    if(!$connection)
                    {
                        die("Connection Failed".mysqli_connect_error());
                    }
                    else
                    {
                        $sql="SELECT * FROM posts ";
                        $result = $connection->query($sql);
                        if(!$result)
                        {
                            echo "Failed";
                        }
                        else
                        {
                               while($row = $result->fetch_assoc())
                                {
                                	
                                    $post_title=$row["title"];
                                    $post_files=$row["files"];
                                    $post_content=$row["content"];
                                    $post_date=$row["date"];
                                    
                                    
                                    echo "<tr>";
                                    echo "<td>$post_title</td>";
                                    echo "<td><a href='post_files/$post_files'> $post_files</a></td>";
                                    echo "<td>$post_content</td>";
                                    echo "<td>$post_date</td>";
                                    echo "<td> <a href='delete_post.php?delete_posts={$post_date}'>Delete &times</a>";
                                    echo "</tr>";
                                    
                                }
                                echo "</table>";
                         }

                      }
                    $connection->close(); 
                  ?>
        </div>
    </body>
</html>    
