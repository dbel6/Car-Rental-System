<!--
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				5/3/2026
    Purpose : 			To complete listbox part of Delete Company screen
-->

<?php
include 'db.inc.php';
//database connection

$sql = "SELECT CompanyId, Name, Address, Phone, Website, Email, CreditLimit, AmountOwed, TotalRentals, BlacklistFlag, NumTimesBlacklisted 
FROM Company 
WHERE DeletedFlag = 0";
//Retreives all valid companies from the Company database

if (!$result = mysqli_query($con, $sql))
//Checks if theres an error in the sql
{
    die('Error in querying the database' . mysqli_error($con));
    //Outputs an error message if theres an error in the sql
}

echo "<br><select name='DeleteCarCompany' id='listbox' onclick='populate()'>";
//Outputs a dropdown box where user can select company which retrieves their details when selected

while ($row = mysqli_fetch_array($result))
//Goes through each row
{
    $id = $row['CompanyId'];
    //Puts the inputted id into an id variable
    $name = $row['Name'];
    //Puts the inputted name into a name variable
    $address = $row['Address'];
    //Puts the inputted address into an address variable
    $phone = $row['Phone'];
    //Puts the inputted phone number into a phone variable
    $website = $row['Website'];
    //Puts the inputted website into a website variable
    $email = $row['Email'];
    //Puts the inputted email address into an email variable
    $creditLimit = $row['CreditLimit'];
    //Puts the inputted credit limit into a credit limit variable
    $amountOwed = $row['AmountOwed'];
    //Puts the inputted amount owed into an amount owed variable
    $totalRentals = $row['TotalRentals'];
    //Puts the inputted total rentals into a total rentals variable
    $blacklistFlag = $row['BlacklistFlag'];
    //Puts the inputted blacklist flag into a blacklist flag variable
    $numTimesBlacklisted = $row['NumTimesBlacklisted'];
    //Puts the inputted number of times blacklisted into a number of times blacklisted variable
    $allText = "$id,$name,$address,$phone,$website,$email,$creditLimit,$amountOwed,$totalRentals,$blacklistFlag,$numTimesBlacklisted";
    //Puts all details into one variable
    echo "<option value='$allText'>$name</option>";
    //Displays an option with the company name and the value of all details for that company
}

echo "</select>";
//Closes the dropdown box
mysqli_close($con);
//Closes the sql database
?>