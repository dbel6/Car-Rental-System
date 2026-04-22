<!--
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				5/3/2026
    Purpose : 			To complete php part of Delete Company screen
-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <!--Link to css file which styles the form for better presentation-->
    <title>Delete Company</title>
    <!--Title of page-->
</head>
<body>

<?php
session_start();
//start php session

include 'menu.php';
//menu connection
include 'db.inc.php';
//database connection

$sql = "UPDATE Company 
SET DeletedFlag = true 
WHERE CompanyId='$_POST[delid]'";
//Deletes record by setting the flag to true

echo "<form action='DeleteCarCompany.html.php' method='POST'>";
//Form to display the details being submitted

echo "<div class='title'>The details sent down are:</div><br><br>";
//Outputs submitted details

echo "Name is : <br>";
//Name title

echo "<input type='text' value='" . $_POST['delname'] . "' disabled><br><br>";
//Outputs the inputted name

echo "Address is : <br>";
//Address title

echo "<textarea rows='4' cols='35' disabled>" . $_POST['deladdress'] . "</textarea><br><br><br><br><br>";
//Outputs the inputted address

echo "Phone is : <br>";
//Phone number title

echo "<input type='tel' value='" . $_POST['delphone'] . "' disabled><br><br>";
//Outputs the inputted phone number

echo "Website is : <br>";
//Website title

echo "<input type='text' value='" . $_POST['delwebsite'] . "' disabled><br><br>";
//Outputs the inputted website

echo "Email is : <br>";
//Email title

echo "<input type='email' value='" . $_POST['delemail'] . "' disabled><br><br>";
//Outputs the inputted email

echo "Credit Limit is : <br>";
//Credit limit title

echo "<input type='number' value='" . $_POST['delcl'] . "' disabled><br><br>";
//Outputs the inputted credit limit

echo "Amount Owed is : <br>";
//Amount owed title

echo "<input type='number' value='" . $_POST['delamountowed'] . "' disabled><br><br>";
//Outputs the amount owed

echo "Total Rentals is : <br>";
//Total rentals title

echo "<input type='number' value='" . $_POST['deltotalrentals'] . "' disabled><br><br>";
//Outputs the total rentals

echo "Blacklist Flag is : <br>";
//Blacklist flag title

echo "<input type='text' value='" . $_POST['delblacklistflag'] . "' disabled><br><br>";
//Outputs the blacklist flag

echo "No. times blacklisted is : <br>";
//Number of times blacklisted title

echo "<input type='number' value='" . $_POST['delnumtimesblacklisted'] . "' disabled><br><br>";
//Outputs the number of times blacklisted

if (!mysqli_query($con, $sql))
//Checks if theres an error in the sql
{
    echo ("Error: " . mysqli_error($con));
    //Outputs an error message if theres an error in the sql
}

$_SESSION["CompanyId"] = $_POST['delid'];
$_SESSION["Name"] = $_POST['delname'];
//Set session variables to retrieve info about variables

if (ISSET($_SESSION["CompanyId"]))
//Outputs a message if company gets deleted
{
    echo "<div class='title'>Company deleted for " . $_SESSION["Name"] . "</div>";
    //Displays that the company deleted for the deleted companys name
}
session_destroy();
//end php session
mysqli_close($con);
//Closes the sql database
?>
<br><br>
<div class="fullsubmit">
<!--Ensures submit button covers full width of page-->
<input type="submit" value="Return to Previous Screen">
<!--Submit button where user can return to previous screen-->
</div>
</form>
</body>
</html>