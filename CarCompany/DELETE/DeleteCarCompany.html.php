<!--
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				5/3/2026
    Purpose : 			To complete html php part of Delete Company screen
-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <!--Link to css file which styles the form for better presentation-->
    <title>Delete Company</title>
    <!--Title of page-->
    <script src="DeleteCarCompany.js"></script>
    <!--Script used to embed Javascript-->
</head>
<body>

<?php
include 'menu.php';
//menu connection
?>

<div class="title">
<h1>Delete a Company</h1>
<!--Delete Company title-->
<h4>Please select a company and then click the delete button</h4>
<!--Instructs user what to do in h4 text -->
</div>

<div id="display"></div>
<!--Displays the details of the company selected from the listbox-->

<form name="deleteForm" action="DeleteCarCompany.php" onsubmit="return listboxCheck() && deleteCheck() && confirmCheck()" method="post">
<!--Form where user can input information which gets processed through a php file with method post to collect information-->
<!--Input gets sent to functions which checks if the user selected a company from the listbox, if the company selected matches a certain criteria for deletion and if the user wants to confirm submission and returns true or false depending on input-->

<?php
include 'DeleteCarCompanyListbox.php';
//listbox connection
?>
<br><br><br>

<input type="hidden" id="delid" name="delid">
<!--ID hidden box-->

<label for="delname">Name</label>
<!--Name title-->
<br>
<input type="text" id="delname" name="delname" disabled>
<!--Name text box-->
<!--Disabled attribute disables the input field-->
<br><br>

<label for="deladdress">Address</label>
<!--Address title-->
<br>
<textarea rows="4" cols="35" id="deladdress" name="deladdress" disabled></textarea>
<!--Address text area box-->
<!--Disabled attribute disables the input field-->
<br><br><br><br><br>
<!--5 line breaks for space-->

<label for="delphone">Phone Number</label>
<!--Phone number title-->
<br>
<input type="tel" id="delphone" name="delphone" disabled>
<!--Phone telephone box-->
<!--Disabled attribute disables the input field-->
<br><br>

<label for="delwebsite">Website</label>
<!--Website title-->
<br>
<input type="text" id="delwebsite" name="delwebsite" disabled>
<!--Website text box-->
<!--Disabled attribute disables the input field-->
<br><br>

<label for="delemail">Email Address</label>
<!--Email address title-->
<br>
<input type="email" id="delemail" name="delemail" disabled>
<!--Email email box-->
<!--Disabled attribute disables the input field-->
<br><br>

<label for="delcl">Credit Limit</label>
<!--Credit limit title-->
<br>
<input type="number" id="delcl" name="delcl" disabled>
<!--Credit limit number box-->
<!--Disabled attribute disables the input field-->
<br><br>

<label for="delamountowed">Amount Owed</label>
<!--Amount owed title-->
<br>
<input type="number" id="delamountowed" name="delamountowed" disabled>
<!--Amount owed number box-->
<!--Disabled attribute disables the input field-->
<br><br>

<input type="hidden" id="deltotalrentals" name="deltotalrentals">
<!--Total rentals hidden box-->

<label for="delblacklistflag">Blacklist Flag</label>
<!--Blacklist flag title-->
<br>
<input type="text" id="delblacklistflag" name="delblacklistflag" disabled>
<!--Blacklist flag number box-->
<!--Disabled attribute disables the input field-->
<br><br>

<label for="delnumtimesblacklisted">No. of Times Blacklisted</label>
<!--Number of times blacklisted title-->
<br>
<input type="number" id="delnumtimesblacklisted" name="delnumtimesblacklisted" disabled>
<!--Number of times blacklisted number box-->
<!--Disabled attribute disables the input field-->
<br><br>

<div class="fullsubmit">
<!--Ensures submit button covers full width of page-->
<input type="submit" value="Delete the record">
<!--Submit button where user can delete the record-->
</div>
</form>
</body>
</html>