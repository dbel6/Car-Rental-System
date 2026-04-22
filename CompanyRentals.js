/*
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				12/3/2026
    Purpose : 			To complete javascript part of companies in Rentals screen
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
    document.getElementById("CompanyId").value = personDetails[0];
    //Puts company ID value into array
    document.getElementById("Name").value = personDetails[1];
    //Puts name value into array
    document.getElementById("Address").value = personDetails[2];
    //Puts address value into array
    document.getElementById("AmountOwed").value = personDetails[3];
    //Puts amount owed value into array
    document.getElementById("CreditLimit").value = personDetails[4];
    //Puts credit limit value into array
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
//Confirms if user wants to rent company
{
    var response;
    //Collects users response

    response = confirm("Are you sure you want to rent this company?");
    //Displays confirmation message asking if the user wants to rent the company and saves response in response variable

    if (response)
    //Runs if user clicks ok
    {
        document.getElementById("Name").disabled = false;
        //Removes the disabled attribute from name field allowing for renting
        document.getElementById("Address").disabled = false;
        //Removes the disabled attribute from address field allowing for renting
        document.getElementById("AmountOwed").disabled = false;
        //Removes the disabled attribute from phone field allowing for renting
        document.getElementById("CreditLimit").disabled = false;
        //Removes the disabled attribute from credit limit field allowing for renting
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