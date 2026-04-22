<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
    
</body>
</html>

<?php 
    //Name Of Screen: AddNewCarType.php
    //Purpose Of Screen: Accesses the html file AddNewCarType to put the data into the database
    //Student ID: C00310562
    //Name: Conor Shiel
    //Date (month/year): 02/26

    //Notes Used: PHP3 Web Dev

    include 'db.inc.php';
    include 'menu.php';

    date_default_timezone_set("UTC");

    $sql = "INSERT INTO CarType (ModelName,CarVersion,EngineSize,FuelType,Manufacturer
    ,RentalCategory,DeletedFlag,PurchasePrice) 
    VALUES
    ('$_POST[modelName]','$_POST[version]','$_POST[engineSize]','$_POST[fuelType]','$_POST[manufacturer]',
    '$_POST[rentalCategory]','$_POST[deletedFlag]','$_POST[purchasePrice]')";

    if(!mysqli_query($con, $sql))
    {
        die ("Query Error: " . mysqli_error($sql));
    }
    echo "Record added successfuly";

    mysqli_close($con);

?>

<form action = "AddNewCarType.html" method = "POST">
    <input type = "submit" value = "Return to Insert Page"/>

</form>