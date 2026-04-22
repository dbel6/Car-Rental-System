<?php
session_start();
    //Name Of Screen: DeleteCarType.php
    //Purpose Of Screen: Allows user to delete a car type from the datavase
    //Student ID: C00310562
    //Name: Conor Shiel
    //Date (month/year): 02/26

    //Notes Used: PHP6 Web Dev
include 'menu.php';
?>


<html>
<head>
    <title>Delete Car Type</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>


<h1>Delete a Car Type</h1>
<h4>Please select a car type and then click the delete button</h4>
<?php include 'listbox.php'; 

?>

<script>

function populate()
{
var sel = document.getElementById("listbox");
var result;
result = sel.options[sel.selectedIndex].value;
var carDetails = result.split(',');
    document.getElementById("display").innerHTML = "The details of the selected person are " + result;

    document.getElementById("delid").value = carDetails[0];
    document.getElementById("delModelName").value = carDetails[1];
    document.getElementById("delCarVersion").value = carDetails[2];
    document.getElementById("delEngineSize").value = carDetails[3];
    document.getElementById("delFuelType").value = carDetails[4];
    document.getElementById("delManufacturer").value = carDetails[5];
    document.getElementById("delRentalCategory").value = carDetails[6];
    document.getElementById("delDeletedFlag").value = carDetails[7];
    document.getElementById("delPurchasePrice").value = carDetails[8];   
}

function confirmCheck()
{
var response;
response = confirm('Are you sure you want to delete this car type?');
if (response)
{
    document.getElementById("delid").disabled = false;
    return true;
}
else
{
populate();
return false;
}
}
</script>

<form name="deleteForm" action="DeleteCarType.php" onsubmit="return confirmCheck()" method="post" class = "form">

    <label for="delid">Car Type ID </label>
    <input type="text" name="delid" id="delid" disabled>

    <label for="delModelName">Model Name </label>
    <input type="text" name="delModelName" id="delModelName" disabled>

    <label for="delCarVersion">Car Version </label>
    <input type="text" name="delCarVersion" id="delCarVersion" disabled>

    <label for="delEngineSize">Engine Size </label>
    <input type="text" name="delEngineSize" id="delEngineSize" disabled>

    <label for="delFuelType">Fuel Type </label>
    <input type="text" name="delFuelType" id="delFuelType" disabled>

    <label for="delManufacturer">Manufacturer </label>
    <input type="text" name="delManufacturer" id="delManufacturer" disabled>

    <label for="delRentalCategory">Rental Category </label>
    <input type="text" name="delRentalCategory" id="delRentalCategory" disabled>

    <label for="delDeletedFlag">Deleted Flag </label>
    <input type="text" name="delDeletedFlag" id="delDeletedFlag" disabled>

    <label for="delPurchasePrice">Purchase Price </label>
    <input type="text" name="delPurchasePrice" id="delPurchasePrice" disabled>
    <br><br>
    <input type = "submit" value = "Delete Record">
</form>

<form>
<?php
if (isset($_SESSION['CarTypeID'])) 
{ 
echo "<h1 class='myMessage'>Record deleted. </h1>"; 
session_destroy();
}
?>

</form>

<p id="display"> </p>

</body>
</html>