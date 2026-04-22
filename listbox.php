<?php
include "db.inc.php";
date_default_timezone_set('UTC');

//get sql data
$sql = "SELECT CarTypeID, ModelName, CarVersion, EngineSize, FuelType, Manufacturer, RentalCategory, DeletedFlag, PurchasePrice FROM CarType";

if(!$result = mysqli_query($con, $sql))
{
    die('error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>";

//display records for each car type
while ($row = mysqli_fetch_array($result))
{
    
    $id = $row['CarTypeID'];
    $modelName = $row['ModelName'];
    $carVersion = $row['CarVersion'];
    $engineSize = $row['EngineSize'];
    $fuelType = $row['FuelType'];
    $manufacturer = $row['Manufacturer'];
    $rentalCategory = $row['RentalCategory'];
    $deletedFlag = $row['DeletedFlag'];
    $purchasePrice = $row['PurchasePrice'];

    $allText = "$id,$modelName,$carVersion,$engineSize,$fuelType,$manufacturer,$rentalCategory,$deletedFlag,$purchasePrice";
    echo "<option value='$allText'>$modelName $carVersion</option>";
}

echo "</select>";
mysqli_close($con);

?>