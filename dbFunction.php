<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	class dbFunction
	{
		//FOR CONNECTION
		public function __construct($conn)
		{
			//conecting to database
			$this->db = $conn;
		}


		//FOR LOGIN
		public function Login($username,$password)
		{
			$res = mysqli_query($this->db, "SELECT * FROM user_details WHERE username='$username' and password='$password'");
			if (!$res) {
    		echo 'Could not run query: ' . mysqli_error();
    		exit;
		}
			$no_rows = mysqli_num_rows($res);
			$user_data=mysqli_fetch_assoc($res);

			if($user_data["user_ID"])

			{	
				$_SESSION['user_ID'] = $user_data["user_ID"];
				$_SESSION['username'] = $user_data["username"];
				//header("Location: blogger.php");
				//echo $user_data["username"];
				return $user_data["user_ID"];
			}
			else
			{
				return false;
			}
		}

		//FOR REGISTRATION
		public function Register($username,$password,$email,$contact)
		{
			
			$d = date_create()->format('Y-m-d');
			
			mysqli_query($this->db, "INSERT INTO `user_details`(`user_ID`, `username`, `password`, `contact`, `email`, `date`) VALUES ('','$username','$password','$contact','$email','$d')");

			
			
		}

		public function Logout()
		{
			session_destroy();
			header("Location: index.php");
		}

		public function addsellingitem($data)
		{
			$d = date_create()->format('Y-m-d');
			$query = "INSERT INTO `item`(`item_ID`, `user_ID`, `category`, `price`, `quantity`, `permission`, `date`) VALUES ('','$data[user_id]','$data[category]','$data[price]','$data[quantity]','0','$d')";

			

			//echo $query;

			$q = mysqli_query($this->db,$query);
			//$id = mysql_insert_id();
			//echo $q;
			if($q) {
				$query = "SELECT LAST_INSERT_ID()";
				$result = mysqli_query($this->db,$query);
				$id = $result->fetch_assoc();
				$id = $id['LAST_INSERT_ID()'];
				
				$query = "INSERT INTO `item_detail`(`item_detail_ID`, `item_ID`, `item_desc`, `item_title`, `item_image`) VALUES ('','$id','$data[item_desc]','$data[item_title]','$data[item_image]')";

				//echo $query;
				
				$q = mysqli_query($this->db,$query);

				if($q) {
					return true;
				}
				//echo 'success';
				return true;

			}else {
				echo mysqli_error($this->db);
				return false;
			}
			//print_r($q);
		}

		public function getSellingItemById($id) {
			if($id != "*") {
				$query = "SELECT * from item NATURAL JOIN item_detail WHERE item.user_ID = '$id'";
				//echo $query;
				$result = mysqli_query($this->db,$query);
				//echo mysqli_error($this->db);
				//print_r($result);
				if ($result->num_rows > 0) {
					
				    while($row = $result->fetch_assoc()) {
				        $data[] = $row;
				    }
				} 
				else {
				    echo "0 results";
				}

				return $data;
			}
			else {
				$query = "SELECT * from item NATURAL JOIN item_detail";

				$result = mysqli_query($this->db,$query);
				//echo mysqli_error($this->db);
				//print_r($result);
				if ($result->num_rows > 0) {
					
				    while($row = $result->fetch_assoc()) {
				        $data[] = $row;
				    }
				} 
				else {
				    echo "0 results";
				}

				return $data;
			}
		}
		


	}

		
?>