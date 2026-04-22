<!--
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				12/3/2026
    Purpose : 			To complete car listbox part of Rentals screen
-->

<?php
include 'db.inc.php';
//database connection

$sql = "SELECT CarID
FROM Car
WHERE CurrentStatus='Available' 
AND DeletedFlag = 0";
//Retreives valid available carIDs from the Car database

if (!$result = mysqli_query($con, $sql))
//Checks if theres an error in the sql
{
    die('Error in querying the database' . mysqli_error($con));
    //Outputs an error message if theres an error in the sql
}

echo "<br><select name='CarID' id='Car' onclick='populateCars()'>";
//Outputs a dropdown box where user can select company which retrieves their details when selected

while ($row = mysqli_fetch_array($result))
//Goes through each row
{
    $carID = $row['CarID'];
    //Puts the car ID from database into a car ID variable

    $_SESSION['CarID'] = $row['CarID'];
    //Puts the car ID into a session variable
    
    echo "<option value='$carID' id='CarID'>$carID</option>";
    //Displays an option with the car ID for that car
}

echo "</select>";
//Closes the dropdown box
?>