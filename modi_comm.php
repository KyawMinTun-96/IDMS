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

<div id="show_comtt"></div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modify Committee</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <form role="form">
                <div class="modal-body form-group">
                    <p><input type="number" name="depID" id="mdid" value="22" placeholder="id"></p>
                    <p><input type="name" name="depName" id="mdn" value="22" placeholder="committee name"></p>
                </div>

                <div class="modal-footer">
                    <button type="button" id="updateCom" class="btn btn-info btn-sm">Update</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>  


<script>
$(document).ready(function() {

    fetchComm();

    function fetchComm() {
        const action = 'fetchCom';
        $.ajax({

            url: './system/load.php',
            method: 'POST',
            data: {action: action},
            success: function(data) {

                $('#show_comtt').html(data);
                
            }

        });
    }


    // delete committee data
    const $comTable = $('#show_comtt');
    $comTable.on('click','.delete', function() {

        if(confirm("Are you sure you want to delete this committee name?")) {

            const data_id = $(this).attr('id');
            const action = "deleteCom";

            $.ajax({

                url: './system/load.php',
                method: "POST",
                data: {data_id: data_id, action: action},
                success: function(data) {
                    alert(data);
                    fetchComm();
                }

            });

        }

    });



    //update committee name
    $comTable.on('click', '.update', function() {

        let comid = $(this).attr('id');
        let comname = $(this).attr('value');
        $("#mdid").val(comid);
        $("#mdn").val(comname);

    });

    $('.modal-footer > #updateCom').click(function() {

      UpdateRec();

    });

    function UpdateRec(){

        let mid = $('#mdid').val();
        let mnm = $('#mdn').val();
        const action = 'submitCom';

        if(confirm('Are you sure to update this committee name')) {
    
            $.ajax({

                type:'POST',
                url:'./system/load.php',
                data: {action: action, comID: mid, comName: mnm},
                beforeSend: function () {
                    $('.modal-body').css('opacity', '.5');
                },
                success: function(data) {
                    
                  if(data) {

                    alert(data);

                    $('#did').val('');
                    $('#mdn').val('');
                
                    fetchComm();
                  }

                  $('.modal-body').css('opacity', '');

                }

            });
    
        }else {

          return false;

        }

    }
    
});
</script>

