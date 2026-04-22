<!--
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				12/2/2026
    Purpose : 			To complete html php part of Amend/View Company screen
-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <!--Link to css file which styles the form for better presentation-->
    <title>Amend/View Company</title>
    <!--Title of page-->
    <script src="AmendViewCarCompany.js"></script>
    <!--Script used to embed Javascript-->
</head>
<body>

<?php
include 'menu.php';
//menu connection
?>

<div class="title">
<h1>Amend/View Company</h1>
<!--Amend/View Company title-->
<h4>Please select a company and then click the amend button if you wish to update</h4>
<!--Instructs user what to do in h4 text-->
</div>

<div id="display"></div>
<!--Displays the details of the company selected from the listbox-->

<form name="myForm" action="AmendViewCarCompany.php" onsubmit="return listboxCheck() && confirmCheck()" method="post">
<!--Form where user can input information which gets processed through a php file with method post to collect information-->
<!--Input gets sent to functions which checks if the user selected a company from the listbox and if the user wants to confirm submission and returns true or false depending on input-->

<?php
include 'AmendViewCarCompanyListbox.php';
//listbox connection
?>

<input type="button" value="Amend Details" id="amendViewbutton" onclick = "toggleLock()">
<!--Button which enables the user to change the details and when clicked changes to view user-->
<br><br><br>

<input type="hidden" id="amendid" name="amendid">
<!--ID hidden box-->

<label for="amendname">Name</label>
<!--Name title-->
<br>
<input type="text" id="amendname" name="amendname" placeholder="e.g. EasyCar" autocomplete="off" pattern="[A-Za-z\s\-]+" minlength="2" maxlength="15" title="Name must only contain either alphabetic characters, spaces or dashes" disabled>
<!--Name text box-->
<!--This pattern ensures only alphabetic characters, spaces or dashes are inputted ensuring a valid company name-->
<!--Disabled attribute disables the input field-->
<br><br>

<label for="amendaddress">Address</label>
<!--Address title-->
<br>
<textarea rows="4" cols="35" id="amendaddress" name="amendaddress" placeholder="e.g. 12 Fairgreen View,
Portlaoise,
Co. Laois,
Ireland"
minlength="15" maxlength="70" title="Address must only contain alphabetic characters, numbers, commas, dots and spaces" disabled></textarea>
<!--Address text area box-->
<!--Disabled attribute disables the input field-->
<br><br><br><br><br>
<!--5 line breaks for space-->

<label for="amendphone">Phone Number</label>
<!--Phone number title-->
<br>
<input type="tel" id="amendphone" name="amendphone" placeholder="e.g. 0851234567" pattern="[0-9]{10}" minlength="10" maxlength="10" title="Phone number must only contain 10 digits, no spaces, dashes, etc" disabled/>
<!--Phone telephone box-->
<!--This pattern ensures only 10 digits are inputted ensuring a valid phone number-->
<!--Disabled attribute disables the input field-->
<br><br>

<label for="amendwebsite">Website</label>
<!--Website title-->
<br>
<input type="text" id="amendwebsite" name="amendwebsite" placeholder="e.g. www.website.ie" pattern="[w]{3}[.][a-z0-9]+[.]{1}[a-z]+" minlength="8" maxlength="20" title="Website must be a valid url in lowercase" disabled>
<!--Website text box-->
<!--This pattern ensures www. is followed by letters or numbers followed by dot followed by letters ensuring a valid url-->
<!--Disabled attribute disables the input field-->
<br><br>

<label for="amendemail">Email Address</label>
<!--Email address title-->
<br>
<input type="email" id="amendemail" name="amendemail" placeholder="e.g. email78@email.ie" pattern="[a-z0-9]+[@][a-z]+[.][a-z]+" minlength="5" maxlength="30" title="Email must be a valid email address in lowercase" disabled/>
<!--Email email box-->
<!--This pattern ensures alphabetic characters or digits is followed by at symbol followed by alphabetic characters followed by dot followed by alphabetic characters ensuring valid email-->
<!--Disabled attribute disables the input field-->
<br><br>

<label for="amendcl">Credit Limit</label>
<!--Credit limit title-->
<br>
<input type="number" id="amendcl" name="amendcl" placeholder="e.g. 1234" min="0" max="9999" title="Credit limit must only contain digits" disabled>
<!--Credit limit number box-->
<!--Disabled attribute disables the input field-->
<br><br>

<label for="amendamountowed">Amount Owed</label>
<!--Amount owed title-->
<br>
<input type="number" id="amendamountowed" name="amendamountowed" disabled>
<!--Amount owed number box-->
<!--Disabled attribute disables the input field-->
<br><br>

<input type="hidden" id="amendtotalrentals" name="amendtotalrentals">
<!--Total rentals hidden box-->

<label for="amendblacklistflag">Blacklist Flag</label>
<!--Blacklist flag title-->
<br>
<input type="text" id="amendblacklistflag" name="amendblacklistflag" disabled>
<!--Blacklist flag text box-->
<!--Disabled attribute disables the input field-->
<br><br>

<label for="amendnumtimesblacklisted">No. of Times Blacklisted</label>
<!--Number of times blacklisted title-->
<br>
<input type="number" id="amendnumtimesblacklisted" name="amendnumtimesblacklisted" disabled>
<!--Number of times blacklisted number box-->
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