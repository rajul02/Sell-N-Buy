<?php
session_start();
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
				//header("Location: blogger.php");
				echo $user_data["username"];
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


	}

		
?>