<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<?php

    include "connection1.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $dob = $_POST['dob'];
    $pincode = $_POST['pincode'];
	$filename = $_FILES["photo"];
    $email = $_POST['email'];
	 $password = $_POST['password'];
	if(isset($_POST['email']))
	{
		
		$sql = "select * from user WHERE email='".$email."'";
		//echo $sql;
		//exit();
		$rs = mysqli_query($conn, $sql);
		if(mysqli_num_rows($rs)==0)
		{
			$filename = "base.jpg";
			if(isset($_FILES["photo"]))
			{
			$filename = $_FILES["photo"]["name"];
			$tempname = $_FILES["photo"]["tmp_name"];    
					$folder = "images/".$filename;
					 
					// Now let's move the uploaded image into the folder: image
					if (move_uploaded_file($tempname, $folder))  
					{
					}
			}

				$sql = "INSERT INTO user(`id`, `fname`,`lname`,`address`,`gender`,`state`,`city`,`dob`,`pincode`,`email`,`password`,`photo`) VALUES (NULL, '$fname', '$lname','$address','$gender','$state','$city','$dob','$pincode','$email','$password','$filename')";
					if (mysqli_query($conn, $sql))
					{

					echo " <script type='text/javascript'>  $(document).ready(function() { $('#myModal').modal('show'); });</script>";
						
					}
					else
					{
					echo "Error: " . $sql . "" . mysqli_error($conn);
					}
					mysqli_close($conn);
		}
		else
		{
			session_start();
			
			$_SESSION['alertmsg'] = "User Already Exist. Please Try with other Email Id";
			header("Location:Registration-form.php");
		}
	}
?>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">PLEASE WAIT...</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
       Congratulations!!<br/>
You've successfully registered with us.
      </div>

      <div class="modal-footer">
        <a href="index.php" class="btn btn-danger" data-bs-dismiss="modal" onclick="javascript:window.location='index.php'">Close</a>
      </div>

    </div>
  </div>
</div>

</body>
</html>


