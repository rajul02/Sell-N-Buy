<!DOCTYPE html>

<html>


<head>
 
<style>
  
.header .header-nav ul#nav-account ul.dropdown-menu,
.header .header-nav ul#nav-library ul.dropdown-menu {
    position: relative;
    z-index: 10000;
    
}

</style>

<link rel="stylesheet" href="css/bootstrap.css">
  
</head>
<body style="background: #2c3338;
  color: #606468;">

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
    <?php if(isset($_SESSION['username']) && $_SESSION['username'] != "Admin"): ?>
      <li><a href="myprofile.php"><span class="glyphicon glyphicon-user"></span> Hi, <?php echo $_SESSION['username']; ?></a></li>
      <li><a href="your_items.php"><span class="glyphicon glyphicon-th-large"></span> Your Items</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    <?php elseif(isset($_SESSION['username']) && $_SESSION['username'] == "Admin"): ?>
      <li><a href="myprofile.php"><span class="glyphicon glyphicon-user"></span> Hi, <?php echo $_SESSION['username']; ?></a></li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    <?php else: ?>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

    <?php endif; ?>
    </ul>
  </div>
</nav>
</div>