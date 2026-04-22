<?php
include 'db.inc.php';
include 'menu.php';
date_default_timezone_set('UTC');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Company Report</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>

<h1>Company Report</h1>
<h2>(Click a button to see the Company Report in the desired order)</h2>

<form action="CompanyReport.php" method = "post" name = "reportForm">
    <input type="hidden" name = "choice">
</form>

<input type='button' id='nameButton' value='Company' onclick='nameOrder()' class = "button">
<input type='button' id='bestButton' value='Best Customer' onclick='bestOrder()' class = "button">
<input type='button' id='owedButton' value='Amount Owed' onclick='owedOrder()' class = "button">

<br><br>

<?php
$choice = "Name"; 
if (isset($_POST['choice']))
{
    $choice = $_POST['choice'];
}

if ($choice == "Best")
{
    $sql = "SELECT * FROM Company ORDER BY TotalRentals DESC";
}
else if ($choice == "Owed")
{
    $sql = "SELECT * FROM Company ORDER BY AmountOwed DESC";
}
else 
{
    $sql = "SELECT * FROM Company ORDER BY Name ASC";
}

$result = mysqli_query($con, $sql);
?>

<script>
//document.getElementById("nameButton").disabled = true;

function nameOrder()
{
    document.reportForm.choice.value = "Name";
    document.reportForm.submit();
}

function bestOrder()
{
    document.reportForm.choice.value = "Best";
    document.reportForm.submit();
}

function owedOrder()
{
    document.reportForm.choice.value = "Owed";
    document.reportForm.submit();
}
</script>

<table class = "reportTable">
<tr>
    <th>Company Name</th>
    <th>Address</th>
    <th>Total Rentals</th>
    <th>Blacklist Flag</th>
    <th>Credit Limit</th>
    <th>Amount Owed</th>
</tr>

<?php
while ($row = mysqli_fetch_array($result))
{
    echo "<tr>
            <td>".$row['Name']."</td>
            <td>".$row['Address']."</td>
            <td>".$row['TotalRentals']."</td>
            <td>".$row['BlacklistFlag']."</td>
            <td>".$row['CreditLimit']."</td>
            <td>".$row['AmountOwed']."</td>
          </tr>";
}
?>

</table>

<br>
<form action = "SetUpMenu.html">
    <input type = "submit" value = "Back to Menu">
</form>

<?php mysqli_close($con); ?>
</body>
</html>