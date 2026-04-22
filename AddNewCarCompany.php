<!--
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				12/2/2026
    Purpose : 			To complete php part of Add Company screen
-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <!--Link to css file which styles the form for better presentation-->
    <title>Add Company</title>
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

echo "<div class='form'>";

echo "<form action='AddNewCarCompany.html.php' method='POST'>";
//Form to display the details being submitted

echo "<div class='title'>The details sent down are:</div><br><br>";
//Outputs submitted details

echo "Name is : <br>";
//Name title

echo "<input type='text' value='" . $_POST['Name'] . "' disabled><br><br>";
//Outputs the inputted name

echo "Address is : <br>";
//Address title

echo "<textarea rows='4' cols='35' disabled>" . $_POST['Address'] . "</textarea><br><br><br><br><br>";
//Outputs the inputted address

echo "Phone is : <br>";
//Phone number title

echo "<input type='tel' value='" . $_POST['Phone'] . "' disabled><br><br>";
//Outputs the inputted phone number

echo "Website is : <br>";
//Website title

echo "<input type='text' value='" . $_POST['Website'] . "' disabled><br><br>";
//Outputs the inputted website

echo "Email is : <br>";
//Email title

echo "<input type='email' value='" . $_POST['Email'] . "' disabled><br><br>";
//Outputs the inputted email

echo "Credit Limit is : <br>";
//Credit limit title

echo "<input type='number' value='" . $_POST['CreditLimit'] . "' disabled><br><br>";
//Outputs the inputted credit limit

echo "Amount Owed is : <br>";
//Amount owed title

echo "<input type='number' value='" . 0 . "' disabled><br><br>";
//Outputs the amount owed

echo "Total Rentals is : <br>";
//Total rentals title

echo "<input type='number' value='" . 0 . "' disabled><br><br>";
//Outputs the total rentals

echo "Blacklist Flag is : <br>";
//Blacklist flag title

echo "<input type='text' value='" . 'N' . "' disabled><br><br>";
//Outputs the blacklist flag

echo "No. times blacklisted is : <br>";
//Number of times blacklisted title

echo "<input type='number' value='" . 0 . "' disabled><br><br>";
//Outputs the number of times blacklisted

$sql = "INSERT INTO Company 
(Name,Address,Phone,Website,Email,CreditLimit,AmountOwed,TotalRentals,BlacklistFlag,NumTimesBlacklisted) 
VALUES ('$_POST[Name]','$_POST[Address]','$_POST[Phone]','$_POST[Website]','$_POST[Email]','$_POST[CreditLimit]', 0, 0, 'N', 0)";
//Inserts the new company details into the Company database

if (!mysqli_query($con,$sql))
//Checks if theres an error in the sql
{
    die ("An Error in the SQL Query: " . mysqli_error($con));
    //Outputs an error message if theres an error in the sql
}
echo "<div class='title'>A company has been added for " . $_POST['Name'];
//Outputs a message confirming the company has been added for the inputted name

echo "<br>The new company id for " . $_POST['Name'] . " is " . mysqli_insert_id($con) . "</div>";
//Outputs the newly assigned company id

mysqli_close($con);
//Closes the sql database

?>
<br><br>
<input type="submit" value="Return to Add Company Page"/>
<!--Submit button where user can return to the add company screen-->
<input type="button" value="Proceed to Rentals" onclick = "window.location.href='Rentals.html.php'"/>
<!--Button where the user can proceed to rentals screen-->
</form>
</div>
</body>
</html>