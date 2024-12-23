<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: index.php"); // Redirect if not logged in
    exit;
}

$showAlert = false;
$showError = false;
include '_dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $etype = $_POST['entery_type'];
    $sname = $_POST['sname'];
    $fname = $_POST['fname'];
    $mob1 = $_POST['contact1'];
    $mob2 = $_POST['contact2'];
    $ccat = $_POST['ccategory'];
    $substr = $_POST['subject_stream'];
    // State
    $state = ($_POST['entry_mode'] == 'select') ? $_POST['state'] : $_POST['manual_state'];
    // City
    $city = ($_POST['entry_mode'] == 'select') ? $_POST['city'] : $_POST['manual_city'];
    // School
    $schoolname = ($_POST['entry_mode'] == 'select') ? $_POST['school'] : $_POST['manual_school'];
    $entry_mode = $_POST['entry_mode'];

    $existfield = "SELECT * FROM enquiry WHERE sname = '$sname' AND contact1 = '$mob1' AND contact2='$mob2'";
    $result = mysqli_query($conn, $existfield);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $showError = "Student Name and Mobile number are same like previous entery";
    } else {
        $query = "INSERT INTO `enquiry`(`entery_type`,`sname`, `fname`, `contact1`, `contact2`, `ccategory`, `subject_stream`,`state`, `city`, `school_name`) VALUES ('$etype', '$sname','$fname','$mob1','$mob2','$ccat','$substr', '$state','$city','$schoolname')";
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
</head>

<body>
    <?php require 'components/_navbar.php'; ?>
    <?php
    include 'components/_alert-success.php';
    // if ($showAlert) {
        //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //                     Student details is <strong>Successfully</strong> save into the list
        //                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //               </div>';
        // }
        
        ?>
    <?php
    include 'components/_alert-error.php';
    // if ($showError) {
    //     echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    //                     <strong>' . $showError . '</strong>
    //                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //         </div>';
    // }
    ?>
    <div class="container form-container mt-5">
        <h2 class="text-center">Student Entry Form</h2>
        <form class="row g-2" action="dataform.php" method="POST">
            <div>
                <label for="entery_type" class="form-label">Select Form Type</label>
                <select name="entery_type" class="form-select" id="entery_type">
                    <option>Select</option>
                    <option value="enquire">Enquire Form</option>
                    <option value="list">List</option>
                </select>
            </div>
            <!-- Student Name -->
            <div class="col-md-6">
                <label for="sname" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="sname" name="sname" required>
            </div>

            <!-- Father's Name -->
            <div class="col-md-6">
                <label for="fname" class="form-label">Father's Name</label>
                <input type="text" class="form-control" id="fname" name="fname" required>
            </div>


            <!-- Mobile Number -->
            <div class="col-md-4 mt-3">
                <label for="contact1" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="contact1" name="contact1" required>
            </div>

            <!-- Alternative Mobile Number -->
            <div class="col-md-4 mt-3">
                <label for="contact2" class="form-label">Alternative Mobile Number</label>
                <input type="text" class="form-control" id="contact2" name="contact2">
            </div>

            <!-- Cast Category -->
            <div class="col-md-4 mt-3">
                <label for="ccategory" class="form-label">Cast Category</label>
                <select class="form-control" id="ccategory" name="ccategory" required>
                    <option>Select Category</option>
                    <option value="General">General</option>
                    <option value="OBC">OBC</option>
                    <option value="SC">SC</option>
                    <option value="ST">ST</option>
                </select>
            </div>

            <div>
                <label for="subject_stream" class="form-label">Subject Stream</label>
                <select name="subject_stream" class="form-select" id="subject_stream">
                    <option value="PCM">PCM</option>
                    <option value="PCB">PCB</option>
                    <option value="Commerce">Commerce</option>
                    <option value="Arts">Arts</option>
                </select>
            </div>
            <!-- Selection or Manual Entry Switch -->
            <div class=" mt-3 mb-2 d-flex">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="entry_mode" id="select_mode" value="select" checked>
                    <label class="form-check-label" for="select_mode">Select from dropdown</label>
                </div>
                <div class="form-check mx-3">
                    <input type="radio" class="form-check-input" name="entry_mode" id="manual_mode" value="manual">
                    <label class="form-check-label" for="manual_mode">Enter manually</label>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <!-- State Selection -->
                <select class="form-control" id="state" name="state">
                    <option value="">Select State</option>
                    <option value="State 1">State 1</option>
                    <option value="State 2">State 2</option>
                </select>
                <input type="text" class="form-control" id="manual_state" name="manual_state" placeholder="Or enter state manually" style="display:none;">
            </div>

            <div class="col-md-6">
                <!-- City Selection -->
                <select class="form-control" id="city" name="city">
                    <option value="">Select City</option>
                    <option value="City 1">City 1</option>
                    <option value="City 2">City 2</option>
                </select>
                <input type="text" class="form-control" id="manual_city" name="manual_city" placeholder="Or enter city manually" style="display:none;">
            </div>

            <div class="mb-3">
                <!-- School Selection -->
                <select class="form-control" id="school" name="school">
                    <option value="">Select School</option>
                    <option value="School 1">School 1</option>
                    <option value="School 2">School 2</option>
                </select>
                <input type="text" class="form-control" id="manual_school" name="manual_school" placeholder="Or enter school manually" style="display:none;">
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>

    <!-- Custom Script to toggle fields based on radio button -->
    <script>
        document.getElementById('select_mode').addEventListener('change', function() {
            toggleFields(true);
        });
        document.getElementById('manual_mode').addEventListener('change', function() {
            toggleFields(false);
        });

        function toggleFields(isSelectMode) {
            // State
            const stateSelect = document.getElementById('state');
            const stateManual = document.getElementById('manual_state');
            stateSelect.style.display = isSelectMode ? 'block' : 'none';
            stateManual.style.display = isSelectMode ? 'none' : 'block';
            stateSelect.required = isSelectMode;
            stateManual.required = !isSelectMode;

            // City
            const citySelect = document.getElementById('city');
            const cityManual = document.getElementById('manual_city');
            citySelect.style.display = isSelectMode ? 'block' : 'none';
            cityManual.style.display = isSelectMode ? 'none' : 'block';
            citySelect.required = isSelectMode;
            cityManual.required = !isSelectMode;

            // School
            const schoolSelect = document.getElementById('school');
            const schoolManual = document.getElementById('manual_school');
            schoolSelect.style.display = isSelectMode ? 'block' : 'none';
            schoolManual.style.display = isSelectMode ? 'none' : 'block';
            schoolSelect.required = isSelectMode;
            schoolManual.required = !isSelectMode;
        }

        // Initial state setup
        toggleFields(true);
    </script>
</body>

</html>