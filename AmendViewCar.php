<!--Tadhg Brennan
    C00308963
    09/03/2026
    Amend/View Car - Car Rental Project Screen -->

    <?php

// Include the database connection file
include 'db.inc.php';

// Set timezone for correct date handling
date_default_timezone_set('UTC');

// Convert the date entered by the user into the format used by the database
$dbDate = date("Y-m-d", strtotime($_POST['amendDateAdded']));

// SQL statement to update the selected car's details
$sql = "UPDATE Car SET 
        RegistrationNumber = '$_POST[amendRegistrationNum]',
        CarTypeID = '$_POST[amendCarType]',
        Colour = '$_POST[amendColour]',
        ChassisNumber = '$_POST[amendChassisNum]',
        BodyStyle = '$_POST[amendBodyStyle]',
        NumberOfDoors = '$_POST[amendNumOfDoors]',
        PurchasePrice = '$_POST[amendPurchasePrice]',
        DateAddedToFleet = '$dbDate' WHERE CarId = '$_POST[amendid]' ";

// Execute the query and check for errors
if (!mysqli_query($con,$sql ))
{
    echo "Error " . mysqli_error($con);
}
else
{
    // Check if any records were actually updated
    if (mysqli_affected_rows($con) != 0)
    {
        echo mysqli_affected_rows($con) . " record(s) updated <br>";
        echo "Car Id " . $_POST['amendid'] . ", with Registration of " . $_POST['amendRegistrationNum']
         . " has been updated";
    }
    else
    {
        // Runs if the update made no changes
        echo "No records were changed";
    }
}

// Close the database connection
mysqli_close($con);

?>

<!-- Form to return the user to the previous screen -->
<form action="AmendViewCar.html.php" method="post" >
<input type="submit" value="Return to Previous Screen">
</form>
