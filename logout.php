<?php session_start() ?>
<?php
$_SESSION['id_number'] = null;
$_SESSION['name'] = null;
    
header("Location:admin.php");
    
?>        