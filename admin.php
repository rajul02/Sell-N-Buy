
<?php 
  include 'dbFunction.php';
  include_once 'dbConnect.php';
  $funObj = new dbFunction($conn);
    if(isset($_POST['new_items']))
    {
      $data = $funObj->getSellingItemById('*');
    }
    else {
      $data = [];
    }

    if(isset($_POST['remove_product'])) {
      if($funobj->removeProduct($_POST['remove_product'])) {
        header("Location: your_items.php");
        die();
      }else {
        echo "Delete Failed";
      }
    }



    if(isset($_POST['profit']))
    {
      $funObj->profitPerUser();
    }



     if(isset($_POST['stopbid']))
    {
      $funObj->stopBid();
    }
     if(isset($_POST['stop_item_bid']))
     {
       $id = $_POST['item_id']; 
      
       $query = "UPDATE item SET permission = 0  WHERE item_id = '$id'";
       $query1 = "UPDATE item SET stop_bid=1 WHERE item_id = '$id'";  
       $result = mysqli_query($conn,$query);
       $result1 = mysqli_query($conn,$query1);
       if(!$result || !$result1)
       {
        echo "failed";
       }
       $funObj->stopBid();
    }




?>



<!DOCTYPE>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



<style>
ul.sidebar-nav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
}

ul.sidebar-nav input  {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}



ul.sidebar-nav li input:hover:not(.active) {
    background-color: #555;
    color: white;
}
</style>


</head>

<body style="background: #2c3338;
  color: #606468;">
	<?php include 'header.php';?>
	<div id="wrapper">

        <!-- Sidebar -->
        <div class="col-md-3">
            <ul class="sidebar-nav">
               <br>
               

                <li>
                <form name="new_items" method="post" action="">
                	 <input type="submit" name="new_items" value="New Item" style="width:80%; margin-right:20px;border:none; background-color:#f1f1f1">
                </form> 
                </li>

                <li>
                <form name="profit" method="post" action="">
                	 <input type="submit" name="profit" value="Profit/User" style="width:80%;border:none; background-color:#f1f1f1">
                </form> 
                </li>

                <li>
                <form name="stop_bid" method="post" action="">
                	 <input type="submit" name="stopbid" value="Stop Bid" style="width:80%; margin-right:20px;border:none; background-color:#f1f1f1">
                </form> 
                </li>


                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        
        <!-- /#sidebar-wrapper -->



<div class="container">
  
  <?php foreach($data as $item): ?>
    
    <div class="col-md-3 col-sm-4 col-xs-6" style="background-color: #00A7E1;padding: 5px;margin: 5px;height: 360px;width: 250px">

      <div class="card">
        <div class="rating" align="right" style="margin: 5px">
        <!--<form action="" method="post">
           <button type="submit" name="remove_product" value=<?php echo $item['item_ID'];?>><i class="glyphicon glyphicon-remove"></i></button> 
        </form> -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-<?php echo $item['item_ID']; ?>"><i class="glyphicon glyphicon-remove"></i></button>
        </div>
          <img class="img-responsive" style="height: 220px" src="uploads/<?php echo $item['item_image']; ?>.jpg">
          <div class="container">

            <h5><b><?php echo $item['item_title'].'('.$item['item_ID'].')'; ?></b></h5> 
            <p>Starting Price: ₹<?php echo $item['price'];?>
            </p>
            <p>Quantity: <?php echo $item['quantity']; ?></p>
          </div>
      </div>
          
    </div>

      <div class="modal fade bs-<?php echo $item['item_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <p>Are You Sure you want to remove Product: <?php echo $item['item_title']; ?></p>
              </div>
              <form action="" method="post">
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
              <button type="submit" name="remove_product" value=<?php echo $item['item_ID'];?> class="btn btn-primary">Delete</button>
             
            </div>
             </form>
          </div>
        </div>
      </div>
  <?php endforeach; ?>
</div>


 <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>