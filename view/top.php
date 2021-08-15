<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internal Document Management System</title>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">



    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>




    <style>
          .dropdown-item:hover {
                  background-color: transparent;
            }
    </style>

</head>
<body>

<div class="container-fluid" style="padding: 0;">
      <div style="width: 100%;  border-width: 1px; height:150px; text-align:center; background-color:rgba(7, 109, 175, 0.5)">
            <h2 style="padding-top:50px">Internal Document Management system</h2>
      </div>

      <div style="width: 100%;  border-width: 1px; height:30px; text-align:right; background-color:rgb(7, 109, 175); padding-right:30px;">
            <?php
            
            session_start();
            
            if(isset($_SESSION['Uname'])) {

                  $uname = $_SESSION['Uname'];

            ?>

                  <button class="dropdown-toggle bg-transparent text-white border-0" style="outline: none;" data-toggle="dropdown">

                  <?php
                              echo $uname;
                  ?>
                              
                  </button>
                  <div class="dropdown-menu shadow rounded" style="background: rgba(7, 109, 175, 1);">
                        <a class="dropdown-item text-white" href="../system/logout.php">Log out</a>
                  </div>
            <?php
                  }
            ?>
      </div>
</div>
    