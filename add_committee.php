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


<form id="formCom" class="p-5">
    <div class="form-group">
      <label for="InputName">Add Committee </label>
      <input type="string" class="form-control" id="InputName" name="cName"  placeholder="Committee name">
    </div>
    <button type="button" class="btn btn-info btn-md mt-5" id="com">Submit</button>
</form>



<script>

$(document).ready(function() {

$('#formCom #com').click(addComtt);

  function addComtt() {
    const cName = document.getElementById('InputName').value;
    const action = 'addCom';

    $.ajax({
      url: './system/add.php',
      method: 'POST',
      data: {action: action, cName: cName},
      success: function(data) {
        alert(data);
        $('#InputName').val('');
      }
    });

  }

});

</script>




