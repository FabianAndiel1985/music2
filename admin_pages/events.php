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
     footer {
      margin-top:500px;
    }

    main {
      margin-top: 60px;
    }

    #main_second_row {
      margin-top: 400px;
    }

  </style>
</head>
<body>
  <header>
     <?php include 'admin_components/navbar.php';?>
  </header>
  

  <div class="container-fluid"> <!-- start container for whole site -->
    
    <main>
     
      <div class="main_first_row">
        <div class="card-deck">


          <?php 

            $sql="SELECT * FROM concerts";
            $result = mysqli_query($conn,$sql); 

            // print_r($row);

            if(mysqli_num_rows($result)>0)
              {
                while($row = mysqli_fetch_assoc($result)) {
                  $type="concerts";
                  echo "
                  <div class='col-auto mb-3'>
                    <div class='card'>
                      <img class='card-img-top' src='...' alt='Card image cap'>
                      <div class='card-body'>
                        <h5 class='card-title'>".$row['concerts_name']."</h5>
                        <p class='card-text'>
                        <ul>
                          <li>adress:".$row['concerts_adress']."</li>
                          <li> description:".$row['concerts_descri']."</li>
                          <li> date:".$row['concerts_date']."</li>
                          <li> start:".$row['concerts_time']."</li>";

                          if ($_SESSION["system_user"] == "admin") {
                            echo "
                          <li> <a href='update.php?id=".$row['concerts_ID']."&type=".$type."'>  <button type='button' class='btn btn-primary'>edit </button> </a>
                          </li>
                          
                          <li>
                            <a href='delete.php?id=".$row['concerts_ID']."&type=".$type."'>
                              <button type='button' class='btn tn-success'>
                                delete
                              </button>
                            </a>
                          </li>";
                        
                        };

                        echo "
                        </ul>
                        </p>
                        <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                  </div>
                  ";
                }

            } /*end of whole display */


          ?>

        </div>  <!-- end card deck first row -->

      </div>  <!-- ENDING FIRST ROW MAIN -->

      <div id="main_second_row">

        <div class="card-deck">
          <?php 

            $sql1="SELECT * FROM things_to_do";
            $result1 = mysqli_query($conn,$sql1); 

            // print_r($row);

            if(mysqli_num_rows($result1)>0)
              {
                $type="things";
                while($row1 = mysqli_fetch_assoc($result1)) {
                  echo"
                  <div class='col-auto mb-3'>
                    <div class='card'>
                      <img class='card-img-top' src='...' alt='Card image cap'>
                      <div class='card-body'>
                        <h5 class='card-title'>".$row1['things_name']."</h5>
                        <p class='card-text'>
                        <ul>
                          <li>adress:".$row1['things_adress']."</li>
                          <li> type :".$row1['things_type']."</li>
                          <li> description:".$row1['things_descri']."</li>
                          <li> homepage:".$row1['things_homepage']."</li>


                          <li> 
                            <a href='update.php?id=".$row1['things_ID']."&type=".$type."'> 
                              <button type='button' class='btn btn-primary'>
                                edit
                              </button>
                            </a>
                          </li>

                          <li>
                            <a href='delete.php?id=".$row1['things_ID']."&type=".$type."'>  
                              <button type='button' class='btn btn-success'>
                                delete
                              </button>
                            </a>
                          </li>
                        </ul>
                        </p>
                      </div>
                    </div>
                  </div>
                  ";
                }

              }


          ?>

        </div>  <!-- end card deck first row -->

      </div> <!-- ENDING SECOND  ROW MAIN -->



    
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

<?php  ob_end_flush();?>
