<!--
Student Name: Dara Loughnane
Student ID: C00306835
Purpose of File: Receive form data and insert it to the database 
PHP file for AddNewRentalCategory screen
-->

<?php // Beginning of PHP file
include 'db.inc.php'; // Database connection for 2nd Year Computing Web Programming and Databases

// Get data from HTML file using POST
$RentalCategoryID = $_POST['RentalCategoryID']; // Variable to store rental category ID
$StandardCostPerDay = $_POST['StandardCostPerDay']; // Variable to store standard cost per day
$FiveDayDiscountPercent = $_POST['FiveDayDiscountPercent']; // Variable to store five day discount percentage
$TenDayDiscountPercent = $_POST['TenDayDiscountPercent']; // Variable to store ten day discount percentage

// SQL query to insert data
$sql = "INSERT INTO RentalCategory
(RentalCategoryID, StandardCostPerDay, FiveDayDiscountPercent, TenDayDiscountPercent) 
VALUES
('$RentalCategoryID', '$StandardCostPerDay', '$FiveDayDiscountPercent', '$TenDayDiscountPercent')"; // Variables to store the information

// Run the SQL query 
if(mysqli_query($con, $sql))
{
echo "New Rental category successfully added"; // Message to show that a new rental category was added to the database 	
} 
else 
{
echo "Error: " . $sql . "<br>" . mysqli_error($con); // If something wrong happens, this displays the error and where it is	
}
// Close connection
mysqli_close($con); 
?> <!--Closing PHP tag. End of PHP file-->