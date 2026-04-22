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
    //Purpose Of Screen: Modifies the database
    //Student ID: C00310562
    //Name: Conor Shiel
    //Date (month/year): 02/26

    //Notes Used: PHP5 Web Dev

include 'db.inc.php';
include 'menu.php';

date_default_timezone_set('UTC');

    $sql = "UPDATE CarType SET ModelName = '$_POST[amendModelName]',
            CarVersion = '$_POST[amendCarVersion]',
            EngineSize = '$_POST[amendEngineSize]',
            FuelType = '$_POST[amendFuelType]',
            Manufacturer = '$_POST[amendManufacturer]',
            RentalCategory = '$_POST[amendRentalCategory]',
            DeletedFlag = '$_POST[amendDeletedFlag]',
            PurchasePrice = '$_POST[amendPurchasePrice]'
            WHERE CarTypeID = '$_POST[amendCarTypeID]' ";



    if (! mysqli_query($con,$sql))
    {
        echo "Error " . mysqli_error($con);
    }

    else
    {
        if(mysqli_affected_rows($con) != 0)
        {
            echo " record(s) updated <br>";
        }
        else
        {
            echo "No records were changed";
        }
    
    }

        mysqli_close($con);
?>


<form action = "AmendViewCarType.html.php" method = "post">
    <input type = "submit" value = "Return to Amend/View page">
</form>