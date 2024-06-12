<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Shift</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

    <header>
        <img src="logo.png" alt="Logo">
        <h1>Employee Shift detail</h1>
    </header>
    <div class="container">
    
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

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Insert new employee data
                $Id = $_POST["Id"];
                $name = $_POST["name"];
                $clockIn = $_POST["clockIn"];
                $clockOut = $_POST["clockOut"];
                $phoneNumber = $_POST["phoneNumber"];
                $stmt = $conn->prepare("INSERT INTO Employee (ID, Name, ClockIn,ClockOut,PhoneNumber) VALUES (?, ?, ?, ?, ? )");

                if ($stmt->execute()) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            }

        
        $conn->close();
        ?>

        <div class="forms-container">
            <div>
                <h2>Add New Employee</h2>
                <form method="post" action="Add.php"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="Id">ID:</label>
                    <input type="number" id="Id" name="Id" required>

                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="clockIn">ClockIn:</label>
                    <input type="time" id="clockIn" name="clockIn" required>

                    <label for="clockOut">ClockOut:</label>
                    <input type="time" id="clcockOut" name="clockOut" required>

                    <label for="phoneNumber">Phone Number:</label>
                    <input type="tel" id="phoneNumber" name="phoneNumber" required>


                    <input type="submit" action value="Submit">
                </form>
            </div>

            <div class="button-container">
            <form method="get" action="view_content.php">
                <button type="submit">View Data</button>
            </form>
        </div>
        <div class="footer">
            <p>&copy; 2024 Employee Shift Info</p>
        </div>
    </div>

</body>
</html>
