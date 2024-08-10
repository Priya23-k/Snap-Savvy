<?php
	session_start();
	if(!isset($_SESSION['user_id']))
	{
		header("Location:index.php");
	}
?>
<html>
	<head>
		<link rel="stylesheet" href="CSS/mycss.css">
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
		  <style>
			canvas 
			{
			  height: 175px;
			  width:200px;
			  border-style: solid;
			  border-width: 1px;
			  border-color: black;
			  margin-left:25%;
			}
			input[type="file"] 
			{
				display: none;
			}
			.custom-file-upload 
			{
				border: 1px solid #ccc;
				display: inline-block;
				padding: 6px 12px;
				cursor: pointer;
				margin-left:35%;
			}
			</style>
	</head>
	<body>
		<header> 
    <!-- Topbar Start -->
    <div class="head-line">
        <div class="container">
			<div id="MainHeader_hederTrustName" class="trust-name py-1">Welcome <?php echo $_SESSION["username"];?>
          </div>
        </div>
    </div>
    
    <div class="header">
        <div class="container-none px-sm-5 px-4">
		<div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                    <div class="logo" style="height:150px; width:300px; margin:15px;">
                        <a href="Default.aspx">
                            <img id="MainHeader_imgLogoSign" class="mainlogo" src="lo1.jpg" >
                        </a>
                    </div>
                </div>
			<div class="right_link">
                        <ul class="right_menu d-flex p-0 justify-content-end align-items-center">
                            <li class="top-links">
                                <span id="MainHeader_lblViewLink" class="a-clear text-light"><a href="Registration-form.php" class="flashMenu">Registration </a></span>
                            </li>
						 <li class="py-0 dn-992">
                            <div class="login1">
                                    <a href="image.php"><input type="button" value="Memories"></a>
                            </div>
                        </li>		 
                        <li class="py-0 dn-992">
                            <div class="login1">
                                    <a href="#"><input type="button" value="My Profile"  data-bs-toggle="modal" data-bs-target="#myProfile"></a>
                            </div>
                        </li>
						<li class="py-0 dn-992">
                            <div class="login1">
                                    <a href="#"><input type="button" value="LogOut" onclick = "javascript:window.location='logout.php'" style="font-size: 15px;"></a>
                            </div>
                        </li>
                        </ul>
                    </div>
            
        </div>
    </div>
    <!-- header-end -->
</header>

<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- The slideshow/carousel -->
  <div class="carousel-inner" style="height:auto;">
    <div class="carousel-item active">
      <img src="slide4.png" alt="Los Angeles" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="slide2.png" alt="Chicago" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="slide3.jpg" alt="New York" class="d-block" style="width:100%">
    </div>
	<div class="carousel-item">
      <img src="slide5.png" alt="New York" class="d-block" style="width:100%">
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<div class="modal" id="myProfile">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header head-line">
        <h4 class="modal-title">MY PROFILE</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" style="color:white;"></button>
      </div>

   <!--- modal -->
