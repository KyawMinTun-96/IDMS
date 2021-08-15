<?php 

  include_once "./view/top.php"; 
  
?>


<style>
    .inner {
      width: 400px; 
      padding-top:30px; 
      border-width: 1px; 
      margin-left: auto; 
      margin-top: 30px;  
      margin-right: auto; 
      height:300px; 
      text-align:center; 
      background-color:rgba(7, 109, 175, 0.5);
    }

    .btn_submit {
      border-color:rgb(7, 109, 175);
      background-color:rgb(7, 109, 175);
    }

    
</style>



<div class="mh-100" style="width: 100%; height:100%;">
  <div class="mh-100 p-5 mt-5 mb-5 inner">
    <form action="index.php" method="post">
      <b>Login as </b> 
      <input type="radio" name="user" value="admin" checked > Admin </input>
      <input type="radio" name="user" value="user">User</input><br><br><br>

      <div class="form-group" >
        <input type="string" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter Your Registered Name">  
      </div>

      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password">    
      </div>

      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn_submit">Submit</button>
      </div>
    </form>
  </div>
</div>







<?php

    if (isset($_POST['submit'])) {

      $con = mysqli_connect("localhost","root","","idms") or die('Not connect database!');

      $uType = $_POST['user'];
      $uname = $_POST['username'];
      $pwd = $_POST['password'];


      $qry = "SELECT password FROM users_tbl WHERE user_name = '$uname' AND user_type = '$uType'";
      $res = mysqli_query($con, $qry);

      
      while ($row = mysqli_fetch_array($res)) {

          if ($pwd == $row[0]) 
          {
              echo "<script> alert('Login Successful'); </script>";
              // session_start();
              $_SESSION['uID'] = $row[0];
              $_SESSION['Uname'] = $uname;
              $_SESSION['Utype'] = $uType;
              header('refresh:0;url=dashboard.php');
          }
          else
          {
                echo '<script> alert("Incorrect UserName/User Type/Password"); </script>';
                header('refresh:0;url=index.php');
          }
      }
  }

?>


<?php include_once "./view/base.php"; ?>

