<?php include 'header.php';?>

<?php 

include 'dbFunction.php';
include_once 'dbConnect.php';

$funobj = new dbFunction($conn);

$funobj->Logout();
  
?>

<?php include 'footer.php'; ?>
