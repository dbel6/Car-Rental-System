<?php
    //Name Of File: db.inc.php
    //Purpose Of File: Easy connection to the database
    //Student ID: C00310562
    //Name: Conor Shiel
    //Date (month/year): 02/26
    //Notes Used: PHP3 Web Dev

$hostname = "localhost:3306";
$username = "CarRentalThree";
$password = "CarRentalThr33";

$dbname = "CarRental3";


$con = mysqli_connect($hostname,$username,$password,$dbname);

if(!$con)
    {
        die ("Connection Failed" . mysqli_connect_error());
    }


?>
