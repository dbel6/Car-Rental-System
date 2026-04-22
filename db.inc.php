<!--
    Student Name : 		Dara Loughnane
    Student Id Number : CO0306835
    Purpose : 			To create connection to the database
-->

<?php
/*Creates a space allowing for calculating user input*/
$hostname = "localhost";
//Name of host or ip address
$username = "CarRentalThree";
//MySQL username
$password = "CarRentalThr33";
//MySQL password

$dbname = "CarRental3";
//database name

$con = mysqli_connect($hostname, $username, $password, $dbname);
//Connects to the database by sending hostname, username, password and database name

if (!$con)
//Outputs a message if database failed to connect
{
    die ("Failed to connect to MySQL: " . mysqli_connect_error());
    //Outputs a message saying the MySQL failed to be connected to and sets status to error
}
?>