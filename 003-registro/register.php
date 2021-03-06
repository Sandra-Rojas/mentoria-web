<?php
    //codigo PHP
	//echo "Hola Mundo";
	
	///agrega ruta de conexión
	//se utiliza biblioteca PDO la màs utilizada
	// clase 16: otra biblioteca es mysqli no tan utilizada, pero se revisarà
	require "util/db.php";
	//clase 16
	$valido = 0;
	
	if (isset($_POST["sing-up-button"])){
		// se envio form
		$db=connectDB();

		//print_r($_POST);

		$name = $_POST["name"];
		$email= $_POST["email"];
		$username= $_POST["username"];
		$pass= $_POST["pass"];
		//$repeatPass= $_POST["repeat-pass"];
		//$rememberMe= $_POST["remember-me"];
		
		//preparar consulta
		$sql = "INSERT INTO users
				(full_name, email, user_name, password)
				VALUES
				(:full_name, :email, :user_name, :password);";

		 $stmt = $db->prepare($sql);

		$pass= password_hash($pass, PASSWORD_DEFAULT);
		$stmt->bindParam(':full_name',$name);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':user_name',$username);
		$stmt->bindParam(':password',$pass);

		$stmt->execute();
		
		//clase 16
		//echo "Registro realizado";
		$message= "Registro realizado";
		$valido = 1;
	}	
//echo $valido;
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro Mentoria Web</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<style>
		.msg-form{
			margin:1em;
			color: #004d40
		}
</style>

</head>

<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" method="POST" action="register.php">
					<input type="hidden" name="super-secreto" valor="valor super secreto">
					<span class="login100-form-title p-b-59">
						Sign Up
					</span>
					
					<!--clase 16-->
					<!--Recomendable cuando hay que insertar codigo php en html-->
					<!--sentencia if-->
					<?php if($valido==1):?>
						<!--<p> Este es un texto controlado desde PHP </p>-->
						<!-- definir estilo al parrafo-->
						<!--<p class="msg-form">Este es un texto controlado desde PHP </p>-->
						<!-- la linea sgte se puede simplificar-->
						<p class="msg-form"><?= $message; ?> </p>
					<?php endif; ?> 

					<!--otra forma de hacerlo, que no es recomendable, no se activan colores en editor-->
					<!--if ($valido==1)	{
						echo <p> (2) Este es un texto controlado desde PHP </p>
					}--->

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="name" placeholder="Name...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email addess...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Username...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="*****">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100" type="password" name="repeat-pass" placeholder="*****">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									I agree to the
									<a href="#" class="txt2 hov1">
										Terms of User
									</a>
								</span>
							</label>
						</div>

						
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="sing-up-button">
								Sign Up
							</button>
						</div>

						<a href="index.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>