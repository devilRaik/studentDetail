<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP DataTable Example with Index</title>

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.jsdelivr.net/npm/datatables.net/js/jquery.dataTables.min.js"></script>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">PHP DataTable with Bootstrap 5 and Index Column</h2>

        <!-- Table to display data -->
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>S.No</th> <!-- Index Column -->
                    <th>Entery From</th>
                    <th>Student</th>
                    <th>Fathers</th>
                    <th>Cantact 1</th>
                    <th>Cantact 2</th>
                    <th>Category</th>
                    <th>Subject Stream</th>
                    <th>School Name</th>
                    <th>City</th>
                    <th>Tehsil</th>
                    <th>Village</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Example PHP code to fetch data (use your database here)
                // Database connection
                include 'components/_dbconnect.php';
                
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

                    // Query to fetch data
                    $sql = "SELECT * FROM `enquiry` WHERE entery_type=$etype, sname='$sname', fname='$fname', contact1='$mob1', contact2='$mob2', ccategory='$ccat', subject_stream='$substr', school_name='$schoolname', city='$city', tehsil='$tehsil', Village='$village'";
                    $result = $conn->query($sql);

                    // Check if we have data and display it
                    $index = 1; // Start index from 1
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $index++ . "</td>"; // Display index number
                            echo "<td>" . $row['sno'] . "</td>";
                            echo "<td>" . $row['sname'] . "</td>";
                            echo "<td>" . $row['fname'] . "</td>";
                            echo "<td>" . $row['contact1'] . "</td>";
                            echo "<td>" . $row['contact2'] . "</td>";
                            echo "<td>" . $row['ccategory'] . "</td>";
                            echo "<td>" . $row['subject_stream'] . "</td>";
                            echo "<td>" . $row['school_name'] . "</td>";
                            echo "<td>" . $row['city'] . "</td>";
                            echo "<td>" . $row['tehsil'] . "</td>";
                            echo "<td>" . $row['Village'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>No data available</td></tr>";
                    }
        
                ?>
            </tbody>
        </table>
    </div>

    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "paging": true, // Pagination enabled
                "ordering": true, // Enable column sorting
                "info": true, // Show information
                "autoWidth": false, // Auto width adjustments
            });
        });
    </script>

</body>

</html>