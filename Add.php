<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Information</title>
</head>
<body>
<?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "employee_detail";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Id = $_POST["Id"];
        $name = $_POST["name"];
        $clockIn = $_POST["clockIn"];
        $clockOut = $_POST["clockOut"];
        $phoneNumber = $_POST["phoneNumber"];

            echo "<tr>";
            echo "<td>" . $Id."<br>". "</td>";
            echo "<td>" . $name ."<br>". "</td>";
            echo "<td>" . $clockIn ."<br>". "</td>";
            echo "<td>" . $clockOut . "<br>"."</td>";
            echo "<td>" . $phoneNumber ."<br>". "</td>";
            echo "</tr>";
    
    
        $sql = "INSERT INTO Employee (ID, Name, ClockIn,ClockOut,PhoneNumber)
        VALUES ('$Id','$name', '$clockIn','$clockOut','$phoneNumber')";
        $insert = mysqli_query($conn, $sql);
        if ($insert) {
            echo "New record created successfully";
        } else {
            echo "Error ";
        }
        mysqli_close($conn);

        
    }
    ?>
    <a href="index.php">Return Back</a>
    <a href="view_content.php">View Data</a>


    </body>
    </html>