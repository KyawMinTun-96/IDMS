<?php 

    session_start();
    if(isset($_SESSION['Utype'])) {

    }else {
        header('Location:../index.php');
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 p-5 table-bordered my-5 mb-5">
            <form name='report' enctype="multipart/form-data" method="post">
                Select&nbsp;&nbsp;
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="deptcomm" id="dept" value="deptt" onclick="showUser(this.value);">Department&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="deptcomm" id="comm" value="comm" onclick="showUser(this.value);">Committee/Club
                </div>
                
                <br>Department/Committee
                <p id="combo"></p>

                Activity
                <select name="ActType" class="form-control">
                    <option selected="" value="Default">Please select activity</option>
                    <option value="Workshop">Workshop</option>
                    <option value="Seminar">Seminar</option>
                    <option value="Lecture">Lecture</option>
                    <option value="Quiz">Quiz</option>
                    <option value="Poster Making">Poster Making</option>
                    <option value="Field Visit">Field Visit</option>
                    <option value="Others">Others</option>
                </select><br>

                <label>Activity Name</label>
                <input type="text" class="form-control" name="actName" placeholder="Name of the activity"><br>

                <label>Activity Coordinator</label>
                <input type="text" class="form-control"name="actCooName" placeholder="Name of the activity Coordinator"><br>

                <div class="form-check form-check-inline">
                    Activity Start Date:<input type="Date" name="ActFrom" class="form-control" style="width: 30%;">
                    Activity End Date:<input type="Date" class="form-control" name="ActTo" style="width: 30%">
                </div><br>

                <div class="form-group">
                    <br><label for="exampleFormControlFile1">Report File(allowed formats .pdf, .docx,.xlsx,.pptx)</label>
                    <input type="file" name="fileToUpload" class="form-control-file" accept=".pdf, .xls, .txt" multiple>
                </div> 

                <label>Remarks</label>
                <input type="Remarks" class="form-control" name="Remarks" placeholder="Remarks if any">
                <br><br>

                <div class="row justify-content-end no-gutters">
                    <button type="submit" class="btn btn-success btn-md"  name="submit" value="Submit" style="border-color:rgb(7, 109, 175);background-color:rgb(7, 109, 175);">Submit</button>
                </div class="">
            </form>

            <div id="imagePreview"></div>
        </div>
    </div>
</div>



<script>

var btnSubmit = document.getElementsByName('submit')[0];

btnSubmit.addEventListener('click', function(e) {

    e.preventDefault();
    const depName = document.report.deptcomm;
    const did = document.report.did;
    const actType = document.report.ActType;
    const actName = document.report.actName;
    const actCooName = document.report.actCooName;
    const actFrom = document.report.ActFrom;
    const actTo = document.report.ActTo;
    const remark = document.report.Remarks;
    const fileInput = document.report.fileToUpload;


    if(checkName(depName)) {
        if(checkDid(did)) {
            if(checkType(actType)) {
                if(checkActName(actName)) {
                    if(checkActCooName(actCooName)) {
                        if(checkDate(actFrom, actTo)) {
                            if(checkFile(fileInput)) {
                                if(checkRemark(remark)) {

                                    loadReport(depName.value, did.value, actType.value, actName.value, actCooName.value, actFrom.value, actTo.value, remark.value, fileInput);

                                }
                            }
                        }
                    }
                }
            }
        }

    }

    return false;

});




function checkName(depName) {

    var isChecked = false;

    for (let i = 0; i < depName.length; i++) {

        if(depName[i].checked) {

            console.log(depName.length);
            console.log(depName[i].checked);
            console.log(depName[i].value);

            isChecked = true;
            return true;

        }

    }


    alert('Please select department or committee club!');
    depName[0].focus();
    return false;


}


function checkDid(did) {

    let depcomm = did.value;

    if(depcomm.length == 0 || depcomm == "Default") {

        alert('Please select department/committee name!');
        did.focus();
        return false;

    }else {

        // console.log(did.options[did.selectedIndex].text);
        return true;
    }

    

}


function checkType(actType) {

    let type = actType.value;

    if(type == 'Default') {

        alert('Please select activity');
        actType.focus();
        return false;

    }else {

        return true;

    }
}


function checkActName(actName) {

    let act_name = actName.value;
    var letters = /^[a-zA-Z\s]+$/;


    if(act_name.match(letters)) {

        return true;

    }else if(act_name.length == 0) {

        alert('Please fill activity name!');
        actName.focus();
        return false;

    }else {

        alert('Activity name must be character only!');
        actName.focus();
        return false;

    }

}


function checkActCooName(actCooName) {

    let coName = actCooName.value;
    let letters = /^[A-Za-z\s\.-]+$/;

    if(coName.length == 0) {

        alert('Please fill name of activity coordinator!');
        actCooName.focus();
        return false;

    }else if(!coName.match(letters)) {

        alert('Activity coordinator name must have character only!');
        actCooName.focus();
        return false;

    }else {

        return true;

    }
}


function checkDate(dfrom, dto) {

    let dFrom = dfrom.value;
    let dTo = dto.value;

    if(dFrom.length == 0) {

        alert('Please fill start date!');
        dfrom.focus();
        return false;

    }else if(dTo.length == 0) {

        alert('Please fill end date!');
        dto.focus();
        return false;

    }else {

        return true;

    }
}


function checkRemark(remark) {

    let rem = remark.value;
    let letters = /^[A-Za-z0-9\s!@#\$%\^\&*\(\)+=._-]+$/;
    
    if(rem.match(letters) && rem.length != 0) {

        return true;

    }else {

        alert('Please fill remark!');
        remark.focus();
        return false;

    }



}


function checkFile(fileInput) {

    let filePath = fileInput.value;  

    let allowedExtensions = /(\.pdf|\.ppt|\.xls|\.doc)$/i;
        
    if (fileInput.files.length == 0) {

        alert('Please choose file!');
        fileInput.focus();
        console.log(filePath.length);
        return false;

    }else if(!allowedExtensions.exec(filePath)) {

        alert('Invalid file type');
        fileInput.value = '';
        return false;
        
    }else {

        return true;

    }


}


function showUser(str) {

    if (!str == "") {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("combo").innerHTML = this.responseText;

            }

        };

        xmlhttp.open("GET", "./system/process.php?q=" + str, true);
        xmlhttp.send();

    }else { 

        document.getElementById('dept').innerHTML = '';
        document.getElementById('comm').innerHTML = '';
        return;


    }
}



function loadReport(depName, did, actType, actName, actCooName, actFrom, actTo, reMark, fileInput) {

    var docfile = fileInput.files[0];
    var repo = {
        depcom: depName,
        did: did,
        acttype: actType,
        actname: actName,
        actconame: actCooName,
        actfrom: actFrom,
        actto: actTo,
        remark: reMark
    };

    var repData = JSON.stringify(repo);

    var form_data = new FormData();
        form_data.append("file", docfile);
        form_data.append("repdata", repData);
    

    $.ajax({

        url: './system/process.php',
        method: 'POST',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
                alert(data);
                window.location.reload();
                return true;
        }
    });



}




</script>

