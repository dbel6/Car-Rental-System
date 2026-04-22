<!--
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				9/3/2026
    Purpose : 			To complete listbox part of Rentals screen
-->

<?php
include 'db.inc.php';
//database connection

$sql = "SELECT CompanyId, Name, Address, AmountOwed, CreditLimit 
FROM Company
WHERE DeletedFlag = 0";
//Retreives valid companies details from the Company database

if (!$result = mysqli_query($con, $sql))
//Checks if theres an error in the sql
{
    die('Error in querying the database' . mysqli_error($con));
    //Outputs an error message if theres an error in the sql
}

echo "<br><select name='Rentals' id='listbox' onclick='populate()'>";
//Outputs a dropdown box where user can select company which retrieves their details when selected

while ($row = mysqli_fetch_array($result))
//Goes through each row
{
    $id = $row['CompanyId'];  
    //Puts the company ID into a company ID variable
    $name = $row['Name'];
    //Puts the inputted name into a name variable
    $address = $row['Address'];
    //Puts the inputted address into an address variable
    $amountOwed = $row['AmountOwed'];
    //Puts the inputted amount owed into an amount owed variable
    $creditLimit = $row['CreditLimit'];
    //Puts the inputted credit limit into a credit limit variable
    $allText = "$id,$name,$address,$amountOwed,$creditLimit";
    //Puts all details into one variable
    $_SESSION['CompanyId'] = $row['CompanyId'];
    //Puts the company ID into a session variable
    echo "<option value='$allText'>$name</option>";
    //Displays an option with the company name and the value of details for that company
}

echo "</select>";
//Closes the dropdown box
mysqli_close($con);
//Closes the sql database
?>