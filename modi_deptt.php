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

<div id="show_deptt"></div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modify Department</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <form role="form">
                <div class="modal-body">
                    <p><input type="number" name="depID" id="mdid" value="22" placeholder="id"></p>
                    <p><input type="name" name="depName" id="mdn" value="22" placeholder="department name"></p>
                </div>

                <div class="modal-footer">
                    <button type="button" id="updateDep" class="btn btn-info btn-sm">Update</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>

  $(document).ready(function() {

    fetchDeptt();
    
    function fetchDeptt() {

        const action = 'fetchDep';
        $.ajax({

          url:  './system/load.php',
          method: 'POST',
          data:{action: action},
          success: function(data) {

            $('#show_deptt').html(data);

          }

        });
    }

    // delete department name
    const $depTable = $('#show_deptt');
    $depTable.on('click','.delete', function() {

      if(confirm("Are you sure you want to delete this dempartment name?")) {

        const data_id = $(this).attr('id');
        const action = "deleteDep";

        $.ajax({

            url: './system/load.php',
            method: "POST",
            data: {data_id: data_id, action: action},
            success: function(data) {
              alert(data);
              fetchDeptt();
            }

        });

      }

    });


    
    //update department name
    $depTable.on('click', '.update', function() {
        let depid = $(this).attr('id');
        let depname = $(this).attr('value');
        $("#mdid").val(depid);
        $("#mdn").val(depname);
    });

    $('.modal-footer > #updateDep').click(function() {

      UpdateRec();

    });

    function UpdateRec(){

        let mid = $('#mdid').val();
        let mnm = $('#mdn').val();
        const action = 'submitDep';


        if(confirm('Are you sure to update this department name')) {
    
            $.ajax({

                type:'POST',
                url:'./system/load.php',
                data: {action: action, depID: mid, depName: mnm},
                beforeSend: function () {
                    $('.modal-body').css('opacity', '.5');
                },
                success: function(data) {

                  if(data) {

                    alert(data);

                    $('#did').val('');
                    $('#mdn').val('');
                    
                    fetchDeptt();

                  }

                  $('.modal-body').css('opacity', '');

                }

            });
    
        }else {

          return;

        }



    }

});


</script>


     
