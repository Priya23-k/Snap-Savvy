<?php
	ob_start();
	session_start();
	if(!isset($_SESSION['user_id']))
	{
		header("Location:index.php");
	}
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="CSS/memory_style.css">
		<style>
			.head-line {
						background-image: linear-gradient(90deg, #9a94c7,#f9a797 ,#f5e991);
						height: 50px;
						font-size: 20px;
						}
			.trust-name {
    color: white;
    text-align: center;
    font-weight: 600;
	    margin-top: -50px;
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
	</header><br/>
	<section class="author-archive">
	<div class="tm-hero d-flex justify-content-center align-items-center mb-5" data--parallax="scroll">
		<h1 style="color:white;  font-size: 72px;
    background: -webkit-linear-gradient(135deg,#7f76c7,#fa8e79 ,#fdeb64);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    box-shadow: 5px 5px 12px #aaaaaa;">Memories</h1>
  </div>
  <?php
					include "connection1.php";
					
					$image_query = mysqli_query($conn,"select * from memories where id = ".$_SESSION['user_id']);
					
					?>
					
  <div class="container">
    <input type="radio" id="photos" name="categories" value="photos" checked>
    <ol class="filters">
      <li>
        <label for="photos">Photos</label>
      </li>
	<button value="+"  class="add btn" data-bs-toggle="modal" data-bs-target="#plus">+</button>
    </ol>

    <ol class="posts">
		<?php 
			while($rows = mysqli_fetch_array($image_query))
					{
						$mid = $rows['mid'];
						$mimage = $rows['mimage'];
						$mdesc = $rows['mdesc'];
						$mdate = $rows['mdate'];
						$mcreateddate = $rows['mcreateddate'];
						$id = $rows['id'];
						$mstatus = $rows['mstatus'];
				?>	
      <li class="post" data-category="photos others">
        <article>
          <figure>
					<img src="images\<?php echo $mimage;?>" alt="">
            <figcaption>
			<h2 class="post-title">
			<?php echo ucfirst($mdesc); ?>
			  </h2>
			  <h6 class="">
			<?php echo $mdate; ?>
			  </h6>
              <ol class="post-categories" style="margin-left:160px;">
                <li>
				<?php echo"	<a href='image.php?dmid=".$rows["mid"]."' style='border:none;'> " ?>
                 <i class="fa fa-trash" aria-hidden="true" style="font-size:30px;color:red; position:relative;"></i></a>
                </li>
              </ol>
            </figcaption>
          </figure>
        </article>
      </li>
		<?php } ?>
    </ol> <?php header_remove("image.php"); ?>
  </div>
</section>
<div class="modal" id="plus">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header bg-blue">
        <h4 class="modal-title">UPLOAD</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
	  <div class="modal-body">
        <div class="col-xl-12">
			<div class="card-body p-md-5 text-black1">
				 <form method="post" action="upload_image.php" autocomplete="off" enctype="multipart/form-data" onsubmit="return check();">
				<h3 class="mb-5 text-uppercase">Upload Memory</h3>
					<div class="form-outline mb-4">
                      <input type="text" id="discription" name="discription" class="form-control form-control-lg" />
                      <label class="form-label" for="discription">Discription</label>
                    </div>
					
					<div class="form-outline mb-4">
                      <input type="date" id="m_date" name="m_date" class="form-control form-control-lg" />
                      <label class="form-label" for="m_date">Memory Date</label>
                    </div>
					
					<!--label for="finput" class="custom-file-upload">
						<i class="fa fa-cloud-upload"></i> Custom Upload
					</label-->
					<input id="finput" type="file" onchange="upload();" name="photo"/>
					
					<input type="submit" value="upload">
				</form>
      </div>
      </div>
      </div>
	  </div>
	  </div>
	  </div>
	  <?php
	if(isset($_GET['dmid']))
	{
	$sql ="DELETE FROM memories WHERE mid=".$_GET['dmid'];
	if(mysqli_query($conn,$sql))
	{
	echo mysqli_affected_rows($conn)."deleted succesfully";
	header("Location:image.php");
	}
	else
	{
	echo "Error".$sql."".mysqli_error($conn);
	}
	} ?>
	</body>
</html>