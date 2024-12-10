<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | MSR Accomodations</title>
 	

<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}
?>

</head>
<style>
	body{
		width: 100%;
	}
  main#main {
    width:100%;
   height: calc(100%);
  background:linear-gradient(45deg,#0f8,#08f);
  animation:hue 10000ms infinite linear;
  
}

.alert-info{
    position:fixed;
    left:0;
    right:0;
    top:0;
    bottom:0;
    filter:hue-rotate(0deg);
    background:linear-gradient(45deg,#0f8,#08f);
    animation:hue 10000ms infinite linear;

  }

  @keyframes spinify {
  0% {
    transform: translate(0px,0px);
    
  }
  33% {
    transform: translate(0px,24px);
    border-radius:100%;
    width:10px;
    height:10px;
 
  }
   66% {
    transform:translate(0px,-16px);
  }
  
   88% {
    transform:translate(0px,4px);
     
  }
  100% {
    transform:translate(0px,0px);
  }
}
@keyframes hue{
  0%{filter: hue-rotate(0deg);}
  100%{filter:hue-rotate(360deg);}
  
}
	
#login-right {
    right: 0;
    width: 30%;
    height: 60%;
    display: flex;
    margin-top: 70px;
    margin-left: 30%;
    border: none; /* Remove border */
    border-radius: 10px; /* Rounded corners */
    background-color: rgba(255, 255, 255, 0.5); /* Transparent white background */
}

  h2{
	text-align:center;
	display: block;
    font-size: 1.5em;
    margin-block-start: 0.83em;
    margin-block-end: 0.83em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
    unicode-bidi: isolate;
  }

	.logo {
  margin-right: 20px;
}
    .logo  img{
    width: 50px;
    height: 50px; /* Maintains aspect ratio */
}
</style>

<body>


  <main id="main" class=" alert-info">
  		
  			
  		</div>
  		<div id="login-right">
  				<div class="card-body">
				  <div class="logo">
					<h2><img src="../images/msr-high-resolution-logo-transparent.png" alt=" Logo" >  Admin-Login</h2>
                   </div>
					<form id="login-form" >
  						<div class="form-group"style="margin-top: 40px;>
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username"  class="form-control">
  						</div>
  						<div class="form-group" style="margin-top: 70px;">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary"style="margin-top: 20px;">Login</button></center>
  					</form>
  				</div>
  			</div>
  		
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>