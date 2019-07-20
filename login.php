<?php
ob_start();
session_start();
require 'dbconnect.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/css/mdb.min.css" rel="stylesheet">

  <style type="text/css">
  	#formContainer {
/*  		border: 1px solid black;*/
  		width:300px;
  	}

  	#main_row_one {

  	}

  </style>
</head>
<body>
	<div class="container-fluid"> <!-- start container for whole site -->
		<main>

			<div id="main_row_one" class="d-flex justify-content-center"> <!-- start main row -->
		  	
				<div id="formContainer"> 
					<form action="login.php" method="POST" >
						<div class="md-form input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-default">user status</span>
						  </div>
						  <input type="text" name="user_status" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-default">
						</div>

						<div class="md-form input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-default">password</span>
						  </div>
						  <input type="password" name="user_pass" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-default">
						</div>

						<div class="md-form input-group mb-3">
						 <button type="sumbit" name="loginBtn" class="btn btn-deep-purple">Einloggen</button>
						</div>
					</form>	
				</div> <!-- END OF FORM CONTAINER -->

			</div> <!-- end of main row -->

			<?php 

				  // print_r($_POST);
				  
				  if(isset($_POST['loginBtn'])) {

				  	$password = $_POST['user_pass'];

				  	$user_status = $_POST['user_status'];

				  	$login_query="SELECT * FROM system_users WHERE user_status ='$user_status'";

				  	$retrievedUser = mysqli_query($conn,$login_query);

				  	$retrievedUserArray = mysqli_fetch_assoc($retrievedUser);

				  	$count = mysqli_num_rows($retrievedUser);

				  	if ($count == 1 && $retrievedUserArray['user_pass'] == $password) {

				  		echo "Hello";
						
						if($user_status == "admin") {
							$_SESSION["system_user"] = "admin";
							echo $_SESSION["system_user"] ;
							header('Location: ./admin_pages/restaurants.php');
							exit();
						}

						else if($user_status == "employee") {
							$_SESSION["system_user"] = "employee";
							echo $_SESSION["system_user"];
							header('Location: ./admin_pages/restaurants.php');
							exit();
						
						}

				  	}




				  	
				  }

			 ?>



		</main>





	</div> <!-- start container for whole site -->




	<footer>
  		<?php include 'admin_pages/admin_components/footer.php';?>
  	</footer>	


  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/js/mdb.min.js"></script>



</body>
</html>

<?php  ob_end_flush(); ?>