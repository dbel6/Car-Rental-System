<!--
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				17/3/2026
    Purpose : 			To complete sql update part of Rentals screen
-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <!--Link to css file which styles the form for better presentation-->
    <title>Update Rentals</title>
    <!--Title of page-->
</head>
<body>

<?php
session_start();
//start php session

$CompanyId = $_SESSION['CompanyId'];
//Gets the company ID from the session variable set in the rentals screen

include 'menu.php';
//menu connection
include 'db.inc.php';
//database connection

$carUpdate = "UPDATE Car
SET CurrentStatus='Rented',
CumulativeRentals=CumulativeRentals+1
WHERE CarID='{$_POST['CarID']}'";
//Updates the car details for a specific car checked by the car id and updated into the Car database

$companyUpdate = "UPDATE Company
SET AmountOwed=AmountOwed+{$_POST['displayRentalCost']}, 
TotalRentals=TotalRentals+1
WHERE CompanyId='$CompanyId'";
//Updates the company details for a specific company checked by the company id and updated into the Company database

$date = date("Y-m-d");
//Gets the current date for rental start date

$rentalInsert = "INSERT INTO Rental
(CompanyId, CarID, RentalStartDate, DueBackDate, ActualReturnDate, RentalCost, PenaltyCost, RentalStatus)
VALUES 
('$CompanyId', '{$_POST['CarID']}', '$date', '{$_POST['returnDate']}', $date, '{$_POST['displayRentalCost']}', 0, 'Active')";
//Inserts a new rental record into the Rentals table

echo "<form action='Rentals.html.php' method='POST'>";
//Form to display the details being submitted

echo "<div class='title'>";

if (!mysqli_query($con,$carUpdate))
//Checks if theres an error in the sql
{
    echo ("Error: " . mysqli_error($con));
    //Outputs an error message if theres an error in the sql
}
else if (!mysqli_query($con,$companyUpdate))
//Checks if theres an error in the sql
{
    echo ("Error: " . mysqli_error($con));
    //Outputs an error message if theres an error in the sql
}
else if (!mysqli_query($con,$rentalInsert))
//Checks if theres an error in the sql
{
    echo ("Error: " . mysqli_error($con));
    //Outputs an error message if theres an error in the sql
}
else
//Runs if no errors found
{
    if (mysqli_affected_rows($con) != 0)
    //Checks if any records were updated
    {
        echo mysqli_affected_rows($con) . " record(s) updated <br>";
        //Outputs message stating the amount of records updated
        echo "Car " . $_POST['CarID'] . " has been rented to company " . $CompanyId;
        //Displays the details of the car record who has been updated
    }
    else
    //Runs if no records were updated
    {
        echo "No records were changed";
        //Outputs message stating that no records were updated
    }
}

echo "</div>";

mysqli_close($con);
//Closes the sql database
?>
<br><br>
<div class="fullsubmit">
<!--Ensures submit button covers full width of page-->
<input type="submit" value="Return to Rentals Screen">
<!--Submit button where user can return to rentals screen-->
</div>
</form>
</body>
</html>