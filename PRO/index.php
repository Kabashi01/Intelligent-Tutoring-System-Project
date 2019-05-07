<?php
session_start();
$conn = mysqli_connect('localhost','root','','dsr');
//Getting Input value
$error = 1;
if(isset($_POST['login'])){
	$username=mysqli_real_escape_string($conn,$_POST['username']);
  $password=mysqli_real_escape_string($conn,$_POST['password']);
  if(empty($username)&&empty($password)){
		$error=1;
  }else{
 		//Checking Login Detail
		$result=mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");
		$row=mysqli_fetch_assoc($result);
		$count=mysqli_num_rows($result);
		if($count==1){
			$_SESSION['user']=array('username'=>$row['username'],'password'=>$row['password'],'role'=>$row['role']);
   		$role=$_SESSION['user']['role'];
   		//Redirecting User Based on Role
    	switch($role){
  			case 'user':
  				header('location:login/includes/user.php');
  			break;
				case 'admin':
					header('location:login/includes/admin.php');
				break;
 			}
 		}else{
 			$error='<p class="text-center m-0 p-0 ">Password or Username not correct</p>';
 		}
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Login</title>
		<link rel="stylesheet" href="DSR/form/css/bootstrap.min.css" >
    <link rel="stylesheet" href="login/css/login.css">
    <link rel="stylesheet" href="DSR/form/css/all.min.css">
	</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="DSR/form/images/logo.png" class="brand_logo" alt="DSR">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form id="form" class="needs-validation" novalidate method="POST">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" placeholder="username" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" placeholder="password" autocomplete="off" required>
						</div>
					</form>
				</div>
				<div class="d-flex justify-content-center mt-3 login_container">
					<button form="form" type="submit" name="login" class="btn login_btn">Login</button>
				</div>
				<?php if($error != 1)
								echo $error;
						?>
			</div>
		</div>
	</div>
</body>
	<script>
		(function() {
			'use strict';
			window.addEventListener('load', function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
			form.addEventListener('submit', function(event) {
			if (form.checkValidity() === false) {
				event.preventDefault();
				event.stopPropagation();
			}
			form.classList.add('was-validated');
			$('p').hide();
			}, false);
			});
			}, false);
			})();
	</script>
	<script src="DSR/form/js/jquery-3.3.1.min.js"></script>
	<script src="DSR/form/js/popper.min.js"></script>
	<script src="DSR/form/js/bootstrap.min.js"></script>
</html>