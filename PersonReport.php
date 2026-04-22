<!--
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				25/2/2026
    Purpose : 			To complete php part of lab 5 task 3
-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <!--Linked (external) style sheet with classes including form and input which styles the form for better presentation-->
</head>
<body>
    
    <?php
    //Creates a space allowing for calculating user input
    include 'menu.php';
    //menu connection
    include 'db.inc.php';
    //database connection
    date_default_timezone_set('UTC');
    //Gets the default date time
    ?>

    <form action="PersonReport.php" method="post" name="reportForm">
    <!--Creates a report form where user can input information which gets processed through a php file with method post to collect information-->
    <input type="hidden" name="choice">
    <!--Sets the choice to hidden-->

    <h1>Person Report</h1>
    <!--Title in h1 text-->
    <h3>(Click a button to see the Person Report in the desired order)</h3>
    <!--Instructs user what to do in h3 text -->
    
    <br><br>
    <!--Creates a double line break-->

    <?php
    /*Creates a space allowing for calculating user input*/
    $choice = "Surname";
    //In case this is the first time through and $_POST[choice] hasn't been set

    if (ISSET($_POST['choice']))
    //Checks if choice has been set
    {
        $choice = $_POST['choice'];
        //Stores selected option (DOB, surname or email) into choice variable
    }
    if ($choice == "DOB")
    //Checks if the date of birth option was selected
    {

    ?>

    <script>
    /*Allows us to create css, javascript, etc in html page*/
        document.getElementById("dateButton").disabled = true;
        //Enables date button from being used
        document.getElementById("nameButton").disabled = false;
        //Disables name button from being used
        document.getElementById("emailButton").disabled = false;
        //Disables email button from being used
    </script>
    
    <?php
    /*Creates a space allowing for calculating user input*/
        $sql = "SELECT * FROM Persons WHERE DeletedFlag = false ORDER BY DOB DESC";
        //Display all attributes from the Persons table who arent flagged for deletion and is ordered by date of birth in descending order
        produceReport($con,$sql);
        //produces final report
    }
    else if ($choice == "Email")
    //Checks if the email option was selected
    {
        
    ?>

    <?php
    /*Creates a space allowing for calculating user input*/
        $sql = "SELECT * FROM Persons WHERE DeletedFlag = false ORDER BY email ASC";
        //Display all attributes from the Persons table who arent flagged for deletion and is ordered by email in ascending order
        produceReport($con,$sql);
        //produces final report
    
    }
    else
    //Runs if the surname option was selected
    {
    ?>

    <?php
    /*Creates a space allowing for calculating user input*/
    $sql = "SELECT * FROM Persons WHERE DeletedFlag = false ORDER BY lastName";
    //Display all attributes from the Persons table where nothing is deleted and is ordered by lastname
    produceReport($con,$sql);
    //produces final report
    };

        function produceReport($con,$sql)
        //Displays the completed report
        {
            $result = mysqli_query($con,$sql);
            //Puts valid info into result

            echo "<table><tr><th>Registration Number</th><th>Model Name</th><th>Version</th><th>Engine Size</th><th>Fuel Type</th><th>Rental Category</th><th>Doors</th></tr>";
            //Displays a table including various details of the cars

            while ($row=mysqli_fetch_array($result))
            //Goes through each row
            {

                echo "<td>" . $row['RegistrationNumber']."</td>
                    <td>" . $row['ModelName']."</td>
                    <td>" . $row['CarVersion']."</td>
                    <td>" . $row['EngineSize']."</td>
                    <td>" . $row['FuelType']."</td>
                    <td>" . $row['RentalCategoryID']."</td>
                    <td>" . $row['NumberOfDoors']."</td>
                    </tr>";
                //Prints out various details available cars
                    
            }
            echo "</table>";
            //Ends table
        }
        mysqli_close($con);
        //Closes the sql database
    ?>
    </form>
</body>
</html>