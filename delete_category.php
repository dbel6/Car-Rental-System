<!--
Student Name: Dara Loughnane
Student ID: C00306835
Purpose: PHP file for the Delete Rental Category screen
Year 2 Semester 2 project
-->

<?php 
include "db.inc.php"; // Connection to database

$rentalCategory = $_POST['$rentalCategory']; // Get rental category using POST method

$sql = "Delete from vehicle category where category name = '$rentalCategory'"; // SQL delete query 

if(mysqli_query($con,$sql))
{
echo "Rental Category was successfully deleted"; // Shows that the vehicle category was successfully deleted 	
}
else
{
echo "Error occurred while deleting the record: " . mysqli_error($con); // Error occured while deleting the category. Shows error afterwards
}

mysqli_close($con); // Ends and close connection
?>