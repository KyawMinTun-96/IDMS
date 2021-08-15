<?php 

    session_start();
    if(isset($_SESSION['Utype'])) {


    }else {

        header('Location:../index.php');

    }

?>


<?php
  
if(isset($_GET['q'])) {

        $dc = $_GET['q'];
        $con = mysqli_connect("localhost", "root", "", "idms");
        
        if ($dc == 'deptt') {
    
            $qry = "SELECT deptt_id, deptt_name FROM department_tbl";
    
        }else {
    
            $qry = "SELECT comm_id, comm_name FROM committee_tbl";
    
        }
    
    
    
        $run = mysqli_query($con, $qry);
        $str = '<select name="did">';
        $str .= '<option selected="" value="Default">Please select name</option>';
    
            while ($rows = mysqli_fetch_array($run))
            {
                $str .= "<option value=" . $rows[0] . ">" . $rows[1] . "</option>";
            }
    
        $str = $str . '</select>';
    
        echo $str;

}





if(isset($_FILES['file']) && isset($_POST['repdata'])){

    $connect = mysqli_connect('localhost', 'root', '', 'idms');
    $reports = json_decode($_POST['repdata']);

    if($_FILES['file']['name'] != '') {

        $test = explode('.', $_FILES['file']['name']);
        $extension = end($test);    
        $fileName = strtolower(pathinfo($_FILES['file']['name'])['filename']);

        $docName = $fileName . "_" . mt_rand(time(), time()) + mt_rand(time(), time()) . '.' . $extension;
        $location = '../uploads/' . $docName;


        move_uploaded_file($_FILES['file']['tmp_name'], $location);
        // echo "<pre>" . print_r($_FILES['file'], true) . "</pre>";


    }

    
    $uname = $_SESSION['Uname'];
    $dc = $reports->depcom;
    $dcn = $reports->did;
    $aType = $reports->acttype;
    $aName = $reports->actname;
    $aCoord = $reports->actconame;
    $afd = $reports->actfrom;
    $atd = $reports->actto;
    $fn = $docName;
    $rem = $reports->remark;


    $dID = 1;
    $qry = 'SELECT max(doc_id) as maxid FROM upload_tbl';
    $res = mysqli_query($connect, $qry);
    foreach($res as $id) {
        $dID = $id['maxid'] + 1;
    }

    $qry = "INSERT INTO upload_tbl VALUES ($dID, '$dc', '$dcn', '$aType', '$aName', '$aCoord', '$afd', '$atd', '$fn', '" . date("Y/m/d") ."', '" . date("h:i:s") . "', '$uname', '$rem')";
    $res = mysqli_query($connect, $qry);

    if(mysqli_affected_rows($connect) > 0) {

        echo "Document uploaded successfully...";

    }else {

        echo "Not uploaded report!";

    }
    
    




























}


?>

