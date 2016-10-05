<?php include 'header.php'; ?>


<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(isset($_SESSION['username'])){
    	
    	include 'dbFunction.php';
		include_once 'dbConnect.php';

		$funobj = new dbFunction($conn);

		$data = $funobj->getSellingItemById($_SESSION['user_ID']);
		//print_r($data);
		if(count($data) == 0){
			$data = [];
		}

    }else {

    	header("Location: index.php");
    }

    if(isset($_POST['remove_product'])) {
    	if($funobj->removeProduct($_POST['remove_product'])) {
    		header("Location: your_items.php");
    		die();
    	}else {
    		echo "Delete Failed";
    	}
    }
?>

<div class="container">
	
	<?php foreach($data as $item): ?>
		
		<div class="col-md-3 col-sm-4 col-xs-6" style="background-color: #00A7E1;padding: 5px;margin: 5px;height: 350px;width: 250px">

			<div class="card">
				<div class="rating" align="right" style="margin: 5px">
				<form action="" method="post">
					<button type="submit" name="remove_product" value=<?php echo $item['item_ID'];?>><i class="glyphicon glyphicon-remove"></i></button>
				</form>
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
	<?php endforeach; ?>
</div>

		
	
	


<?php include 'footer.php'; ?>