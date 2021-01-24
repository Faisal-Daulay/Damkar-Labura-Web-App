<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>USER LOGIN</title>
		<link rel="stylesheet" type="text/css" href="css/custome_login.css">
	</head>
	<body>
		
		<div class="login">
			<div class="login-head">
				<h2>LOGIN</h2>
			</div>
			<div class="login-body">
				<form action="cek_login.php" method="post">
					<div class="form-ctrl">
						<input type="text" name="user" id="user" required="" autocomplete="off" placeholder="USERNAME">
					</div>
					<div class="form-ctrl">
						<input type="password" name="pass" id="pass" required="" autocomplete="off" placeholder="PASSWORD">
					</div>
<!-- 					<div class="form-ctrl">
						<a href="#" class="forgot">Forgot Password ?</a>
					</div> -->
					<div class="form-ctrl">
						<input type="submit" id="login" value="LOGIN">
					</div>
					<!-- <a href="#" class="log-with google"><i class="fa fa-google+"></i>GOOGLE</a> -->
				</form>
			</div>
		</div>
		<script src="js/jquery.js"></script>
		<script src="js/all.js"></script>
	</body>
</html>