/*
    Student Name : 		Daniel Belov
    Student Id Number : CO0306133
    Date :				9/3/2026
    Purpose : 			To complete javascript part of Rentals screen
*/

function populateCars()
//Lists current database details
{
    var sel = document.getElementById("Car");
    //Variable which calls the listbox id when used
    var result;
    //Result variable
    result = sel.options[sel.selectedIndex].value;
    //Puts all the user details into result
    var personDetails = result.split(',');
    //Creates an array with individual details seperated by a comma
    document.getElementById("display").innerHTML = "The details of the selected car is: " + result;
    //Displays all the details of the car
    document.getElementById("Car").value = personDetails[0];
    //Puts car ID value into array
}

function carListboxCheck()
//checks if a user selected a car from the listbox
{
    var sel = document.getElementById("Car");
    //Variable which calls the listbox id when used

    if (sel.selectedIndex == 0)
    //Checks if user has selected a car from the listbox
    {
        alert("Please select a car from the listbox");
        //Displays error message if user didnt select a car from the listbox
        return false;
        //Returns value to not save changes
    }
    else
    {
        return true;
        //Returns value to save changes
    }  
}

function calculateRentalCost(input)
//Calculates rental cost
{
    var returnDate = new Date(input.value);
    //Collects return date inputted value
    var today = new Date();
    //Collects current date value

    returnDate.setHours(0,0,0,0);
    //remove time from return date
    today.setHours(0,0,0,0);
    //remove time from today date

    if (returnDate < today)
    //Checks if inputted date is past
    {
        alert("Please select a future date");
        //Displays error message if user didnt select a future date
        return;
        //Returns value to exit function
    }
    else
    {
    //Runs if inputted date is future
    const diffTime = Math.abs(returnDate - today);
    const duration = Math.floor(diffTime / (1000 * 60 * 60 * 24)); 
    //Calculates the duration by subtracting the current date from the inputted date and using maths functions to support different months

    var fiveDays = 5;
    var tenDays = 10;
    //Fixed variables

    if (duration >= 6 && duration <= 10)
    //Checks if the five day discount is applicable
    {
        var remainingDays = duration - fiveDays;
        //Calculates the remaining days after the first five days to apply the discount to
        return (fiveDays * standardCost) + (remainingDays * standardCost * fiveDayDiscount);
        //Calculates the cost by multiplying the first five days by the standard cost and the remaining days by the discounted cost
    }
    else if (duration > 10)
    //Checks if the ten day discount is applicable
    {
        var remainingDays = duration - tenDays;
        //Calculates the remaining days after the first ten days to apply the discount to
        return (fiveDays * standardCost) + (fiveDays * standardCost * fiveDayDiscount) + (remainingDays * standardCost * tenDayDiscount);
        //Calculates the cost by multiplying the first five days by the standard cost, the next five days by the five day discounted cost and the remaining days by the ten day discounted cost
    }
    else
    //Runs if no discount is applicable
    {
        return duration * standardCost;
        //Calculates the cost by multiplying the duration by the standard cost
    }
}
}

function dateCheck(input)
//Retrieves rental cost based on date input
{
    var answer = calculateRentalCost(input);
    //collects the calculated answer
    document.getElementById("displayRentalCost").value = answer;
    //Calls the id to display the answer

}

function overLimitCheck()
//Checks if the rental cost is over the limit
{
    var rentalCost = document.getElementById("displayRentalCost").value;
    //Collects rental cost value

    var creditLimit = document.getElementById("CreditLimit").value;
    //Collects credit limit value

    var amountOwed = document.getElementById("AmountOwed").value;
    //Collects amount owed value

    var total = parseInt(amountOwed) + parseInt(rentalCost);
    //Adds variables to create a total cost

    if (total > creditLimit)
    //Checks if the total cost is over the credit limit
    {
        alert("The total cost is above the credit limit. Please select a different return date or choose a different company");
        //Displays error message if the total cost is over the credit limit
        return false;
        //Returns value to not save changes
    }
    else
    {
        return true;
        //Returns value to save changes
    }

    
}

function carConfirmCheck()
//Confirms if user wants to rent car
{
    var response;
    //Collects users response

    response = confirm("Are you sure you want to rent this car?");
    //Displays confirmation message asking if the user wants to rent the car and saves response in response variable

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