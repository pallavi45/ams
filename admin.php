<?php include "db.php"; ?>
<?php session_start(); ?>
<?php
if(isset($_SESSION['name']))
{
    header ("Location:admin_operations.php");
}


?>
<?php
if(isset($_POST['submit']))
{
    $user_id=$_POST['id'];
    $password=$_POST['password'];
    //$salt="tEcHwOrLd";
    //$password=crypt($password,$salt);
    //$user_id=mysqli_real_escape_string($connection,$user_id);
    //$password=mysqli_real_escape_string($connection,$user_id);
    //echo $user.$password;
    $query="SELECT * FROM admin_details WHERE id_number='{$user_id}'";
    $select_user_query=mysqli_query($connection, $query);
    if(!$select_user_query)
    {
        echo "<script>window.alert('Password or User Id combination is not correct');</script>";
        die ("Query Failed".mysqli_error($connection));
    }
    while($row=mysqli_fetch_array($select_user_query))
    {
        $db_user_id=$row['id_number'];
        $db_user_name=$row['name'];
        $db_password=$row['password'];
    }
    if($user_id !== $db_user_id && $password !== $db_password)
    {
        echo "<script>window.alert('Password or User Id combination is not correct');</script>";
        header("Location:admin.php");
    }
    else if($user_id == $db_user_id && $password == $db_password)
    {
        $_SESSION['id_number'] = $db_user_id;
        $_SESSION['name'] = $db_user_name;
        
        header("Location:admin_operations.php");
    }
    else
    {
        echo "<script>window.alert('Password or User Id combination is not correct');</script>";
        header("Location:admin.php");
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

    </head>
    <body>
        <div class="navigation">
            <div class="nav-bar">
            	 <div class="logo">
                     <a href="index.php"><h1>AMS</h1></a>
                </div>
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="loginform">
            <form method="post" action="admin.php">
                <h3>Login</h3>
                
                <input type="text" value="" name="id" placeholder="User ID" class="userid"/>
                
                <input type="password" value="" placeholder="Password" name="password" class="password"/>
                <button class="button" type="submit" name="submit">Login &#x21B5</button>
            </form>
        </div>
    </body>
</html>
