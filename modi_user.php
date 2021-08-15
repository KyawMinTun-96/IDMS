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

<div id="show_users"></div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modify Users</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <form role="form">
                <div class="modal-body">
                    <p><input type="number" name="userID" id="mdid" value="22" placeholder="id"></p>
                    <p><input type="text" name="userName" id="mdn" value="22" placeholder="username"></p>
                    <p><input type="password" name="userPass" id="mdp" placeholder="new password"></p>
                    <p>
                        <label for="idmda">Admin:</label>
                        <input type="radio" name="type" id="mda" value="admin" checked>
                        <label for="mdu">User:</label>
                        <input type="radio" name="type" id="mdu" value="user">
                    </p>
                </div>

                <div class="modal-footer">
                    <button type="button" id="updateUser" class="btn btn-info btn-sm">Update</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>

$(document).ready(function() {

    fetchUser();
    
    function fetchUser() {

        const action = 'fetchUser';
        $.ajax({

          url:  './system/load.php',
          method: 'POST',
          data:{action: action},
          success: function(data) {

            $('#show_users').html(data);

          }

        });
    }

    // delete department name
    const $userTable = $('#show_users');
    $userTable.on('click','.delete', function() {

      if(confirm("Are you sure you want to delete this users name?")) {

        const data_id = $(this).attr('id');
        const action = "deleteUser";

        $.ajax({

            url: './system/load.php',
            method: "POST",
            data: {data_id: data_id, action: action},
            success: function(data) {
              alert(data);
              fetchUser();
            }

        });

      }

    });


    
    //update department name
    $userTable.on('click', '.update', function() {
        let userID = $(this).attr('id');
        let userName = $(this).attr('value');
        let userPass = $(this).parent().siblings('#pass')[0].innerHTML;
        let userType = $(this).parent().siblings('#type')[0].innerHTML;
            userType = userType.replace(/\s/g, '');
        // var getType = document.querySelector('input[name="type"]:checked').value.toString();
            
        $("#mdid").val(userID);
        $("#mdn").val(userName);

        if(userType === 'admin') {
          $('#mda').prop('checked', true);
        }else{
          $('#mdu').prop('checked', true);
        }
    });


    
    $('.modal-footer > #updateUser').click(function() {

      UpdateRec();

    });

    function UpdateRec(){

        let mid = $('#mdid').val();
        let mnm = $('#mdn').val();
        let mpass = $('#mdp').val();
        let mtype = $('input[name="type"]:checked').val().toString();
            mtype.replace(/\s/g, mtype);
        const action = 'submitUser';

        if(confirm('Are you sure to update this user?')) {
    
            $.ajax({

                type:'POST',
                url:'./system/load.php',
                data: {action: action, userID: mid, userName: mnm, userPass: mpass, userType: mtype},
                beforeSend: function () {
                    $('.modal-body').css('opacity', '.5');
                },
                success: function(data) {

                  if(data) {

                    alert(data);
                    $('#mdid').val('');
                    $('#mdn').val('');
                    $('#mdp').val('');


                    fetchUser();

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

