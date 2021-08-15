<?php 
  session_start();
  if(isset($_SESSION['Utype'])) {

      if($_SESSION['Utype'] !== 'admin') {

        header('Location:dashboard.php');
        
    }

  }else {

    header('Location:index.php');

  }
?>


<form id="formDep" class="p-5">
    <div class="form-group">
      <label for="InputName">Add Department </label>
      <input type="string" class="form-control" id="InputName" name="dName"  placeholder="Department name">
    </div>
    <button type="button" class="btn btn-info btn-md mt-5" id="dep">Submit</button>
</form>


<script>

$(document).ready(function() {

  $('#formDep #dep').click(addDeptt);

    function addDeptt() {
      const dName = document.getElementById('InputName').value;
      const action = 'addDep';

      $.ajax({
        url: './system/add.php',
        method: 'POST',
        data: {action: action, dName: dName},
        success: function(data) {
          alert(data);
          $('#InputName').val('');
        }
      });

    }

});

</script>








