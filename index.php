<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="style.css">
   <style>
   ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:#434a52 ;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #16aa56;
}

.active {
    background-color: #b5cd60;
}
</style>
</head>
<body>
<div>
  <ul class="class="cl-effect-16 top-nag"">
     <li><a class="active" href="index.php">HOME</a></li>
     <li><a href="#news">CONTACT</a></li>
     <li style="float: right"><a href="login.php">LOGIN</a></li>
     <li style="float: right"><a href="register.php">REGISTER</a></li>
  </ul>
</div>


</body>
</html>

