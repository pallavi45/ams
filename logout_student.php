<?php session_start() ?>
<?php
$_SESSION['id_number'] = null;
$_SESSION['student_name'] = null;
$_SESSION['nick_name'] = null;    
header("Location:index.php");
    
?>        