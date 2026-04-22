<?php 
include 'menu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amend/View Car Type</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>

<body>
<!--Headings -->
<h1>Amend/View a Car Type</h1>
<h4>Please select a car type and then click the amend button if you wish to update</h4>


<?php 
    //Name Of Screen: AmendViewCarType.html.php
    //Purpose Of Screen: Lets user view and update the database online
    //Student ID: C00310562
    //Name: Conor Shiel
    //Date (month/year): 02/26

    //Notes Used: PHP5 Web Dev

include 'listbox.php'; 

?>
<!--Javascript functions -->
<script>
    //function to populate the list box options with valid text from the table
    function populate()
    {
        var sel = document.getElementById("listbox");
        var result;
        result = sel.options[sel.selectedIndex].value;
        var studentDetails = result.split(',');
        //document.getElementById("display").innerHTML = "The details of the selected car type are " + result;

        document.getElementById("amendCarTypeID").value = studentDetails[0];
        document.getElementById("amendModelName").value = studentDetails[1];
        document.getElementById("amendCarVersion").value = studentDetails[2];
        document.getElementById("amendEngineSize").value = studentDetails[3];
        document.getElementById("amendFuelType").value = studentDetails[4];
        document.getElementById("amendManufacturer").value = studentDetails[5];
        document.getElementById("amendRentalCategory").value = studentDetails[6];
        document.getElementById("amendDeletedFlag").value = studentDetails[7];
        document.getElementById("amendPurchasePrice").value = studentDetails[8];
    }

    //function to toggle user access to input fields
    function toggleLock()
    {
        
        if(document.getElementById("amendViewbutton").value == "Amend Details")
        {
            document.getElementById("amendModelName").disabled = false;
            document.getElementById("amendCarVersion").disabled = false;
            document.getElementById("amendEngineSize").disabled = false;
            document.getElementById("amendFuelType").disabled = false;
            document.getElementById("amendManufacturer").disabled = false;
            document.getElementById("amendRentalCategory").disabled = false;
            document.getElementById("amendDeletedFlag").disabled = false;         
            document.getElementById("amendPurchasePrice").disabled = false;  

            document.getElementById("amendViewbutton").value = "View Details";
        }
        else
        {
            document.getElementById("amendModelName").disabled = true;
            document.getElementById("amendCarVersion").disabled = true;
            document.getElementById("amendEngineSize").disabled = true;
            document.getElementById("amendFuelType").disabled = true;
            document.getElementById("amendManufacturer").disabled = true;
            document.getElementById("amendRentalCategory").disabled = true;
            document.getElementById("amendDeletedFlag").disabled = true;         
            document.getElementById("amendPurchasePrice").disabled = true;  

            document.getElementById("amendViewbutton").value = "Amend Details";
        }
    }

    //function to make a "are you sure" pop up
    function confirmCheck()
    {
        var response
        response = confirm('Are you sure you want to save these changes?');
        if(response)
        {
            document.getElementById("amendCarTypeID").disabled = false;
            document.getElementById("amendModelName").disabled = false;
            document.getElementById("amendCarVersion").disabled = false;
            document.getElementById("amendEngineSize").disabled = false;
            document.getElementById("amendFuelType").disabled = false;
            document.getElementById("amendManufacturer").disabled = false;
            document.getElementById("amendRentalCategory").disabled = false;
            document.getElementById("amendDeletedFlag").disabled = false;         
            document.getElementById("amendPurchasePrice").disabled = false; 
            return true;
        }
        
        else
        {
            populate();
            toggleLock();
            return false;
        }
    }
</script>

<p id="display"></p>
<input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()" class = button>

<!-- Form with same fields and input restrictions as in Add screen--> 
<form name="myForm" action="AmendViewCarType.php" onsubmit="return confirmCheck()" method="post" class = "form">

    <label for="amendCarTypeID">Car Type ID </label>
    <input type="text" name="amendCarTypeID" id="amendCarTypeID" disabled>

    <label for="amendModelName">Model Name </label>
    <input type="text" name="amendModelName" id="amendModelName" disabled minlength="2" maxlength="40" pattern="^[a-zA-Z0-9\s'-]{2,40}$" >

    <label for="amendCarVersion">Car Version </label>
    <input type="text" name="amendCarVersion" id="amendCarVersion" disabled minlength="2" maxlength="40" pattern="^[a-zA-Z0-9\s'-]{2,40}$">

    <label for="amendEngineSize">Engine Size </label>
    <input type="text" name="amendEngineSize" id="amendEngineSize" disabled minlength="2" maxlength="10" pattern="^[a-zA-Z0-9.\s]{1,10}$">

    <label for="amendFuelType">Fuel Type </label>
            <!--Dropdown Options -->
        <select name="amendFuelType" id="amendFuelType" required disabled>
        <option value="Petrol">Petrol</option>
        <option value="Diesel">Diesel</option>
        <option value="Ethanol">Ethanol</option>
        <option value="Petrol/Ethanol">Petrol/Ethanol</option>
        <option value="HVO">HVO</option>
        <option value="Diesel/HVO">Diesel/HVO</option>
        <option value="Electric">Electric</option>
        <option value="Plug In Hybrid Petrol">Plug in Hybrid Petrol</option>
        <option value="Plug In Hybrid Diesel">Plug in Hybrid Diesel</option>
</select>

    <label for="amendManufacturer">Manufacturer </label>
    <input type="text" name="amendManufacturer" id="amendManufacturer" disabled minlength="2" maxlength="50" pattern="^[a-zA-Z0-9\s'-]{2,50}$">

    <label for="amendRentalCategory">Rental Category </label>
            <!--Dropdown options -->
        <select name="amendRentalCategory" id="amendRentalCategory" disabled>
        <option value="">-- Select --</option>
        <option value="R">R</option>
        <option value="S">S</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="Eco">Eco</option>


        </select>


    <label for="amendDeletedFlag">Deleted Flag </label>
        <select name="amendDeletedFlag" id="amendDeletedFlag" disabled>
        <option value="0">Not Deleted (0)</option>
        <option value="1">Deleted (1)</option>
</select>

    <label for="amendPurchasePrice">Purchase Price </label>
    <input type="text" name="amendPurchasePrice" id="amendPurchasePrice" minlength="2" maxlength="15" disabled>

    <br><br>
    <input type="submit" value="Save Changes">

</form>


</body>
</html>