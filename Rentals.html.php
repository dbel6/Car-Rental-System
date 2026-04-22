<!--
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				9/3/2026
    Purpose : 			To complete company input part of Rentals screen
-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <!--Link to css file which styles the form for better presentation-->
    <title>Rentals</title>
    <!--Title of page-->
    <script src="CompanyRentals.js"></script>
    <!--Script used to embed Javascript-->
</head>
<body>

<?php
include 'menu.php';
//menu connection
?>

<div class="title">
<h1>Rentals</h1>
<!--Rentals title-->
<h4>Please select a company to rent</h4>
<!--Instructs user what to do in h4 text-->
</div>

<div id="display"></div>
<!--Displays the details of the company selected from the listbox-->

<form name="myForm" action="Rentals.php" onsubmit="return listboxCheck() && confirmCheck()" method="post">
<!--Form called myForm which returns the information from method confirmCheck displaying the inputted details with method post to collect information-->
<!--Input gets sent to functions which checks if the user selected a company from the listbox and if the user wants to confirm submission and returns true or false depending on input-->

<?php
include 'RentalsListbox.php';
//listbox connection
?>

<input type="button" value="Add New Company" onclick = "window.location.href='AddNewCarCompany.html.php'"/>
<!--Button where the user can add new car company-->

<br><br><br>

<input type="hidden" id="CompanyId" name="CompanyId">
<!--company ID hidden box-->

<label for="Name">Name</label>
<!--Name title-->
<br>
<input type="text" id="Name" name="Name" disabled>
<!--Name text box-->
<!--Disabled attribute disables the input field-->
<br><br>

<label for="Address">Address</label>
<!--Address title-->
<br>
<textarea rows="4" cols="35" id="Address" name="Address" disabled></textarea>
<!--Address text area box-->
<!--Disabled attribute disables the input field-->
<br><br><br><br><br>
<!--5 line breaks for space-->

<label for="AmountOwed">Amount Owed</label>
<!--Amount owed title-->
<br>
<input type="number" id="AmountOwed" name="AmountOwed" disabled>
<!--Amount owed number box-->
<!--Disabled attribute disables the input field-->
<br><br>

<label for="CreditLimit">Credit Limit</label>
<!--Credit Limit title-->
<br>
<input type="number" id="CreditLimit" name="CreditLimit" disabled>
<!--Credit Limit number box-->
<!--Disabled attribute disables the input field-->
<br><br>

<div class="fullsubmit">
<!--Ensures submit button covers full width of page-->
<input type="submit" value="Save Changes">
<!--Submit button where user can save all changes-->
</div>
</form>
</body>
</html>