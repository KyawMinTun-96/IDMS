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

<!-- html code -->
<form class="p-5" id="addUser">

  <div class="form-group">
        <label for="user">Username</label>
        <input type="text" class="form-control" name="username" id="user" placeholder="Username..">
  </div>

  <div class="form-group">
        <label for="pass">Password</label>
        <input type="password" class="form-control" name="username" id="pass" placeholder="Password..">
  </div>

  <div class="mb-5">
        <label for="depttid">Admin:</label>
        <input type="radio" id="depttid" name="userType" value="admin" checked>&nbsp;&nbsp;&nbsp;&nbsp; 
        <label for="commid">User:</label>
        <input type="radio" id="commid" name="userType" value="user"> 
  </div>


  <div class="row no-gutters justify-content-end">
        <button type="button" class="btn btn-info btn-md" id="submitBtn">Insert</button>
  </div>

</form>


<!-- javascript code -->
<script>

    //Provide the XMLHttpRequest constructor for Internet Explorer 5.x-6.x:
    if (typeof XMLHttpRequest === "undefined") {
        XMLHttpRequest = function () {

            try { return new ActiveXObject("Msxml2.XMLHTTP.6.0"); }catch(e) {}
            try { return new ActiveXObject("Msxml2.XMLHTTP.3.0"); }catch (e) {}
            try { return new ActiveXObject("Microsoft.XMLHTTP"); }catch (e) {}
            throw new Error("This browser does not support XMLHttpRequest.");

        };
    }


    document.querySelector('#addUser #submitBtn').addEventListener('click', addUser);

    function addUser() {

        let name = document.getElementById('user').value.toString();
        let pass = document.getElementById('pass').value.toString();
        let userType = document.querySelector('input[name="userType"]:checked').value.toString();

        if(name != '' && pass != '' && userType != '') {

            const userObj = {
                name: name,
                pass: pass,
                type: userType
            };
            let jsonData = JSON.stringify(userObj);

            let xhr = new XMLHttpRequest();
            xhr.open('POST', './system/add.php', true);
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {

                    if(this.responseText == 'New user added successfully..') {

                        alert(this.responseText);
                        document.getElementById('user').value = '';
                        document.getElementById('pass').value = '';

                    }else {

                        alert(this.responseText);

                    }
                    
                }
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('json=' + encodeURIComponent(jsonData));

        }else {

            alert ('Please fill out form!');

        }

    }


</script>




