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