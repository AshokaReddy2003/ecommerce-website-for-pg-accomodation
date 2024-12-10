<style>
 .logo {
  margin: auto;
  margin-right: 20px;
 
  font-size: 20px;
    border-radius: 50% 50%;
}
    .logo  img{
    width: 50px;
    height: 50px; /* Maintains aspect ratio */
}

   
</style>

<nav class="navbar navbar-dark bg-dark fixed-top " style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">
  				<img src="../images/msr-high-resolution-logo-transparent.png">
  			</div>
  		</div>
      <div class="col-md-4 float-left text-white">
        <large><b>MSR Accomodations</b></large>
      </div>
	  	<div class="col-md-2 float-right text-white">
	  		<a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
</nav>