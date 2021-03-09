<?php include "db.php" ?>
<?php session_start() ?>
<?php
 if(!isset($_SESSION['nick_name']))   
 {
     header("Location:index.php");
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
                    <li><a href="#">Chat</a></li>
                    <li><a href="studnet_files.php">My Files</a></li>
                    <li><a href="student_attendance.php">Mark Attendance</a></li>

                    <li><a href="logout_student.php">LogOut &#x2192;</a></li>
                </ul>
            </div>
        </div>
        <div class="chat_container" >
           <div class="chat_box" id="fasak">
            <?php
               $query="select * from chatting";
               $result=mysqli_query($connection,$query);
               
               while($row=$result->fetch_assoc())
               {
                   //echo "<p>".$row['name'].":\n".$row['message']."</p>";
                   //echo "<p>""</p>";
                   
                  if($row['name']==$_SESSION['nick_name'])
                  {
                      
                      echo "<div class='user'>";
                      echo "<p>".$row['message']."</p>";
                      echo "</div>";
                  }
                   else
                   {
                       //echo "djsf"
                        echo "<div class='other'>";
                        echo "<p>".$row['name'].":\n".$row['message']."</p>";
                        echo "</div>";
                   }
               }
            ?>
            
            </div>
            <form method="post" class="chatbox_form">
               <input type="text" name="message" placeholder="Enter message" required>
                <input type="submit" name="send" value="send">
            </form>
    </div>
    <?php
        if(isset($_POST['send']))
        {
            $user=$_SESSION['nick_name'];
            $message=$_POST['message'];
            $query="insert into chatting(name,message) values('$user','$message')";
            mysqli_query($connection,$query);
            header('location:student_chat.php');
           
        }
    ?>
     
    
    </body>
    <script>
        var c=document.getElementById('fasak');
        c.scrollTop=c.scrollHeight;
    </script>
</html>
