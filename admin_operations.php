<?php include "db.php"; ?>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['name']))
{
    header ("Location:admin.php");
}

?>
<?php

    
    if(isset($_GET['delete']))
    {
        $the_student_id=($_GET['delete']);
        $delete_query="DELETE FROM students_data WHERE id_number='{$the_student_id}'";
        $query_delete=mysqli_query($connection,$delete_query);
        if($query_delete)
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
                    <li onclick="openDetails()">Student List</li>
                    <li><a href="admin_attendance.php">Attenance</a></li>
                    <li><a href="logout.php" >LogOut &#x2192;</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="home-Container" id="homeContainer" >
            <h3> Welcome Admin:<?php echo $_SESSION['name']; ?></h3>
        </div>
        <div class="student_details" id="studentDetails">
           <a href="admin_operations.php"> <span class="close" onclick="closeDetails()">&times;</span></a>
            <table>
                  <tr>
                    <th >ID Number</th>
                    <th>Student Name</th>
                    <th>Section</th>
                    <th>IP Address</th>
                    <th>Del/Edit</th>

                  </tr>
               
                  <?php
                    
                    
                    if(!$connection)
                    {
                        die("Connection Failed".mysqli_connect_error());
                    }
                    else
                    {
                        $sql="SELECT * FROM students_data ";
                        $result = $connection->query($sql);
                        if(!$result)
                        {
                            echo "Failed";
                        }
                        else
                        {
                               while($row = $result->fetch_assoc())
                                {
                                	/*$id=$row["id_number"];
                                    echo '<tr><td>' . $row["id_number"]. 
                                    '</td><td>' . $row["student_name"] . 
                                    '</td><td>'. $row["section"] . 
                                    '</td><td>' . $row["ip_address"] .
                                    '</td><td>'.'Edit / <a href="admin_operations.php?delete='$id'">Delete</a>' ;*/
                                    $id=$row["id_number"];
                                    $name=$row["student_name"];
                                    $sec=$row["section"];
                                    $ip=$row["ip_address"];
                                    
                                    
                                    echo "<tr>";
                                    echo "<td>$id</td>";
                                    echo "<td>$name</td>";
                                    echo "<td>$sec</td>";
                                    echo "<td>$ip</td>";
                                    echo "<td> <a href='admin_operations.php?delete={$id}'>Delete</a>";
                                    echo "</tr>";
                                    
                                }
                         }

                      }
                    $connection->close(); 
                  ?>
            </table>
        </div>

    </body>
</html>
