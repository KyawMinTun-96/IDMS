<?php 

      session_start();
      if(isset($_SESSION['Utype'])) {

      }else {

            header('Location:index.php');

      }

?>

<!-- style code -->
<style>
      table {
            width: 100%;
      }

      tr, th, td {
            padding: 10px 1px;
            text-align: center;
      }

      table tr:first-child th{
            background-color: rgba(7, 109, 175, 0.9);
            text-align: center;
            color: #fff;
      }


      table tr:nth-child(2) th {
            color: #000;
            font-weight: 500;
      }
</style>


<!-- html code -->
<table class="table-striped table-bordered">
      <tr>
            <th colspan="12">
            <h4>Activity Documents List</h4></th>
      </tr>

      <tr>
            <th>ID</th>
            <th>Department/ Committee Name</th>
            <th>Activity Type</th>
            <th>Activity Title</th>
            <th>Coordinator Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>View Report</th>
            <th>Upload Date & Time</th>
            <th>Uploaded By</th>
            <th>Remarks</th>
      </tr> 
      <?php 
            $con = mysqli_connect("localhost", "root", "", "idms");

            $qry = "SELECT doc_id, comm_dept,c.comm_name as dname, act_type, act_name, act_coordinator, act_from_date, act_to_date, doc_path, upload_date, upload_time, uploaded_by, remarks FROM upload_tbl u, committee_tbl c where u.com_dept_id=c.comm_id and u.comm_dept='comm' union SELECT doc_id, comm_dept,d.deptt_name as dname, act_type, act_name, act_coordinator, act_from_date, act_to_date, doc_path, upload_date, upload_time, uploaded_by, remarks FROM upload_tbl u, department_tbl d where u.com_dept_id=d.deptt_id and u.comm_dept='deptt' order by doc_id";

            $recset = mysqli_query($con, $qry);

            while ($row = mysqli_fetch_array($recset))
            {
                  echo "<tr>";      
                        echo "<td>";
                              $arr['docid'] = $row["doc_id"];
                              echo $row["doc_id"];
                        echo "</td>";

                        echo "<td>";
                              $arr['dname'] = $row["dname"];
                              echo $row["dname"];
                        echo "</td>";

                        echo "<td>";
                              $arr['act_type'] = $row["act_type"];
                              echo $row["act_type"];
                        echo "</td>";

                        echo "<td>";
                              $arr['act_name'] = $row["act_name"];
                              echo $row["act_name"];
                        echo "</td>";

                        echo "<td>";
                              $arr['act_coordinator'] = $row["act_coordinator"];
                              echo $row["act_coordinator"];
                        echo "</td>";

                        echo "<td>";
                              $arr['act_from_date'] = $row["act_from_date"];
                              echo $row["act_from_date"];
                        echo "</td>";

                        echo "<td>";
                              $arr['act_to_date'] = $row["act_to_date"];
                              echo $row["act_to_date"];
                        echo "</td>";

                        echo "<td style=\"text-align:center\">";
                              $arr['doc_path'] = $row["doc_path"];
                              echo "<a href=\"uploads\\" . $row["doc_path"] . "\">view</>";
                        echo "</td>";

                        echo "<td>";
                              echo $row["upload_date"] ." / ". $row["upload_time"];
                        echo "</td>";

                        echo "<td>";
                              echo $row["uploaded_by"];
                        echo "</td>";

                        echo "<td>";
                              $arr['remarks'] = $row["remarks"];
                              echo $row["remarks"];
                        echo "</td>";
                        
                  echo "</tr>";
            }
 ?>
</table>

