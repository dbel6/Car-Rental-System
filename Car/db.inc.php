<!-- Project Database Connection -->
    <?php
    $hostname = "localhost";        //name of host or ip address
    $username = "CarRentalThree";    //MySQL username
    $password = "CarRentalThr33";      //MySQL Password

    $dbname = "CarRental3";      //database name

    //Creates the connection that connects to the MySQL Databse
    $con = mysqli_connect($hostname,$username,$password,$dbname);

    //checks to see if the connect was successful
    if(!$con)
    {
        //displays text if fails
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
    ?>