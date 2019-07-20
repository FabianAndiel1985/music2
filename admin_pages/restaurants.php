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
    main {
      margin-top: 100px;
    }

    footer {
      margin-top:300px;
    }

    .card-body {
      min-width: 290px;
    }
  </style>
</head>


<body>

  <header>
     <?php include 'admin_components/navbar.php';?>
  </header>
  

  <div class="container-fluid"> <!-- start container for whole site -->
    <main>
     
    <div class="card-deck">


      <?php 


        echo $_SESSION["system_user"];

        $sql="SELECT * FROM restaurants";
        $result = mysqli_query($conn,$sql); 

        // print_r($row);

        if(mysqli_num_rows($result)>0)
          {
            while($row = mysqli_fetch_assoc($result)) {
              $type = "restaurant";
              echo"
              <div class='col-auto mb-3'>
                <div class='card'>
                  <img class='card-img-top' src='...' alt='Card image cap'>
                  <div class='card-body'>
                    <h5 class='card-title'>".$row['res_name']."</h5>
                    <p class='card-text'>
                    <ul>
                      <li>telephone:".$row['res_teleph']."</li>
                      <li>type".$row['res_type']."</li>
                      <li> description:".$row['res_descri']."</li>
                      <li> adress:".$row['res_adress']."</li>
                      <li> homepage:".$row['res_homepage']."</li>";
                      
                      if ($_SESSION["system_user"] == "admin") {
                        echo "
                      <li class='hide'>
                         <a  href='update.php?id=".$row['res_ID']."&type=".$type."'>
                            <button type='button' class='btn btn-primary'>
                              edit
                            </button>
                         </a>
                      </li>
                      <li class='hide'>
                          <a href='delete.php?id=".$row['res_ID']."&type=".$type."'>
                            <button type='button' class='btn btn-success'>
                              delete
                            </button>
                          </a>
                      </li>";
                      }

                      echo "
                    </ul>
                    </p>
                    <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
              " ;
            }


            // if ($_SESSION["system_user"] == "employee") 
            //   {
            //     echo "
            //     <script>
            //      var btnArray = document.getElementsByClassName('hide');
            //      for (var i=0;i < btnArray.length; i++) {
            //         btnArray[i].style.display ='none';                       
            //      };
            //     </script>
            //     ";
            //   }

          }


      ?>

    </div>


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

<?php  ob_end_flush(); ?>

