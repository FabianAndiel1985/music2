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
  	

  </style>
</head>
<body>

   <header>
     <?php include 'admin_components/navbar.php';?>
  </header>
  
	<div class="container-fluid"> <!-- start container for whole site -->
		<main>

      <?php 
        require_once 'dbconnect.php';

           $type = $_GET['type'];

           if ($type == "restaurant") {
                 $id = $_GET['id'];
                 $query ="SELECT * FROM restaurants WHERE res_id = {$id}";
                 $retrievedData = mysqli_query($conn,$query);
                 $dataArray= mysqli_fetch_assoc($retrievedData);
                 $res_ID = $dataArray['res_ID'];
                 $res_name = $dataArray['res_name'];

                 echo "
                <form action ='' method='post'>

                   <div class='alert alert-danger' role='alert'>
                    Do you really want to delete <a href='#' class='alert-link'>$res_name ?</a> 
                   </div>

                   <input type='hidden' name= 'id' value='$res_ID'/>

                   <button type='submit' name='deleteBtn' class='btn btn-danger'>Yes delete</button>
                </form>
                  <a href='admin_main.php'><button type='button' class='btn btn-primary'>No go back</button></a>

                  "
                  ;  

                    if(isset($_POST['deleteBtn'])) {

                      $sql = "DELETE FROM restaurants WHERE res_ID = {$id}";

                      $deleteQuery = mysqli_query($conn,$sql);

                    }    
              }  /* end Delete of restaurant */




               else if ($type == "concerts") {
                 $id = $_GET['id'];
                 $query ="SELECT * FROM concerts WHERE concerts_ID = {$id}";
                 $retrievedData = mysqli_query($conn,$query);
                 $dataArray= mysqli_fetch_assoc($retrievedData);
                 $concerts_ID = $dataArray['concerts_ID'];
                 $concerts_name = $dataArray['concerts_name'];

                 echo "
                <form action ='' method='post'>

                   <div class='alert alert-danger' role='alert'>
                    Do you really want to delete <a href='#' class='alert-link'>$concerts_name ?</a> 
                   </div>

                   <input type='hidden' name= 'id' value='$concerts_ID'/>

                   <button type='submit' name='deleteBtn' class='btn btn-danger'>Yes delete</button>
                </form>
                  <a href='admin_main.php'><button type='button' class='btn btn-primary'>No go back</button></a>

                  "
                  ;  

                   if(isset($_POST['deleteBtn'])) {

                      $sql = "DELETE FROM concerts WHERE concerts_ID = {$id}";

                      $deleteQuery = mysqli_query($conn,$sql);

                    }    
              }


              else if ($type == "things") {
                 $id = $_GET['id'];
                 $query ="SELECT * FROM things_to_do WHERE things_ID = {$id}";
                 $retrievedData = mysqli_query($conn,$query);
                 $dataArray= mysqli_fetch_assoc($retrievedData);
                 $things_ID = $dataArray['things_ID'];
                 $things_name = $dataArray['things_name'];

                 echo "
                <form action ='' method='post'>

                   <div class='alert alert-danger' role='alert'>
                    Do you really want to delete <a href='#' class='alert-link'>$things_name ?</a> 
                   </div>

                   <input type='hidden' name= 'id' value='$things_ID'/>

                   <button type='submit' name='deleteBtn' class='btn btn-danger'>Yes delete</button>
                </form>
                  <a href='admin_main.php'><button type='button' class='btn btn-primary'>No go back</button></a>

                  ";
         

                   if(isset($_POST['deleteBtn'])) {

                      $sql = "DELETE FROM things_to_do WHERE things_ID = {$id}";

                      $deleteQuery = mysqli_query($conn,$sql);

                    }    
              }

    ?>







		</main>

    

	</div> <!-- start container for whole site -->




	<footer>
  		<?php include 'admin_components/footer.php';?>
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