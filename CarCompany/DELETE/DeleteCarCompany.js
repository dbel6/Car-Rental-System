/*
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				5/3/2026
    Purpose : 			To complete javascript part of Delete Company screen
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
    document.getElementById("delid").value = personDetails[0];
    //Puts id value into array
    document.getElementById("delname").value = personDetails[1];
    //Puts name value into array
    document.getElementById("deladdress").value = personDetails[2];
    //Puts address value into array
    document.getElementById("delphone").value = personDetails[3];
    //Puts phone value into array
    document.getElementById("delwebsite").value = personDetails[4];
    //Puts website value into array
    document.getElementById("delemail").value = personDetails[5];
    //Puts email value into array
    document.getElementById("delcl").value = personDetails[6];
    //Puts credit limit value into array
    document.getElementById("delamountowed").value = personDetails[7];
    //Puts amount owed value into array
    document.getElementById("deltotalrentals").value = personDetails[8];
    //Puts total rentals value into array
    document.getElementById("delblacklistflag").value = personDetails[9];
    //Puts blacklist flag value into array
    document.getElementById("delnumtimesblacklisted").value = personDetails[10];
    //Puts number of times blacklisted value into array
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

function deleteCheck()
//Checks if company selected for deletion has an amount owed or a blacklist flag
{
    if (document.getElementById("delamountowed").value > 0 || document.getElementById("delblacklistflag").value === 'Y' || document.getElementById("delblacklistflag").value === 'y')
    //Checks if theres an amount owed or if the company is on the blacklist
    {
        alert("This company cannot be deleted as they owe money or are on the blacklist");
        //Displays an alert saying the company cannot be deleted as they owe money or are on the blacklist
        return false;
        //Returns value to not save changes
    }
    else
    //Runs if no amount is owed and the company is not on the blacklist
    {
        return true;
        //Returns value to save changes
    }
}

function confirmCheck()
//Confirms if user wants to delete company
{
    var response;
    //Collects users response

    response = confirm("Are you sure you want to delete this company?");
    //Displays confirmation message asking if the user wants to delete the company and saves response in response variable

    if (response)
    //Runs if user clicks ok
    {
        document.getElementById("delname").disabled = false;
        //Removes the disabled attribute from name field allowing for deleting
        document.getElementById("deladdress").disabled = false;
        //Removes the disabled attribute from address field allowing for deleting
        document.getElementById("delphone").disabled = false;
        //Removes the disabled attribute from phone field allowing for deleting
        document.getElementById("delwebsite").disabled = false;
        //Removes the disabled attribute from website field allowing for deleting
        document.getElementById("delemail").disabled = false;
        //Removes the disabled attribute from email address field allowing for deleting
        document.getElementById("delcl").disabled = false;
        //Removes the disabled attribute from credit limit field allowing for deleting
        document.getElementById("delamountowed").disabled = false;
        //Removes the disabled attribute from amount owed field allowing for deleting
        document.getElementById("deltotalrentals").disabled = false;
        //Removes the disabled attribute from total rentals field allowing for deleting
        document.getElementById("delblacklistflag").disabled = false;
        //Removes the disabled attribute from blacklist flag field allowing for deleting
        document.getElementById("delnumtimesblacklisted").disabled = false;
        //Removes the disabled attribute from number of times blacklisted field allowing for deleting
        return true;
        //Returns value to save changes
    }
    else
    //Runs if user doesnt click ok
    {
        populate();
        //Displays all details of the user
        return false;
        //Returns value to not save changes
    }
}