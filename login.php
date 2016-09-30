<?php 

 include 'dbFunction.php';
include_once 'dbConnect.php';

$funObj = new dbFunction($conn);
  if(isset($_POST['login']))
  {
    
    $username = $_POST['username'];

    $password =$_POST['password'];
    if($username=='admin' && $password=='system123')
    {
      
      header("Location: admin.php");

    }
    else
    {
      $user = $funObj->Login($username,$password);
    if(!$user)
      echo " Incorrect username or password";
    
    }
  }

  if(isset($_POST['register']))
  {
    header("Location: register.php");
  }

?>





<html>
<head>
  <meta charset="utf-8">
    <title>SellNBuy</title>
    
    <link rel="stylesheet" href="style.css">

</head>
<body>

   <div id="login">
   <h1 style=" color: White ; font-family: sans-sherif"><center>Sell N Buy</center></h1>
   <h2 style=" color: White; font-family: arial"><center>Login</center></h2>
      <form name='form-login' method="post" action="">

        <span class="fontawesome"></span>
          <input type="text" id="user" name= "username"  placeholder="Username" required="required">
       
        <span class="fontawesome"></span>
          <input type="password" id="pass" name="password"  placeholder="Password" required="required">
        
        <input type="submit" value="Login" name="login">
        <br><br>

      </form>
      <br>
      <form method="post" action="">
         <input type="submit" value="Register" name="register">
      </form>
        

    </div>
</body>
   
</html>