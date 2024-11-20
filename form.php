<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: index.php");
    exit;
}

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
    if ($rowCount > 0) {
        $showError = "Student Name and Mobile number are same like previous entery";
    } else {

        $query = "INSERT INTO `enquiry`(`entery_type`,`sname`, `fname`, `contact1`, `contact2`, `ccategory`, `subject_stream`, `school_name`, `city`, `tehsil`, `Village`) VALUES ('$etype', '$sname','$fname','$mob1','$mob2','$ccat','$substr','$schoolname','$city','$tehsil','$village')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $showAlert = true;
            // header("location:enteryForm.php");
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
    <title>Student Entry Form</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .manual-entry {
            display: none;
            margin-top: 10px;
        }

        .switch {
            display: flex;
            gap: 20px;
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <h2 class="text-center">Student Entry Form</h2>
        <form action="#" method="post" class="row g-2">
            <div class="mb-3">
                <label for="entery_type" class="form-label">Select Form Type</label>
                <select name="entery_type" class="form-select" id="entery_type">
                    <option>Select</option>
                    <option value="enquire">Enquire Form</option>
                    <option value="list">List</option>
                </select>
            </div>

            <!-- Student Name -->
            <div class="col-md-6">
                <label for="studentName" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="studentName" name="studentName" required>
            </div>

            <!-- Father's Name -->
            <div class="col-md-6">
                <label for="fatherName" class="form-label">Father's Name</label>
                <input type="text" class="form-control" id="fatherName" name="fatherName" required>
            </div>

            <!-- Cast Category -->
            <div class="col-md-4">
                <label for="castCategory" class="form-label">Cast Category</label>
                <input type="text" class="form-control" id="castCategory" name="castCategory" required>
            </div>

            <!-- Mobile Number -->
            <div class="col-md-4">
                <label for="mobileNumber" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" required>
            </div>

            <!-- Alternative Mobile Number -->
            <div class="col-md-4">
                <label for="altMobileNumber" class="form-label">Alternative Mobile Number</label>
                <input type="text" class="form-control" id="altMobileNumber" name="altMobileNumber">
            </div>

            <!-- State Selection -->
            <div class="col-md-4 mt-4">

                <div class="switch">
                    <label>
                        <input type="radio" name="cityChoice" value="select" checked onclick="toggleCityFields()"> Select from List
                    </label>
                    <label>
                        <input type="radio" name="cityChoice" value="manual" onclick="toggleCityFields()"> Manual Entry
                    </label>
                </div>
                <div class="stateSelectDiv">
                    <select class="form-select mt-2" id="state" name="state" required>
                        <option value="">Select State</option>
                        <option value="State1">State1</option>
                        <option value="State2">State2</option>
                        <option value="State3">State3</option>
                    </select>
                </div>
            </div>

            <!-- City Selection / Manual Entry -->
            <div class="col-md-4 mt-4">
                <div class="switch">
                    <label>
                        <input type="radio" name="cityChoice" value="select" checked onclick="toggleCityFields()"> Select from List
                    </label>
                    <label>
                        <input type="radio" name="cityChoice" value="manual" onclick="toggleCityFields()"> Manual Entry
                    </label>
                </div>

                <!-- City Dropdown -->
                <div id="citySelectDiv">
                    <select class="form-select mt-2" id="city" name="city">
                        <option value="">Select City</option>
                        <option value="City1">City1</option>
                        <option value="City2">City2</option>
                        <option value="City3">City3</option>
                    </select>
                </div>

                <!-- Manual City Input -->
                <div id="cityManualDiv" class="manual-entry">
                    <input type="text" class="form-control mt-2" id="manualCity" name="manualCity" placeholder="Enter City Name">
                </div>
            </div>

            <!-- School Selection / Manual Entry -->
            <div class="col-md-4 mt-4">
                <div class="switch">
                    <label>
                        <input type="radio" name="schoolChoice" value="select" checked onclick="toggleSchoolFields()"> Select from List
                    </label>
                    <label>
                        <input type="radio" name="schoolChoice" value="manual" onclick="toggleSchoolFields()"> Manual Entry
                    </label>
                </div>

                <!-- School Dropdown -->
                <div id="schoolSelectDiv">
                    <select class="form-select mt-2" id="school" name="school">
                        <option value="">Select School</option>
                        <option value="School1">School1</option>
                        <option value="School2">School2</option>
                        <option value="School3">School3</option>
                    </select>
                </div>

                <!-- Manual School Input -->
                <div id="schoolManualDiv" class="manual-entry">
                    <input type="text" class="form-control mt-2" id="manualSchool" name="manualSchool" placeholder="Enter School Name">
                </div>

            </div>

            <!-- Submit Button -->
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

    <!-- Bootstrap JS (optional, but useful for dynamic behavior) -->
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleCityFields() {
            var cityChoice = document.querySelector('input[name="cityChoice"]:checked').value;
            if (cityChoice === 'manual') {
                document.getElementById('cityManualDiv').style.display = 'block';
                document.getElementById('citySelectDiv').style.display = 'none';
            } else {
                document.getElementById('cityManualDiv').style.display = 'none';
                document.getElementById('citySelectDiv').style.display = 'block';
            }
        }

        function toggleSchoolFields() {
            var schoolChoice = document.querySelector('input[name="schoolChoice"]:checked').value;
            if (schoolChoice === 'manual') {
                document.getElementById('schoolManualDiv').style.display = 'block';
                document.getElementById('schoolSelectDiv').style.display = 'none';
            } else {
                document.getElementById('schoolManualDiv').style.display = 'none';
                document.getElementById('schoolSelectDiv').style.display = 'block';
            }
        }
    </script>
</body>

</html>