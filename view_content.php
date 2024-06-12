<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Information</title>
    <link rel="stylesheet" href="view_content.css" />
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <a href="index.php"><img width="50" height="50" src="logo.png" alt="Logo" /></a>
            <a href="index.php">Return Back</a>
        </nav>
        <section>
            <h2>Stored Subscribers</h2>
            <table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Clock In Time</th>
                    <th>Clock Out Time</th>
                    <th>Phone Number</th>
                </tr>
                <?php
                // Database connection details
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "employee_detail";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT ID, Name, ClockIn, ClockOut, PhoneNumber FROM Employee";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["Name"] . "</td>";
                        echo "<td>" . $row["ClockIn"] . "</td>";
                        echo "<td>" . $row["ClockOut"] . "</td>";
                        echo "<td>" . $row["PhoneNumber"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>0 results</td></tr>";
                }

                $conn->close();
                ?>
            </table>
        </section>
        <footer>
            &copy; 2024 Employee Shift Info
        </footer>
    </div>
</body>

</html>
