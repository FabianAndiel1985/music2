<?php require 'dbconnect.php';?>

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
    main {
      margin-top: 100px;
    }

    footer {
      margin-top:300px;
    }
  </style>
</head>


<body>

  <header>
     <?php include 'admin_components/navbar.php';?>
  </header>
  
    <main>
      <div class="container-fluid">

         <?php

          $type = $_GET['type'];

      if ($type == "restaurant") {
         $id = $_GET['id'];
         echo $_GET['type'];
         $query ="SELECT * FROM restaurants WHERE res_id = {$id}";
         $retrievedData = mysqli_query($conn,$query);
         $dataArray= mysqli_fetch_assoc($retrievedData);
         $res_ID = $dataArray['res_ID'];
         $res_name = $dataArray['res_name'];
         $res_teleph = $dataArray['res_teleph'];
         $res_type = $dataArray['res_type'];
         $res_descri = $dataArray['res_descri'];
         $res_adress = $dataArray['res_adress'];
         $res_homepage = $dataArray['res_homepage'];



         echo "
          <form class='text-center border border-light p-5' action='' method='POST'>

              <p class='h4 mb-4'>Subscribe</p>

              <p>Join our mailing list. We write rarely, but only the best content.</p>

              <p>
                  <a href=' target='_blank'>See the last newsletter</a>
              </p>

              <input type='text' name='res_ID' class='form-control mb-4' value='$res_ID'>
              <input type='text' name='res_name' class='form-control mb-4' value='$res_name'>
              <input type='text' name='res_teleph' class='form-control mb-4' value='$res_teleph'>
              <input type='text' name='res_type' class='form-control mb-4' value='$res_type'>
              <input type='text' name='res_descri' class='form-control mb-4' value='$res_descri'>
              <input type='text' name='res_adress' class='form-control mb-4' value='$res_adress'>
              <input type='text' name='res_homepage' class='form-control mb-4' value='$res_homepage'>

              <button class='btn btn-info btn-block' name='updateBtn' type='submit'>Update</button>
          </form>";

            if (isset($_POST['updateBtn'])) {

               $res_name = $_POST['res_name'];



            $sql = "UPDATE restaurants SET 
            res_name = '$res_name' 
            WHERE res_id = {$id}";

            $updatedData = mysqli_query($conn,$sql);
              
            }
   
      } /* ENDING IF TYPE = RESTAURANT */



      else if ($type == "things") {
         $id = $_GET['id'];
         $query ="SELECT * FROM things_to_do WHERE things_ID = {$id}";
         echo "Hello";


         $retrievedData = mysqli_query($conn,$query);
         $dataArray= mysqli_fetch_assoc($retrievedData);
         $things_ID = $dataArray['things_ID'];
         $things_name = $dataArray['things_name'];
         $things_adress = $dataArray['things_adress'];
         $things_type = $dataArray['things_type'];
         $things_descri = $dataArray['things_descri'];
         $things_homepage = $dataArray['things_homepage'];

         echo "
          <form class='text-center border border-light p-5' action='' method='POST'>

              <p class='h4 mb-4'>Subscribe</p>

              <p>Join our mailing list. We write rarely, but only the best content.</p>

              <p>
                  <a href=' target='_blank'>See the last newsletter</a>
              </p>

              <input type='text' name='things_ID' class='form-control mb-4' value='$things_ID'>
              <input type='text' name='things_name' class='form-control mb-4' value='$things_name'>
              <input type='text' name='things_adress' class='form-control mb-4' value='$things_adress'>
              <input type='text' name='things_type' class='form-control mb-4' value='$things_type'>
              <input type='text' name='things_descri' class='form-control mb-4' value='$things_descri'>
              <input type='text' name='things_homepage' class='form-control mb-4' value='$things_homepage'>

              <button class='btn btn-info btn-block' name='updateBtn' type='submit'>Update</button>
          </form>";

            if (isset($_POST['updateBtn'])) {

               $things_name = $_POST['things_name'];

            $sql = "UPDATE things_to_do SET 
            things_name = '$things_name' 
            WHERE things_ID = {$id}";

            $updatedData = mysqli_query($conn,$sql);
              
            }
   
      } /* ENDING IF TYPE = things */



        else if ($type == "concerts") {

         $id = $_GET['id'];
         $query ="SELECT * FROM concerts WHERE concerts_ID = {$id}";
      

         $retrievedData = mysqli_query($conn,$query);
         $dataArray= mysqli_fetch_assoc($retrievedData);
         $concerts_ID = $dataArray['concerts_ID'];
         $concerts_name = $dataArray['concerts_name'];
         $concerts_adress = $dataArray['concerts_adress'];
         $concerts_descri = $dataArray['concerts_descri'];
         $concerts_date = $dataArray['concerts_date'];
         $concerts_time = $dataArray['concerts_time'];
         $concerts_ticketPrice = $dataArray['concerts_ticketPrice'];
         $concerts_homepage = $dataArray['concerts_homepage'];
         echo "
          <form class='text-center border border-light p-5' action='' method='POST'>

              <p class='h4 mb-4'>Subscribe</p>

              <p>Join our mailing list. We write rarely, but only the best content.</p>

              <p>
                  <a href=' target='_blank'>See the last newsletter</a>
              </p>

              <input type='text' name='concerts_ID' class='form-control mb-4' value='$concerts_ID'>
              <input type='text' name='concerts_name' class='form-control mb-4' value='$concerts_name'>
              <input type='text' name='concerts_adress' class='form-control mb-4' value='$concerts_adress'>
              <input type='text' name='concerts_descri' class='form-control mb-4' value='$concerts_descri'>
              <input type='text' name='concerts_date' class='form-control mb-4' value='$concerts_date'>
              <input type='text' name='concerts_time' class='form-control mb-4' value='$concerts_time'>
              <input type='text' name='concerts_ticketPrice' class='form-control mb-4' value='$concerts_ticketPrice'>
              <input type='text' name='concerts_homepage' class='form-control mb-4' value='$concerts_homepage'>

              <button class='btn btn-info btn-block' name='updateBtn' type='submit'>Update</button>
          </form>";

            if (isset($_POST['updateBtn'])) {

                $concerts_name = $_POST['concerts_name'];

                $sql = "UPDATE concerts SET 
                concerts_name = '$concerts_name' 
                WHERE concerts_ID = {$id}";

                $updatedData = mysqli_query($conn,$sql);
                  
                }
   
      } /* ENDING IF TYPE = concerts */








      ?>









 

    </main>


    </div>


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

