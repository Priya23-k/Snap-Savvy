<?php
	session_start();
?>
<html>
	<head>
		<title>Registration-Form</title>
		<link rel="stylesheet" href="Registration-form-style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	
		<style>
		body {
  background-image: url("Background.jpg");
  background-repeat: repeat-y;
}
			canvas 
			{
			  height: 175px;
			  width:200px;
			  border-style: solid;
			  border-width: 1px;
			  border-color: #83878b;
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
				margin-left:30%;
			}
		</style>
		<script>
		var fname,lname,address,state,city,dob,pincode,email,pass,repass,passl;
			
			function check()
			{
				fname = document.getElementById("fname").value;
				lname = document.getElementById("lname").value;
				address = document.getElementById("address").value;
				state = document.getElementById("state").value;
				city = document.getElementById("city").value;
				dob = document.getElementById("dob").value;
				pincode = document.getElementById("pincode").value;
				email = document.getElementById("email").value;
				pass = document.getElementById("pass").value;
				repass = document.getElementById("repass").value;
				passl = pass.length;
				var altmsg = "";
				 
				
				
					if(fname == "" || lname == ""|| address == "" || state == "" || city == "" || dob == "" || pincode == ""|| pass == "" || email == "" || repass == "")
					{
						altmsg = "You can't leave any field empty<br/>";
						
					}
					else if(passl < 8)
					{
						altmsg += "Password must be 8 Chracters<br/>";
						
					}
					else if(repass !== pass)
					{
						altmsg += "Password didn't match<br/>";
						
					}
					var capctr=0,smallctr=0,spectr=0,digitctr=0;
				for(i=0;i<passl;i++)
				{
					
					if(pass[i].charCodeAt(0) >= 65 && pass[i].charCodeAt(0) <=90)
					{
						capctr++;
					}
					if(pass[i].charCodeAt(0) >= 97 && pass[i].charCodeAt(0) <=122)
					{
						smallctr++;
					}
					if(pass[i].charCodeAt(0) >= 33 && pass[i].charCodeAt(0) <=47 || pass[i].charCodeAt(0) >= 58 && pass[i].charCodeAt(0) <=64 || pass[i].charCodeAt(0) >= 91 && pass[i].charCodeAt(0) <=96 )
					{
						spectr++;
					}
					if(pass[i].charCodeAt(0) >= 48 && pass[i].charCodeAt(0) <=57)
					{
						digitctr++;
					}
				}
				if(capctr == 0 || smallctr == 0 || spectr == 0 || digitctr == 0)
				{
					altmsg += "Enter Atleast one Special Charachter!!<br/>";
					
				}

				var indexAt = email.indexOf("@");
				var indexDot = email.indexOf(".");
				
				if(indexAt <= 0 || indexAt == (email.length-1))
				{
					altmsg += "Invalid E-Mail Address '@'<br/>";
					
				}
				
				if(indexDot <= indexAt || indexDot == (email.length-1))
				{
					altmsg += "Invalid E-Mail Address '.'<br/>";
					
				}
				if(indexDot - indexAt <= 3)
				{
					altmsg += "InValid E-Mail Address '@-.'<br/>";
					
				}
				var pcapctr=0,psmallctr=0,pspectr=0;
				for(i=0;i<pincode.length;i++)
				{
					
					if(pincode[i].charCodeAt(0) >= 65 && pincode[i].charCodeAt(0) <=90)
					{
						pcapctr++;
					}
					if(pincode[i].charCodeAt(0) >= 97 && pincode[i].charCodeAt(0) <=122)
					{
						psmallctr++;
					}
					if(pincode[i].charCodeAt(0) >= 33 && pincode[i].charCodeAt(0) <=47 || pincode[i].charCodeAt(0) >= 58 && pincode[i].charCodeAt(0) <=64 || pincode[i].charCodeAt(0) >= 91 && pincode[i].charCodeAt(0) <=96 )
					{
						pspectr++;
					}
				}
				if(pcapctr != 0 || psmallctr != 0 || pspectr != 0 || pincode.length < 6 || pincode.length > 6)
				{
					altmsg += "Enter Valid PINCODE!<br/>";
					
				}
				
				var fspectr=0,fdigitctr=0;
				for(i=0;i<fname.length;i++)
				{
					if(fname[i].charCodeAt(0) >= 33 && fname[i].charCodeAt(0) <=47 || fname[i].charCodeAt(0) >= 58 && fname[i].charCodeAt(0) <=64 || fname[i].charCodeAt(0) >= 91 && fname[i].charCodeAt(0) <=96 )
					{
						fspectr++;
					}
					if(fname[i].charCodeAt(0) >= 48 && fname[i].charCodeAt(0) <=57)
					{
						fdigitctr++;
					}
				}
				if( fspectr != 0 || fdigitctr !=0)
				{
					altmsg += "Enter Valid First Name!<br/>";
					
				}
				
				var lspectr=0,ldigitctr=0;
				for(i=0;i<lname.length;i++)
				{
					if(lname[i].charCodeAt(0) >= 33 && lname[i].charCodeAt(0) <=47 || lname[i].charCodeAt(0) >= 58 && lname[i].charCodeAt(0) <=64 || lname[i].charCodeAt(0) >= 91 && lname[i].charCodeAt(0) <=96 )
					{
						lspectr++;
					}
					if(lname[i].charCodeAt(0) >= 48 && lname[i].charCodeAt(0) <=57)
					{
						ldigitctr++;
					}
				}
				if( lspectr != 0 || ldigitctr !=0)
				{
					altmsg += "Enter Valid Last Name!<br/>";
					
				}
				if(altmsg == "")
				{
					return true;
				}
				else
				{
					document.getElementById("altmsg").innerHTML += altmsg;
					document.getElementById("altmsg").style.display = "block";
					return false;
				}
			}
		</script>
		
	</head>
	
	<body>
	
		
		<section class="h-100" style="background-image:url('Background.jpg') ;">
		
     <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-11">
            <div class="card card-registration my-4">
			<?php
				
				if(isset($_SESSION['alertmsg']))
				{
			?>
			  <div class="alert alert-warning alert-dismissible">
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				<strong>Oops!</strong> <?php echo $_SESSION['alertmsg']; ?>
			  </div>
			 <?php
				  unset($_SESSION['alertmsg']);
				  session_destroy();
				}
			 ?>
			  <div class="alert alert-warning alert-dismissible" id="altmsg" style="display:none;">
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				
			  </div>
              <div class="row g-0">
                 <div class="col-xl-6 d-none d-xl-block" style="background-color:#a98c80;">
                  <img src="rside4.jpeg" alt="Sample photo" class="img-fluid"
                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
					<img src="rside3.jpeg" alt="Sample photo" class="img-fluid"
                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                </div>
                <div class="col-xl-6">

				<div class="card-body p-md-5 text-black">
                  <form method="post" action="Student_data.php" autocomplete="off" enctype="multipart/form-data" onsubmit="return check();">
                    <h3 class="mb-5 text-uppercase">Registration form</h3>

					
					<div class="row">
                      <div class="col-md-12 mb-4">
                        <div class="form-outline">
                          <canvas id= "canv1" class="mb-4" ></canvas><br/>
							
						<label for="finput" class="custom-file-upload">
							<i class="fa fa-cloud-upload"></i> Custom Upload
						</label>
							<input id="finput" type="file" onchange="upload();" name="photo"/>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <input type="text" id="fname" name="fname" class="form-control form-control-lg" />
                          <label class="form-label" for="fname">First name</label>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <input type="text" id="lname" name="lname"class="form-control form-control-lg" />
                          <label class="form-label" for="lname">Last name</label>
                        </div>
                      </div>
                    </div>
					
                    <div class="form-outline mb-4">
                      <input type="text" id="address" name="address" class="form-control form-control-lg" />
                      <label class="form-label" for="address">Address</label>
                    </div>

                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                      <h6 class="mb-0 me-4">Gender: </h6>

                      <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="female"
                          value="female" />
                        <label class="form-check-label" for="female">Female</label>
                      </div>

                      <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="male"
                          value="male" />
                        <label class="form-check-label" for="male">Male</label>
                      </div>

                      <div class="form-check form-check-inline mb-0">
                        <input class="form-check-input" type="radio" name="gender" id="other"
                          value="other" />
                        <label class="form-check-label" for="other">Other</label>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4">

                        <select class="select" name="state" style="min-height: calc(1.5em + 1rem + calc(var(--bs-border-width) * 2));     border-radius: var(--bs-border-radius-lg); border: var(--bs-border-width) solid var(--bs-border-color); width:100%;" id="state">
                          <option value="" >State</option>
                          <option value="Gujarat">Gujarat</option>
                          <option value="Maharashtra">Maharashtra</option>
                          <option value="Rajasthan">Rajasthan</option>
                        </select>

                      </div>
                      <div class="col-md-6 mb-4">

                        <select class="select" name="city" style="min-height: calc(1.5em + 1rem + calc(var(--bs-border-width) * 2));     border-radius: var(--bs-border-radius-lg); border: var(--bs-border-width) solid var(--bs-border-color); width:100%;" id="city">
                          <option value="">City</option>
                          <option value="Surat">Surat</option>
                          <option value="Mumbai">Mumbai</option>
                          <option value="Jaipur">Jaipur</option>
                        </select>

                      </div>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="date" id="dob" name="dob" class="form-control form-control-lg" />
                      <label class="form-label" for="dob">DOB</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="text" id="pincode" name="pincode" class="form-control form-control-lg" />
                      <label class="form-label" for="pincode">Pincode</label>
                    </div>
					
                    <div class="form-outline mb-4">
                      <input type="text" id="email" name="email" class="form-control form-control-lg" />
                      <label class="form-label" for="email">Email ID</label>
                    </div>
            
                    <div class="form-outline mb-4">
                      <input type="password" id="pass" name="password" class="form-control form-control-lg" />
                      <label class="form-label" for="pass">Password</label>
                    </div>
            
                    <div class="form-outline mb-4">
                      <input type="password" id="repass" name="repass" class="form-control form-control-lg" />
                      <label class="form-label" for="repass">Confirm Password</label>
                    </div>
					
                    <div class="d-flex justify-content-end pt-3">
                      <input type="reset" class="btn btn-light btn-lg" value="Reset All">
                      <input type="submit" class="btn btn-warning btn-lg ms-2" onsubmit="return check();" value="Submit form">
                    </div>
					<div><br><br>
					<h6>You've alredy account!<a href="index.php" class="link">LOG-IN</a></h6>
					 </div>
                  </form>
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>
	<script>
	window.onload = function () {
			// GET THE IMAGE.
			let img = new Image();
			img.src = 'images/pngwing.png';

			// WAIT TILL IMAGE IS LOADED.
			img.onload = function () {
				fill_canvas(img);       // FILL THE CANVAS WITH THE IMAGE.
			}

			function fill_canvas(img) {
				// CREATE CANVAS CONTEXT.
				let canvas = document.getElementById('canv1');
				let ctx = canvas.getContext('2d');

				canvas.width = img.width;
				canvas.height = img.height;

				ctx.drawImage(img, 0, 0);       // DRAW THE IMAGE TO THE CANVAS.
			}
		}
		function upload()
		{
			 var imgcanvas = document.getElementById("canv1");
			 var fileinput = document.getElementById("finput");
			 var image = new SimpleImage(fileinput);
			 image.drawTo(imgcanvas);
		}
	</script>
  </body>
</html>