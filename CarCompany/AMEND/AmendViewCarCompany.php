<!--
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				26/2/2026
    Purpose : 			To complete php part of Amend/View Company screen
-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <!--Link to css file which styles the form for better presentation-->
    <title>Amend/View Company</title>
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
SET Name='$_POST[amendname]', Address='$_POST[amendaddress]', Phone='$_POST[amendphone]', Website='$_POST[amendwebsite]', Email='$_POST[amendemail]', CreditLimit='$_POST[amendcl]' 
WHERE CompanyId='$_POST[amendid]'";
//Updates the company details for a specific company checked by the company id and updated into the Company database

echo "<form action='AmendViewCarCompany.html.php' method='POST'>";
//Form to display the details being submitted

echo "<div class='title'>The details sent down are:</div><br><br>";
//Outputs submitted details

echo "Name is : <br>";
//Name title

echo "<input type='text' value='" . $_POST['amendname'] . "' disabled><br><br>";
//Outputs the inputted name

echo "Address is : <br>";
//Address title

echo "<textarea rows='4' cols='35' disabled>" . $_POST['amendaddress'] . "</textarea><br><br><br><br><br>";
//Outputs the inputted address

echo "Phone is : <br>";
//Phone number title

echo "<input type='tel' value='" . $_POST['amendphone'] . "' disabled><br><br>";
//Outputs the inputted phone number

echo "Website is : <br>";
//Website title

echo "<input type='text' value='" . $_POST['amendwebsite'] . "' disabled><br><br>";
//Outputs the inputted website

echo "Email is : <br>";
//Email title

echo "<input type='email' value='" . $_POST['amendemail'] . "' disabled><br><br>";
//Outputs the inputted email

echo "Credit Limit is : <br>";
//Credit limit title

echo "<input type='number' value='" . $_POST['amendcl'] . "' disabled><br><br>";
//Outputs the inputted credit limit

echo "Amount Owed is : <br>";
//Amount owed title

echo "<input type='number' value='" . $_POST['amendamountowed'] . "' disabled><br><br>";
//Outputs the amount owed

echo "Total Rentals is : <br>";
//Total rentals title

echo "<input type='number' value='" . $_POST['amendtotalrentals'] . "' disabled><br><br>";
//Outputs the total rentals

echo "Blacklist Flag is : <br>";
//Blacklist flag title

echo "<input type='text' value='" . $_POST['amendblacklistflag'] . "' disabled><br><br>";
//Outputs the blacklist flag

echo "No. times blacklisted is : <br>";
//Number of times blacklisted title

echo "<input type='number' value='" . $_POST['amendnumtimesblacklisted'] . "' disabled><br><br>";
//Outputs the number of times blacklisted

echo "</div>";

if (!mysqli_query($con,$sql))
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
        echo "<div class='title'>" . mysqli_affected_rows($con) . " record(s) updated <br>";
        //Outputs message stating the amount of records updated
        echo "Company ID " . $_POST['amendid'] . ", " . $_POST['amendname'] . " has been updated</div>";
        //Displays the details of the company record who has been updated
    }
    else
    //Runs if no records were updated
    {
        echo "<div class='title'>No records were changed</div>";
        //Outputs message stating that no records were updated
    }
}

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