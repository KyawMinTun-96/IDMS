<?php

    if(isset($_POST['action'])) {
        $con = mysqli_connect("localhost", "root", "", "idms");

        //add department name
        if($_POST['action'] == 'addDep' && $_POST['dName'] != '') {
           
            $dn = $_POST["dName"];
            $qry = "SELECT * FROM department_tbl WHERE deptt_name ='$dn'";
            $res = mysqli_query($con, $qry);

            if(mysqli_num_rows($res) > 0) {

                echo "This department name is already in exist!";

            }else {

                $qry = "SELECT max(deptt_id) as max_id FROM department_tbl";
                $did = 1;
                $run = mysqli_query($con, $qry);

                while ($rows = mysqli_fetch_array($run)) {
                        $did = $rows['max_id'] + 1;
                    }

                $qry = "Insert into department_tbl values ($did, '$dn')";
                if (mysqli_query($con, $qry) == TRUE) {

                    echo 'Department name added successfully..';

                }else {

                    echo 'Department name is not insert!';

                }
        
            }

        }elseif($_POST['action'] == 'addCom' && $_POST['cName'] != '') {

            //add committee name           
            $cn = $_POST["cName"];
            $qry = "SELECT * FROM committee_tbl WHERE comm_name ='$cn'";
            $res = mysqli_query($con, $qry);

            if(mysqli_num_rows($res) > 0) {

                echo "This committee name is already in exist!";

            }else {

                $qry = "SELECT max(comm_id) as max_id FROM committee_tbl";
                $cid = 1;
                $run = mysqli_query($con, $qry);

                while ($rows = mysqli_fetch_array($run)) {
                        $cid = $rows['max_id'] + 1;
                    }

                $qry = "INSERT INTO committee_tbl VALUES ($cid, '$cn')";
                if (mysqli_query($con, $qry) == TRUE) {

                    echo 'Committee name added successfully...';

                }else {

                    echo 'Committee name is not insert!';

                }
        
            }
        }else {

            echo 'Please fill out form';

        }
        
    }


    if(isset($_POST['json'])) {

        $user = json_decode($_POST['json']);

        $connect = mysqli_connect("localhost", "root", "", "idms");
        $qry = 'SELECT * FROM users_tbl WHERE user_name = "' . $user->name . '" AND user_type = "' . $user->type. '"' ;
        $res = mysqli_query($connect, $qry);

        if(mysqli_num_rows($res) > 0) {

            echo 'This user name is already in exist!';

        }else{

            $qry = "SELECT max(id) as max_id FROM users_tbl";
            $uid = 1;
            $run = mysqli_query($connect, $qry);

            while ($rows = mysqli_fetch_array($run)) {
                    $uid = $rows['max_id'] + 1;
                }

            $qry = "INSERT INTO users_tbl (id, user_name, password, user_type) VALUES ('" . $uid . "', '" . $user->name . "', '"  .$user->pass . "', '" . $user->type . "')";
            $res = mysqli_query($connect, $qry);

                if($res == true) {

                    echo 'New user added successfully..';

                }else {

                    echo 'Not add new user!';

                }

        }


    }

?>