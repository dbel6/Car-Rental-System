<?php
include 'db.inc.php'; // Database connection

// SQL query to insert form data into a table (make sure table exists)
    $sql = "INSERT INTO vehicles 
    (registrationNumber, modelNumber, manufacturer, currentStatus, dateAddedToFleet, cumulativeRentals)
    VALUES 
    ('$registrationNumber', '$modelNumber', '$manufacturer', '$currentStatus', '$dateAddedToFleet', '$cumulativeRentals')";

    // Run query and check if successful
    if ($conn->query($sql) === TRUE) {
        echo "<p>Record added successfully!</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
?>