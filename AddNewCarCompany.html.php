<!--
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				12/2/2026
    Purpose : 			To complete html php part of Add Company screen
-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <!--Link to css file which styles the form for better presentation-->
    <title>Add Company</title>
    <!--Title of page-->
    <script src="AddNewCarCompany.js"></script>
    <!--Script used to embed Javascript-->
</head>
<body>

<?php
include 'menu.php';
//menu connection
?>

<div class="title">
<h1>Add Company</h1>
<!--Add Company title-->
</div>
    
<form action="AddNewCarCompany.php" method="post" onsubmit="return confirmCheck()" >
<!--Form where user can input information which gets processed through a php file with method post to collect information-->
<!--Input gets sent to a function which ensures if the user wants to confirm submission and returns true or false-->

<label for="Name">Name</label>
<!--Name title-->
<br>
<input type="text" name="Name" id="Name" placeholder="e.g. EasyCar" autocomplete="off" pattern="[A-Za-z\s\-]+" minlength="2" maxlength="15" title="Name must only contain either alphabetic characters, spaces or dashes" required/>
<!--Name text box-->
<!--This pattern ensures only alphabetic characters, spaces or dashes are inputted ensuring a valid company name-->
<br><br>

<label for="Address">Address</label>
<!--Address title-->
<br>
<textarea rows="4" cols="35" name="Address" id="Address" oninput="return addressCheck()" placeholder="e.g. 12 Fairgreen View,
Portlaoise,
Co. Laois,
Ireland"
minlength="15" maxlength="70" title="Address must only contain alphabetic characters, numbers, commas, dots and spaces" required></textarea>
<!--Address text area box-->
<br><br><br><br><br>
<!--5 line breaks for space-->

<label for="Phone">Phone Number</label>
<!--Phone number title-->
<br>
<input type="tel" name="Phone" id="Phone" placeholder="e.g. 0851234567" pattern="[0-9]{10}" minlength="10" maxlength="10" title="Phone number must only contain 10 digits, no spaces, dashes, etc" required/>
<!--Phone telephone box-->
<!--This pattern ensures only 10 digits are inputted ensuring a valid phone number-->
<br><br>

<label for="Website">Website</label>
<!--Website title-->
<br>
<input type="text" name="Website" id="Website" placeholder="e.g. www.website.ie" pattern="[w]{3}[.][a-z0-9]+[.]{1}[a-z]+" minlength="8" maxlength="20" title="Website must be a valid url in lowercase" required/>
<!--Website text box-->
<!--This pattern ensures www. is followed by letters or numbers followed by dot followed by letters ensuring a valid url-->
<br><br>

<label for="Email">Email Address</label>
<!--Email address title-->
<br>
<input type="email" name="Email" id="Email" placeholder="e.g. email78@email.ie" pattern="[a-z0-9]+[@][a-z]+[.][a-z]+" minlength="5" maxlength="30" title="Email must be a valid email address in lowercase" required/>
<!--Email email box-->
<!--This pattern ensures alphabetic characters or digits is followed by at symbol followed by alphabetic characters followed by dot followed by alphabetic characters ensuring valid email-->
<br><br>

<label for="CreditLimit">Credit Limit</label>
<!--Credit limit title-->
<br>
<input type="number" name="CreditLimit" id="CreditLimit" placeholder="e.g. 1234" min="0" max="9999" value="1000" title="Credit limit must only contain up to 4 digits" required/>
<!--Credit limit number box-->
<!--This value is the default credit limit-->
<br><br>

<input type="submit" value="Submit"/>
<!--Submit button where user can submit all information provided-->
<input type="reset" value="Clear"/>
<!--Reset button where user can clear all information provided-->
</form>
</body>
</html>