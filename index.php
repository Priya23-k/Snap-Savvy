<html>
	<head>
		<title>Log-In Page</title>
		<link rel="stylesheet" href="Registration-form-style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	</head>
	
	<body>
	

		<section class="h-100" style="background-image:url('Background.jpg');">
		  <div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
			  <div class="col">
				<div class="card card-registration my-4">
				<?php
				session_start();
				if(isset($_SESSION['alertmsgg']))
				{
			?>
			  <div class="alert alert-warning alert-dismissible">
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				<strong>Oops!</strong> <?php echo $_SESSION['alertmsgg']; ?>
			  </div>
			 <?php
				  unset($_SESSION['alertmsgg']);
				  session_destroy();
				}
			 ?>
				  <div class="row g-0">
					<div class="col-xl-6 d-none d-xl-block" style="background-image: linear-gradient(360deg, #feda75,#fa7e1e ,#d62976, #962fbf,  #4f5bd5);">
					  <img src="side2.jpeg"
						alt="Sample photo" class="img-fluid"/>
					</div>
					<div class="col-xl-6">
					  <div class="card-body p-md-5 text-black">
						<h3 class="text-uppercase"> Log-In Page</h3>
						<h6 class="mb-5 text-uppercase" style="">Let's recall your Memories </h6>
						<form method="post" autocomplete="off">
							 <div class="form-outline mb-4">
								<input type="text" id="username" name="username" class="form-control form-control-lg" />
								<label class="form-label" for="username">User Name</label>
							</div>
							
							<div class="form-outline mb-4">
								<input type="password" id="password" name="password" class="form-control form-control-lg" />
								<label class="form-label" for="password">Password</label>
							</div>
							
							 <div class="d-flex justify-content-end pt-3">
								<a href="homepage.php">
								<input type="submit" class="btn btn-lg ms-2" style="border:none; color:white; background-image: linear-gradient(180deg, #9a94c7,#f9a797 ,#f5e991);" value="Log-In" name="login">
								</a>
							</div>
						</form>
						<h6>Don't have an account? <a href="Registration-form.php" class="link">Register</a></h6>
					</div>
				</div>
			</div>
			</div>
			</div>
			</div>
			</div>
		</section>
	</body>
</html>
<?php
	include "connection1.php";
	
	if(isset($_POST['login']))
	{
		if(isset($_POST['password']))
		{
			
			$sql = "select * from user WHERE password='".$password."'";
			//echo $sql;
			//exit();
			$rs = mysqli_query($conn, $sql);
					$sql = "select * from user WHERE email='".$_POST['username']."' AND password='".$_POST['password']."' LIMIT 1";
					$rs = mysqli_query($conn, $sql);
					if(mysqli_num_rows($rs)>0)
					{
						
						while($v = mysqli_fetch_array($rs))
						{
								$_SESSION['username'] = $v["fname"]." ".$v["lname"];
								$_SESSION['email'] = $v["email"];
								$_SESSION['user_id'] = $v["id"];
						}
						
						header("Location:homepage.php");
						
					}
					else
					{
						$_SESSION['alertmsgg'] = "your password is Incorrect ";
						header("Location:index.php");
					}
				mysqli_close($conn);
		}
	}
?>
