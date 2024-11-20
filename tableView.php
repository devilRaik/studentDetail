<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table View</title>

    <!-- DataTable -->
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/datatable/dataTables.css">
</head>

<body>
    <div class="container">
        <table id="myTable" class="table table-striped table-bordered dt-responsive">
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

                // Query to fetch data
                // $sql = "SELECT * FROM `enquiry` WHERE entery_type=$etype, sname='$sname', fname='$fname', contact1='$mob1', contact2='$mob2', ccategory='$ccat', subject_stream='$substr', school_name='$schoolname', city='$city', tehsil='$tehsil', Village='$village'";
                $sql = "SELECT * FROM `enquiry`";
                $result = $conn->query($sql);

                // Check if we have data and display it
                $index = 1; // Start index from 1
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $index++ . "</td>"; // Display index number
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
    <script src="lib/jquery/jquery-3.7.1.min.js"></script>
    <script src="lib//datatable/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>