<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Form</title>
    <!-- Bootstrap 5.0 CDN -->
    <link href="bootstrap-5.2.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>

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

    <div class="container form-container">
        <h2 class="text-center">Student Details Form</h2>

        <!-- Dropdown to change form type -->
        <div class="mb-3">
            <label for="formType" class="form-label">Select Form Type</label>
            <select class="form-select" id="formType" onchange="changeForm()">
                <option value="enquire">Enquire Form</option>
                <option value="registration">Registration Form</option>
            </select>
        </div>

        <!-- Student Details Form -->
        <form id="studentForm" class="row g-3">
            <!-- Student Name & Father's Name -->
            <div class="col-md-6">
                <label for="studentName" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="studentName" required>
            </div>
            <div class="col-md-6">
                <label for="fatherName" class="form-label">Father's Name</label>
                <input type="text" class="form-control" id="fatherName" required>
            </div>

            <!-- Mobile Numbers -->
            <div class="col-md-6">
                <label for="mobileNumber" class="form-label">Mobile Number</label>
                <input type="tel" class="form-control" id="mobileNumber" required>
            </div>
            <div class="col-md-6">
                <label for="alternateMobile" class="form-label">Alternate Mobile Number</label>
                <input type="tel" class="form-control" id="alternateMobile">
            </div>

            <!-- Subject Stream -->
            <div class="col-md-6">
                <label for="subjectStream" class="form-label">Subject Stream</label>
                <select class="form-select" id="subjectStream" required>
                    <option value="PCM">PCM</option>
                    <option value="PCB">PCB</option>
                    <option value="Commerce">Commerce</option>
                    <option value="Arts">Arts</option>
                </select>
            </div>

            <!-- School Name & Address (City, Tehsil, Village) -->
            <div class="col-md-6">
                <label for="schoolName" class="form-label">School Name</label>
                <input type="text" class="form-control" id="schoolName" required>
            </div>

            <!-- Address Fields -->
            <div class="col-md-4">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" required>
            </div>
            <div class="col-md-4">
                <label for="tehsil" class="form-label">Tehsil</label>
                <input type="text" class="form-control" id="tehsil" required>
            </div>
            <div class="col-md-4">
                <label for="village" class="form-label">Village</label>
                <input type="text" class="form-control" id="village">
            </div>

            <!-- Submit Button -->
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <!-- JavaScript to switch between form types -->
    <script>
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
    </script>

</body>

</html>