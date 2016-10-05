<!DOCTYPE html>

<html>


<head>
 
<link rel="stylesheet" href="css/bootstrap.css">
  
</head>
<body>

<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
    <div>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Sell-N-Buy</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <?php if(isset($_SESSION['username'])): ?>
        <li><a href="sellproduct.php">Sell Product</a></li>
      <?php endif; ?>
      <li><a href="#">Contact</a></li>
      <li><a href="myprofile.php">About Us</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php if(isset($_SESSION['username'])): ?>
      <li><a href="myprofile.php"><span class="glyphicon glyphicon-user"></span> Hi, <?php echo $_SESSION['username']; ?></a></li>
      <li><a href="your_items.php"><span class="glyphicon glyphicon-th-large"></span> Your Items</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    <?php else: ?>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

    <?php endif; ?>
    </ul>
  </div>
</nav>
</div>