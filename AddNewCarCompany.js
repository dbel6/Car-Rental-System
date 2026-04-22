/*
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				12/2/2026
    Purpose : 			To complete javascript part of Add Company screen
*/

function addressCheck()
//Checks if address field matches certain criteria
{
    var address = document.getElementById("Address");
    //Collects address inputted

    address.value = address.value.replace(/[^a-zA-Z0-9,.\s]/g, "");
    //Removes any character that is not alphabetic characters, numbers, commas, dots or spaces
}

function confirmCheck()
//Confirms if user wants to add company
{
    var response;
    //Collects users response

    response = confirm("Are you sure you want to add company?");
    //Displays confirmation message asking if the user wants to add the company and saves response in response variable

    if (response)
    //Runs if user clicks ok
    {
        return true;
        //Returns value to save changes
    }
    else
    //Runs if user doesnt click ok
    {
        return false;
        //Returns value to not save changes
    }
}