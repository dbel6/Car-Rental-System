<!--
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				9/3/2026
    Purpose : 			To complete php part of Rentals screen
-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <!--Link to css file which styles the form for better presentation-->
    <title>Rentals</title>
    <!--Title of page-->
    <script src="Rentals.js"></script>
    <!--Script used to embed Javascript-->
</head>
<body>

<?php
session_start();
//start php session

$_SESSION['CompanyId']=$_POST['CompanyId'];
//Retrieves the company ID and puts them into session variables

$CompanyId = $_SESSION['CompanyId'];
//Retrieves the company ID from the session variable

include 'menu.php';
//menu connection
include 'db.inc.php';
//database connection
?>

<form name="myForm" action="RentalsUpdate.php" onsubmit="return carListboxCheck() && overLimitCheck() && carConfirmCheck()" method="post">
<!--Form where user can input information which gets processed through a php file with method post to collect information-->
<!--Input gets sent to functions which checks if the user selected a car from the listbox, if the rental cost matches a certain criteria for renting and if the user wants to confirm submission and returns true or false depending on input-->

<div class='title'>
<h4>(Choose a car from the list below)</h4>
<!--Instructs user what to do in h4 text -->
<div id="display"></div>
<!--Displays the details of the car selected from the listbox-->
</div>

<?php

$companySelect = "SELECT 
AmountOwed, CreditLimit
FROM 
Company 
WHERE 
CompanyID = '$CompanyId'
";
//Retrieves the amount owed and credit limit from the Company database using the company ID

$sql = "SELECT 
Car.RegistrationNumber, 
CarType.ModelName, 
CarType.CarVersion, 
CarType.EngineSize, 
CarType.FuelType, 
RentalCategory.RentalCategoryID, 
Car.NumberOfDoors
FROM Car
INNER JOIN CarType 
ON Car.CarTypeID = CarType.CarTypeID
LEFT JOIN RentalCategory 
ON CarType.RentalCategory = RentalCategory.RentalCategoryID
WHERE Car.CurrentStatus='Available' 
AND Car.DeletedFlag = 0
";
//Retrieves attributes of available cars from the Car, Car Type and Rental Category tables who arent flagged for deletion

if (!mysqli_query($con, $sql))
//Checks if theres an error in the sql
{
    echo ("Error: " . mysqli_error($con));
    //Outputs an error message if theres an error in the sql
}

$result = mysqli_query($con,$sql);
//Puts valid info into result

echo "<table><tr><th>Registration Number</th><th>Model Name</th><th>Version</th><th>Engine Size</th><th>Fuel Type</th><th>Rental Category</th><th>Doors</th></tr>";
//Displays a table including various details of the cars

while ($row=mysqli_fetch_array($result))
//Goes through each row
{

    echo
        "<tr>
        <td>" . $row['RegistrationNumber']."</td>
        <td>" . $row['ModelName']."</td>
        <td>" . $row['CarVersion']."</td>
        <td>" . $row['EngineSize']."</td>
        <td>" . $row['FuelType']."</td>
        <td>" . $row['RentalCategoryID']."</td>
        <td>" . $row['NumberOfDoors']."</td>
        </tr>";
    //Prints out various details of available cars
        
}
echo "</table>";
//Ends table

include 'CarListbox.php';
//car listbox connection

$rentalCategorySelect = "SELECT 
RentalCategory.StandardCostPerDay,
RentalCategory.FiveDayDiscountPercent,
RentalCategory.TenDayDiscountPercent
FROM Car
INNER JOIN CarType ON Car.CarTypeID = CarType.CarTypeID
INNER JOIN RentalCategory ON CarType.RentalCategory = RentalCategory.RentalCategoryID
WHERE Car.CurrentStatus = 'Available'
AND Car.DeletedFlag = 0
LIMIT 1
";
//Retrieves rental costs from the RentalCategory table

$companyResult = mysqli_query($con, $companySelect);
$companyRow = mysqli_fetch_array($companyResult);
$rentalCategoryResult = mysqli_query($con, $rentalCategorySelect);
$rentalCategoryRow = mysqli_fetch_array($rentalCategoryResult);
//Puts info from database into variables
$amountOwed = $companyRow['AmountOwed'];
$creditLimit = $companyRow['CreditLimit'];
$standardCost = $rentalCategoryRow['StandardCostPerDay'];
$fiveDayDiscount = $rentalCategoryRow['FiveDayDiscountPercent'];
$tenDayDiscount = $rentalCategoryRow['TenDayDiscountPercent'];
//Puts the amount owed, credit limit and rental costs into variables to use for calculations
?>

<br><br>

<input type="hidden" name="AmountOwed" id="AmountOwed" value="<?php echo $amountOwed;?>">
<!--Hidden input to pass the amount owed to the javascript functions for calculations without displaying it on the page-->
<input type="hidden" name="CreditLimit" id="CreditLimit" value="<?php echo $creditLimit;?>">
<!--Hidden input to pass the credit limit to the javascript functions for calculations without displaying it on the page-->

<label for="returnDate">Return Date</label>
<!--Return date title-->
<br>
<input type="date" id="returnDate" name="returnDate" onchange="dateCheck(this)" required>
<!--Return date date box which sends the input to javascript and displays output in rental cost box-->
<br><br>

<label for="rentalCost">Rental Cost</label>
<!--Rental cost title-->
<br>
<input type="text" id="displayRentalCost" name="displayRentalCost" readonly>
<!--Rental cost text box which outputs the calculated rental cost-->
<!--Read only attribute allows for reading only and no modifying-->
<br><br>

<div class="fullsubmit">
<!--Ensures submit button covers full width of page-->
<input type="submit" value="Proceed with Rental">
<!--Submit button where user can proceed with rental-->

<?php
mysqli_close($con);
//Closes the sql database
?>

</div>
</form>
<script>
var standardCost = <?php echo $standardCost;?>;
//Passes standard cost from database into javascript
var fiveDayDiscount = <?php echo $fiveDayDiscount;?>;
//Passes five day discount from database into javascript
var tenDayDiscount = <?php echo $tenDayDiscount;?>;
//Passes ten day discount from database into javascript
</script>
</body>
</html>