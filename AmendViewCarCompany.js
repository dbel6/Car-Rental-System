/*
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				12/2/2026
    Purpose : 			To complete javascript part of Amend/View Company screen
*/

function populate()
//Lists current database details
{
    var sel = document.getElementById("listbox");
    //Variable which calls the listbox id when used
    var result;
    //Result variable
    result = sel.options[sel.selectedIndex].value;
    //Puts all the user details into result
    var personDetails = result.split(',');
    //Creates an array with individual details seperated by a comma
    document.getElementById("display").innerHTML = "The details of the selected company are: " + result;
    //Displays all the details of the company
    document.getElementById("amendid").value = personDetails[0];
    //Puts id value into array
    document.getElementById("amendname").value = personDetails[1];
    //Puts name value into array
    document.getElementById("amendaddress").value = personDetails[2];
    //Puts address value into array
    document.getElementById("amendphone").value = personDetails[3];
    //Puts phone value into array
    document.getElementById("amendwebsite").value = personDetails[4];
    //Puts website value into array
    document.getElementById("amendemail").value = personDetails[5];
    //Puts email value into array
    document.getElementById("amendcl").value = personDetails[6];
    //Puts credit limit value into array
    document.getElementById("amendamountowed").value = personDetails[7];
    //Puts amount owed value into array
    document.getElementById("amendtotalrentals").value = personDetails[8];
    //Puts total rentals value into array
    document.getElementById("amendblacklistflag").value = personDetails[8];
    //Puts blacklist flag value into array
    document.getElementById("amendnumtimesblacklisted").value = personDetails[9];
    //Puts number of times blacklisted value into array
}

function toggleLock()
//Called when button clicked. It removes the disabled attribute if "Amend Details" button clicked and enables the disabled attribute if "View Details" button clicked
{
    if (document.getElementById("amendViewbutton").value == "Amend Details")
    //Runs if Amend Details button is clicked
    {
        document.getElementById("amendname").disabled = false;
        //Removes the disabled attribute from name field allowing for amending
        document.getElementById("amendaddress").disabled = false;
        //Removes the disabled attribute from address field allowing for amending
        document.getElementById("amendphone").disabled = false;
        //Removes the disabled attribute from phone number field allowing for amending
        document.getElementById("amendwebsite").disabled = false;
        //Removes the disabled attribute from website field allowing for amending
        document.getElementById("amendemail").disabled = false;
        //Removes the disabled attribute from email address field allowing for amending
        document.getElementById("amendcl").disabled = false;
        //Removes the disabled attribute from credit limit field allowing for amending
        document.getElementById("amendViewbutton").value = "View Details";
        //Changes the button value to "View Details"

    }
    else
    //Runs if View Details button is clicked
    {
        document.getElementById("amendname").disabled = true;
        //Enables the disabled attribute from name field allowing for viewing
        document.getElementById("amendaddress").disabled = true;
        //Enables the disabled attribute from address field allowing for viewing
        document.getElementById("amendphone").disabled = true;
        //Enables the disabled attribute from phone number field allowing for viewing
        document.getElementById("amendwebsite").disabled = true;
        //Enables the disabled attribute from website field allowing for viewing
        document.getElementById("amendemail").disabled = true;
        //Enables the disabled attribute from email address field allowing for viewing
        document.getElementById("amendcl").disabled = true;
        //Enables the disabled attribute from credit limit field allowing for viewing
        document.getElementById("amendViewbutton").value = "Amend Details";
        //Changes the button value to "Amend Details"
    }
}

function listboxCheck()
//checks if a user selected a company from the listbox
{
    var sel = document.getElementById("listbox");
    //Variable which calls the listbox id when used

    if (sel.selectedIndex == 0)
    //Checks if user has selected a company from the listbox
    {
        alert("Please select a company from the listbox");
        //Displays error message if user didnt select a company from the listbox
        return false;
        //Returns value to not save changes
    }
    else
    {
        return true;
        //Returns value to save changes
    }   
}

function confirmCheck()
//Confirms if user wants to amend company
{
    var response;
    //Collects users response

    response = confirm("Are you sure you want to amend company?");
    //Displays confirmation message asking if the user wants to amend the company and saves response in response variable

    if (response)
    //Runs if user clicks ok
    {
        document.getElementById("amendname").disabled = false;
        //Removes the disabled attribute from name field allowing for amending
        document.getElementById("amendaddress").disabled = false;
        //Removes the disabled attribute from address field allowing for amending
        document.getElementById("amendphone").disabled = false;
        //Removes the disabled attribute from phone number field allowing for amending
        document.getElementById("amendwebsite").disabled = false;
        //Removes the disabled attribute from website field allowing for amending
        document.getElementById("amendemail").disabled = false;
        //Removes the disabled attribute from email address field allowing for amending
        document.getElementById("amendcl").disabled = false;
        //Removes the disabled attribute from credit limit field allowing for amending
        document.getElementById("amendamountowed").disabled = false;
        //Removes the disabled attribute from amount owed field allowing for amending
        document.getElementById("amendtotalrentals").disabled = false;
        //Removes the disabled attribute from total rentals field allowing for amending
        document.getElementById("amendblacklistflag").disabled = false;
        //Removes the disabled attribute from blacklist flag field allowing for amending
        document.getElementById("amendnumtimesblacklisted").disabled = false;
        //Removes the disabled attribute from number of times blacklisted field allowing for amending
        return true;
        //Returns value to save changes
    }
    else
    //Runs if user doesnt click ok
    {
        populate();
        //Displays all details of the user
        toggleLock();
        //Changes the amend button
        return false;
        //Returns value to not save changes
    }
}