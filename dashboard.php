<?php 

  include_once "./view/top.php";

  if(!isset($_SESSION['Utype'])) {

    header('Location:index.php');

  }

?>

<!-- style code -->
<style>

  #UploadRep, #ViewRep, #AddDept,
  #ModiDept, #AddComm, #ModiComm,
  #AddUser, #ModiUser {
      font-size: 16px;
      cursor: pointer;
  }

  .sidebar {
    width: 195px;
    height:100%;
    border: 1px solid #000;
    float:left;
    color:rgb(7, 109, 175);
  }

  #contents {
    padding: 10px;
    height:100%; 
    border:1px solid #000; 
    display: block; 
    color:rgb(7, 109, 175); 
    flex: 1; 
  }

</style>


<!-- html code -->
<div style="display: flex;">
      <div class="sidebar">
            <nav class="navbar navbar-light bg-light" >
            <?php
              if ($_SESSION['Utype'] == 'user')
              {

                    echo '<div class="navbar-brand" id="UploadRep">Upload Report</div>';
                    echo '<div class="navbar-brand" id="ViewRep">View Report</div>';

              }else {      

                    echo '<div class="navbar-brand" id="AddDept">Add Department</div>';
                    echo '<div class="navbar-brand" id="ModiDept">Modify Department</div>';
                    echo '<div class="navbar-brand" id="AddComm">Add Committee</div>';
                    echo '<div class="navbar-brand" id="ModiComm">Modify Committee</div>';
                    echo '<div class="navbar-brand" id="AddUser">Add New User</div>';
                    echo '<div class="navbar-brand" id="ModiUser">Modify User</div>'; 
                    echo '<div class="navbar-brand" id="UploadRep">Upload Report</div>';
                    echo '<div class="navbar-brand" id="ViewRep">View Report</div>';

              }                   
            ?>
          </nav>
      </div>

      <div id="contents">
      </div>
</div>

<script>
    $(document).ready(function(){
      $("#UploadRep").click(function(){
        $("#contents").load("./uploadfile.php");
      });
      $("#ViewRep").click(function(){
        $("#contents").load("./displaylist.php");
      });
      $("#AddDept").click(function(){
        $("#contents").load("./add_department.php");
      });
      $("#ModiDept").click(function(){
        $("#contents").load("./modi_deptt.php");
      });
      $("#AddComm").click(function(){
        $("#contents").load("./add_committee.php");
      });
      $("#ModiComm").click(function(){
        $("#contents").load("./modi_comm.php");
      });
      $("#AddUser").click(function(){
        $("#contents").load("./add_user.php");
      });
      $("#ModiUser").click(function(){
        $("#contents").load("./modi_user.php");
      });
    });
</script>

<?php include_once "./view/base.php"; ?>