<?php
	include "connection1.php";
		$usql = "select * from user where id = ".$_SESSION['user_id'];
		$rs = mysqli_query($conn,$usql);
		
		while($v = mysqli_fetch_array($rs))
		{
			
			echo'
      <div class="modal-body">
        <div class="col-xl-12">
                  <div class="card-body p-md-5 text-black1">
                  <form method="POST" action="Student_data_update.php" onsubmit="return check();"  enctype="multipart/form-data">
			<div class="row">
                      <div class="col-md-12 mb-4">
                        <div class="form-outline">
						
                          <img class="mb-4" src="images/'.$v["photo"].'" style="height:200px; width:200px; margin-left:100px;"></img><br/>
						
						<label for="finput" class="custom-file-upload" >
							<i class="fa fa-cloud-upload"></i> Custom Upload
						</label>
							<input id="finput" type="file" onchange="upload();" name="photo"/>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <input type="text" id="fname" name="fname" class="form-control form-control-lg" value='.$v["fname"].'>
                          <label class="form-label" for="fname">First name</label>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <input type="text" id="lname" name="lname"class="form-control form-control-lg" value='.$v["lname"].'>
                          <label class="form-label" for="lname">Last name</label>
                        </div>
                      </div>
                    </div>
					
                    <div class="form-outline mb-4">
                      <input type="text" id="address" name="address" class="form-control form-control-lg" value='.$v["address"].'>
                      <label class="form-label" for="address">Address</label>
                    </div>

                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                      <h6 class="mb-0 me-4">Gender: </h6>

                      <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="female"
                          value='.$v["gender"].' '.(($v["gender"]=="female")?"checked":"").'>
                        <label class="form-check-label" for="female">Female</label>
                      </div>

                      <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="male"
                          value="male" '.(($v["gender"]=="male")?"checked":"").'/>
                        <label class="form-check-label" for="male">Male</label>
                      </div>

                      <div class="form-check form-check-inline mb-0">
                        <input class="form-check-input" type="radio" name="gender" id="other"
                          value="other" '.(($v["gender"]=="other")?"checked":"").'/>
                        <label class="form-check-label" for="other">Other</label>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4">

                        <select class="select" name="state" style="min-height: calc(1.5em + 1rem + calc(var(--bs-border-width) * 2));     border-radius: var(--bs-border-radius-lg); border: var(--bs-border-width) solid var(--bs-border-color); width:100%;">
                          <option value="" >State</option>
                          <option value="Gujarat" '.(($v["state"]=="Gujarat")?"selected":"").'>Gujarat</option>
                          <option value="Maharashtra" '.(($v["state"]=="Maharashtra")?"selected":"").'>Maharashtra</option>
                          <option value="Rajasthan" '.(($v["state"]=="Rajasthan")?"selected":"").'>Rajasthan</option>
                        </select>

                      </div>
                      <div class="col-md-6 mb-4">

                        <select class="select" name="city" style="min-height: calc(1.5em + 1rem + calc(var(--bs-border-width) * 2));     border-radius: var(--bs-border-radius-lg); border: var(--bs-border-width) solid var(--bs-border-color); width:100%;">
                          <option value="">City</option>
                          <option value="Surat" '.(($v["city"]=="Surat")?"selected":"").'>Surat</option>
                          <option value="Mumbai" '.(($v["city"]=="Mumbai")?"selected":"").'>Mumbai</option>
                          <option value="Jaipur" '.(($v["city"]=="Jaipur")?"selected":"").'>Jaipur</option>
                        </select>

                      </div>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="date" id="dob" name="dob" class="form-control form-control-lg" value='.$v["dob"].'>
                      <label class="form-label" for="dob">DOB</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="text" id="pincode" name="pincode" class="form-control form-control-lg" value='.$v["pincode"].'>
                      <label class="form-label" for="pincode">Pincode</label>
                    </div>
					
                    <div class="form-outline mb-4">
                      <input type="text" id="email" name="email" class="form-control form-control-lg" value='.$v["email"].'>
                      <label class="form-label" for="email">Email ID</label>
                    </div>
            
                    <div class="form-outline mb-4">
                      <input type="password" id="pass" name="password" class="form-control form-control-lg" value='.$v["password"].'>
                      <label class="form-label" for="pass">Password</label>
                    </div>
            
                    <div class="form-outline mb-4">
                      <input type="password" id="repass" name="repass" class="form-control form-control-lg" value='.$v["password"].'>
                      <label class="form-label" for="repass">Confirm Password</label>
                    </div>
					
                    <div class="d-flex justify-content-end pt-3">	
                      <input type="submit" class="btn btn-warning btn-lg ms-2" value="Update" name="update">
                    </div>
                  </form>
          
                  </div>
                </div>
		</div>'; } ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
		 <div class="head-line">
        <div class="container">
		
            <div class="trust-name" style="color:white; text-align:right; ">Managed By "PRIYA KACHHADIYA"</div>
        </div>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>

