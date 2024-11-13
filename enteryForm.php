<?php
$showAlert = false;
$showError = false;
include 'components/_dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $etype = $_POST['entery_type'];
    $sname = $_POST['sname'];
    $fname = $_POST['fname'];
    $mob1 = $_POST['contact1'];
    $mob2 = $_POST['contact2'];
    $ccat = $_POST['ccategory'];
    $substr = $_POST['subject_stream'];
    $schoolname = $_POST['school_name'];
    $city = $_POST['city'];
    $tehsil = $_POST['tehsil'];
    $village = $_POST['village'];
    $existfield = "SELECT * FROM enquiry WHERE sname = '$sname' AND contact1 = '$mob1' AND contact2='$mob2'";
    $result = mysqli_query($conn, $existfield);
    $rowCount = mysqli_num_rows($result);
    if($rowCount>0){
        $showError = "Student Name and Mobile number are same like previous entery";
    }else{

        $query = "INSERT INTO `enquiry`(`entery_type`,`sname`, `fname`, `contact1`, `contact2`, `ccategory`, `subject_stream`, `school_name`, `city`, `tehsil`, `Village`) VALUES ('$etype', '$sname','$fname','$mob1','$mob2','$ccat','$substr','$schoolname','$city','$tehsil','$village')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $showAlert = true;
            header("location:enteryForm.php");
        } else {
            $showError = "Data Can't be insert";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Form</title>
    <!-- Bootstrap 5.0 CDN -->
    <link href="bootstrap-5.2.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <?php require 'components/_navbar.php'; ?>
    <?php
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Student details is <strong>Successfully</strong> save into the list
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
    }

    ?>
    <?php
    if ($showError) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>' . $showError . '</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>
    <div class="container form-container">
        <h2 class="text-center">Student Details Form</h2>

        <!-- Dropdown to change form type -->
        
        <!-- Student Details Form -->
        <form action="enteryForm.php" method="post" id="enteryForm" class="row g-3">
            
        <div class="mb-3">
                <label for="entery_type" class="form-label">Select Form Type</label>
                <select name="entery_type" class="form-select" id="entery_type">
                    <option>Select</option>
                    <option value="enquire">Enquire Form</option>
                    <option value="list">List</option>
                </select>
            </div>
            <!-- Student Name & Father's Name -->
            <div class="col-md-6">
                <label for="sname" class="form-label">Student Name</label>
                <input type="text" name="sname" class="form-control" id="sname">
            </div>
            <div class="col-md-6">
                <label for="fname" class="form-label">Father's Name</label>
                <input type="text" name="fname" class="form-control" id="fname">
            </div>

            <!-- Mobile Numbers -->
            <div class="col-md-6">
                <label for="contact1" class="form-label">Mobile Number</label>
                <input type="tel" name="contact1" class="form-control" id="contact1">
            </div>
            <div class="col-md-6">
                <label for="contact2" class="form-label">Alternate Mobile Number</label>
                <input type="tel" name="contact2" class="form-control" id="contact2">
            </div>
            <!-- student cast category -->
            <div class="col-md-6">
                <label for="ccategory" class="form-label">Cast Category</label>
                <select name="ccategory" class="form-select" name="ccategory" id="ccategory">
                    <option>Select</option>
                    <option value="General">General</option>
                    <option value="OBC">OBC</option>
                    <option value="SC">SC</option>
                    <option value="ST">ST</option>
                </select>
            </div>

            <!-- Subject Stream -->
            <div class="col-md-6">
                <label for="subject_stream" class="form-label">Subject Stream</label>
                <select name="subject_stream" class="form-select" id="subject_stream">
                    <option value="PCM">PCM</option>
                    <option value="PCB">PCB</option>
                    <option value="Commerce">Commerce</option>
                    <option value="Arts">Arts</option>
                </select>
            </div>

            <!-- School Name & Address (City, Tehsil, Village) -->
            <div>
                <label for="school_name" class="form-label">School Name</label>
                <input type="text" name="school_name" class="form-control" id="school_name">
            </div>

            <!-- Address Fields -->
            <div class="col-md-4">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" class="form-control" id="city">
            </div>
            <div class="col-md-4">
                <label for="tehsil" class="form-label">Tehsil</label>
                <input type="text" name="tehsil" class="form-control" id="tehsil">
            </div>
            <div class="col-md-4">
                <label for="village" class="form-label">Village</label>
                <input type="text" name="village" name="village" class="form-control" id="village">
            </div>

            <!-- Submit Button -->
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <!-- JavaScript to switch between form types -->
    <!-- <script>
        function changeForm() {
            const formType = document.getElementById("formType").value;
            const studentForm = document.getElementById("studentForm");

            if (formType === "enquire") {
                // Show enquiry form specific adjustments here
                studentForm.reset();
                document.getElementById("studentName").setAttribute("required", false);
                document.getElementById("fatherName").setAttribute("required", false);
                document.getElementById("mobileNumber").setAttribute("required", false);
                document.getElementById("subjectStream").setAttribute("required", false);
                document.getElementById("schoolName").setAttribute("required", false);
                document.getElementById("city").setAttribute("required", false);
                document.getElementById("tehsil").setAttribute("required", false);
            } else {
                // Show registration form specific adjustments here
                document.getElementById("studentName").setAttribute("required", true);
                document.getElementById("fatherName").setAttribute("required", true);
                document.getElementById("mobileNumber").setAttribute("required", true);
                document.getElementById("subjectStream").setAttribute("required", true);
                document.getElementById("schoolName").setAttribute("required", true);
                document.getElementById("city").setAttribute("required", true);
                document.getElementById("tehsil").setAttribute("required", true);
            }
        }
    </script> -->
    <script src="/bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
</body>

</html>