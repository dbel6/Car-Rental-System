<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
    
</body>
</html>
<?php
include 'menu.php';
session_start();
    //Name Of Screen: DeleteCarType.php
    //Purpose Of Screen: deletes a car type from the datavase
    //Student ID: C00310562
    //Name: Conor Shiel
    //Date (month/year): 02/26

    //Notes Used: PHP6 Web Dev



include 'db.inc.php';


date_default_timezone_set('UTC');

    $sql = "DELETE FROM CarType WHERE CarTypeID = '$_POST[delid]' ";



    if (! mysqli_query($con,$sql))
    {
            $_SESSION['CarTypeID'] = $_POST['delid'];
    }

    else
    {
        echo "Record Deleted";
    }

        mysqli_close($con);
?>

<form action = "DeleteCarType.html.php" method = "post">
    <input type = "submit" value = "Return to Deletepage">
</form>