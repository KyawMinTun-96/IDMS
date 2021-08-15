
<?php 

    if(isset($_POST['action'])) {

        $connect = mysqli_connect('localhost', 'root', '', 'idms');

        if($_POST['action'] == 'fetchDep') {
            $qry = 'SELECT * FROM department_tbl ORDER BY deptt_id DESC';
            $res = mysqli_query($connect, $qry);

            $output = '
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th colspan="12" style="background-color:rgba(7, 109, 175, 0.9);text-align:center;">
                        <h4 class="text-white">Departments List</h4></th>
                        </tr>
                
                        <tr style="padding:10px;">
                        <th>ID</th>
                        <th>Department Name</th>
                        <th>Action</th>
                        </tr> 
                    </thead>
                    <tbody>
            ';

            while($row = mysqli_fetch_array($res)) {
                $output .= '
                <tr>      
                    <td> ' . $row["deptt_id"] . '</td> 
                    <td> ' . $row["deptt_name"] . ' </td>
                    <td> 
                        <button type="button" class="btn btn-info btn-sm update"  data-toggle="modal" id="' . $row["deptt_id"] . '" data-target="#myModal" value="' . $row["deptt_name"] . '">Modify</button>
                        <button type="button" class="btn btn-danger btn-sm delete" id="'. $row["deptt_id"] .'">Delete</button>
                    </td>
                </tr>';
            }

            $output .= '</tbody> </table>';
            echo $output;
        }


        if($_POST['action'] == 'fetchCom') {

            $qry = 'SELECT * FROM committee_tbl ORDER BY comm_id DESC';
            $res = mysqli_query($connect, $qry);

            $output = '
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th colspan="12" style="background-color:rgba(7, 109, 175, 0.9);text-align:center;">
                        <h4 class="text-white">Committees List</h4></th>
                        </tr>
                
                        <tr style="padding:10px;">
                        <th>ID</th>
                        <th>Committee Name</th>
                        <th>Action</th>
                        </tr> 
                    </thead>
                    <tbody>
            ';

            while($row = mysqli_fetch_array($res)) {
                $output .= '
                <tr>      
                    <td> ' . $row["comm_id"] . '</td> 
                    <td> ' . $row["comm_name"] . ' </td>
                    <td> 
                        <button type="button" class="btn btn-info btn-sm update"  data-toggle="modal" id="' . $row["comm_id"] . '" data-target="#myModal" value="' . $row["comm_name"] . '">Modify</button>
                        <button type="button" class="btn btn-danger btn-sm delete" id="'. $row["comm_id"] .'">Delete</button>
                    </td>
                </tr>';
            }

            $output .= '</tbody> </table>';
            echo $output;
        }


        if($_POST['action'] == 'fetchUser') {
            $qry = 'SELECT * FROM users_tbl ORDER BY id DESC';
            $res = mysqli_query($connect, $qry);

            $output = '
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th colspan="12" style="background-color:rgba(7, 109, 175, 0.9);text-align:center;">
                        <h4 class="text-white">Users List</h4></th>
                        </tr>
                
                        <tr style="padding:10px;">
                            <th>ID</th>
                            <th>User Name</th>
                            <th>User Password</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr> 
                    </thead>
                    <tbody>
            ';

            while($row = mysqli_fetch_array($res)) {
                $output .= '
                <tr>      
                    <td> ' . $row["id"] . '</td> 
                    <td> ' . $row["user_name"] . ' </td>
                    <td id="pass"> ' . crypt(md5($row["password"]), sha1($row["password"])) . ' </td>
                    <td id="type"> ' . $row["user_type"] . ' </td>
                    <td> 
                        <button type="button" class="btn btn-info btn-sm update"  data-toggle="modal" id="' . $row["id"] . '" data-target="#myModal" value="' . $row["user_name"] . '">Modify</button>
                        <button type="button" class="btn btn-danger btn-sm delete" id="'. $row["id"] .'">Delete</button>
                    </td>
                </tr>';
            }

            $output .= '</tbody> </table>';
            echo $output;
        }


        if($_POST['action'] == 'deleteDep') {
            $qry = "DELETE FROM department_tbl WHERE deptt_id ='" . $_POST["data_id"]. "'";

            if(mysqli_query($connect, $qry)) {
                echo 'Department name deleted Successfully..';
            }
            
        }


        if($_POST['action'] == 'deleteCom') {
            $qry = "DELETE FROM committee_tbl WHERE comm_id ='" . $_POST["data_id"] . "'";

            if(mysqli_query($connect, $qry)) {
                echo 'Committee name deleted Successfully..';
            }
            
        }


        if($_POST['action'] == 'deleteUser') {

            $qry = "DELETE FROM users_tbl WHERE id ='" . $_POST["data_id"] . "'";

            if(mysqli_query($connect, $qry)) {

                echo 'User name deleted Successfully..';
                
            }
            
        }


        if($_POST['action'] == 'submitDep') {


            if (isset($_POST['action']) && $_POST['depID'] !='' && $_POST['depName'] !='' ) {

                $did = $_POST['depID'];
                $dn = $_POST['depName'];
                $qry = "SELECT * FROM department_tbl WHERE deptt_name = '$dn' and deptt_id = $did";
                $res = mysqli_query($connect, $qry);

                if(mysqli_num_rows($res) > 0) {

                    echo "This department name is already in exist!";

                }else {

                    $qry = "UPDATE department_tbl SET deptt_name= '$dn' WHERE deptt_id= $did";
                    $res = mysqli_query($connect, $qry);

                  
                        if (mysqli_affected_rows($connect) > 0) {

                            echo "Department name updated successfully...";

                        }else {      

                            echo "Department name is not Updated!";

                        }

                }

            }else {

                echo 'Please fill out form!';
                
            }

        }


        if($_POST['action'] == 'submitCom') {


            if (isset($_POST['action']) && $_POST['comID'] !='' && $_POST['comName'] !='' ) {

                $cid = $_POST['comID'];
                $cn = $_POST['comName'];
                $qry = "SELECT * FROM committee_tbl WHERE comm_name = '$cn' and comm_id = $cid";
                $res = mysqli_query($connect, $qry);

                if(mysqli_num_rows($res) > 0) {

                    echo "This committee name is already in exist!";

                }else {

                    $qry = "UPDATE committee_tbl SET comm_name = '$cn' WHERE comm_id = $cid";
                    $res = mysqli_query($connect, $qry);

                        if (mysqli_affected_rows($connect) > 0) {

                            echo "Committee name updated successfully...";

                        }else {      

                            echo "Committee name is not Updated!";

                        }

                }

            }else {

                echo 'Please fill out form!';
                
            }

        }


        if($_POST['action'] == 'submitUser') {

            if (isset($_POST['action']) && $_POST['userID'] !='' && $_POST['userName'] !='' && $_POST['userType'] !='') {

                $uid = $_POST['userID'];
                $uname = $_POST['userName'];
                $upass = $_POST['userPass'];
                $utype = $_POST['userType'];

                $qry = "SELECT * FROM users_tbl WHERE user_name = '$uname' and password = '$upass' and user_type = '$utype' and id = $uid";
                $res = mysqli_query($connect, $qry);

                if(mysqli_num_rows($res) > 0) {

                    echo "This user name is already in exist!";

                }else {

                    if($upass == '') {

                        $qry = "UPDATE users_tbl SET user_name = '$uname', user_type='$utype' WHERE id = $uid";

                    }else {

                        $qry = "UPDATE users_tbl SET user_name = '$uname', password='$upass', user_type='$utype' WHERE id = $uid";
                        
                    }

                    $res = mysqli_query($connect, $qry);

                        if (mysqli_affected_rows($connect) > 0) {

                            echo "User name updated successfully...";

                        }else {      

                            echo "User name is not Updated!";

                        }

                }

            }else {

                echo 'Please fill out form!';
                
            }

        }
    }

?>