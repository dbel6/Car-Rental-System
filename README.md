# Car Rental System

A team-based web application built to manage the core operations of a car rental firm, including company management, vehicle tracking, rentals, returns, payments and blacklisting. Built with PHP, MySQL, HTML, CSS and JavaScript as a second year group project.

## Summary
The Car Rental System allows staff members to manage all aspects of a car rental business through a browser-based interface. Companies can be added, amended and deleted, cars can be rented and returned, payments can be accepted, and companies can be blacklisted for outstanding balances. The system is backed by a MySQL database with seven linked tables and uses PHP to bridge the frontend and backend. The interface is consistent throughout, with a shared navigation bar, dropdown menus, form validation and confirmation prompts on all data entry screens.

## The Problem
Car rental firms need a reliable internal system to manage their fleet, track which companies have rented cars, handle overdue returns and payments, and flag companies that have exceeded their credit limits. This project addresses that by building a full management system that enforces business rules such as credit limit checks before a rental can proceed, penalty charges for late returns, and manager-only authentication before removing a company from the blacklist.

## My Role & Contribution
- Designed and implemented the Company Table and Rental Table in the MySQL database
- Built the Add Company screen with full input validation and confirmation prompts
- Built the Amend/View Company screen allowing staff to search, view and update company records
- Built the Delete Company screen with soft-delete flagging to preserve data integrity
- Built the Rentals screen including credit limit checks, automatic cost calculation with five-day and ten-day discount schemes, and database updates across the Car, Company and Rental tables
- Collaborated on the shared navigation bar, global CSS styling, database connection setup and homepage

## Approach
The system is built as a web application using PHP to connect to a MySQL database. HTML, CSS and JavaScript handle the frontend interface. All pages share a consistent layout with a green navigation bar featuring dropdown menus grouped by category (Car, Car Type, Car Category, Company, Blacklist, Rentals).

The database consists of seven linked tables:
| Table | Purpose |
| --- | --- |
| Company | Stores company details, credit limit, amount owed and blacklist status |
| Car | Stores vehicle details, status and link to CarType |
| CarType | Stores model, engine, fuel type and rental category |
| RentalCategory | Stores daily rates and discount percentages |
| Rental | Stores rental records linked to Company and Car |
| BlacklistEpisode | Stores blacklist history linked to Company |
| User | Stores staff login credentials with manager flag |

The rental cost calculation applies tiered discounts: standard rate for days 1-5, a five-day discount rate for days 6-10, and a ten-day discount rate for days 11 onwards. Late returns incur a penalty equal to twice the standard daily rate for each extra day.

Each team member was responsible for a set of screens. The shared components (navigation bar, CSS, database connection, home page) were developed collaboratively.

## Challenges
- Implementing the tiered rental cost calculation correctly required careful handling of the three discount brackets and edge cases where rentals spanned exactly 5 or 10 days
- The delete screens used soft-delete flagging rather than removing records from the database, which meant filtering deleted records out across every screen that pulled from those tables
- Keeping the shared navigation bar consistent across pages that used different technologies (some pure HTML, some PHP) required two approaches — a PHP include for compatible pages and direct paste for others
- Coordinating work across four team members using Git required regular branch merging and agreeing on shared conventions for the database schema and CSS early in the project

## Solution
```php
// Rental cost calculation with tiered discounts
$duration = (strtotime($dateDueBack) - strtotime($rentalStartDate)) / 86400;
$cost = 0;
if ($duration <= 5) {
    $cost = $duration * $standardCostPerDay;
} elseif ($duration <= 10) {
    $cost = (5 * $standardCostPerDay)
          + (($duration - 5) * $standardCostPerDay * (1 - $fiveDayDiscount / 100));
} else {
    $cost = (5 * $standardCostPerDay)
          + (5 * $standardCostPerDay * (1 - $fiveDayDiscount / 100))
          + (($duration - 10) * $standardCostPerDay * (1 - $tenDayDiscount / 100));
}

// Credit limit check before confirming rental
if (($amountOwed + $cost) > $creditLimit) {
    echo "This rental exceeds the company's credit limit. Transaction cancelled.";
    exit;
}
```

## Results
- Full CRUD operations implemented for Company, Car, Car Type and Rental Category
- Rental screen correctly calculates costs including tiered discounts and late return penalties
- Credit limit enforcement prevents rentals from proceeding when the balance would be exceeded
- Soft-delete flagging preserves historical data while hiding deleted records from active screens
- Consistent UI across all screens with shared navigation, styling and validation

## Next Steps
- Complete the Blacklist screens (Add to Blacklist, Amend/View Blacklist, Remove from Blacklist) which were marked as under construction at submission
- Implement the Returns and Accept Payments screens fully
- Add the manager login authentication flow for blacklist removal
- Replace plain text password storage in the User table with hashed passwords
- Add a full Rental Report and Payment Report screen

## How to run
Requirements: A local server running PHP and MySQL (e.g. XAMPP)
1. Start XAMPP and ensure both Apache and MySQL are running
2. Open phpMyAdmin at http://localhost/phpmyadmin
4. Create a database and import the SQL dump to set up the tables and sample data
5. Copy the project folder into your XAMPP htdocs directory
6. Open your browser and go to http://localhost/CarRental/index.html

## Project Structure
├── Car/
│   ├── AddNewCar.html.php
│   ├── AmendViewCar.html.php
│   ├── DeleteCar.html.php
│   └── CarReport.html
├── CarCategory/
│   ├── AddNewRentalCategory.html
│   ├── AmendViewRentalCategory.html
│   └── DeleteRentalCategory.html
├── CarCompany/
│   ├── AddNewCarCompany.html.php
│   ├── AmendViewCarCompany.html.php
│   ├── DeleteCarCompany.html.php
│   ├── CompanyReport.php
│   └── Rentals.html.php
├── CarType/
│   ├── AddNewCarType.html
│   ├── AmendViewCarType.html.php
│   └── DeleteCarType.html.php
├── Style.css
├── navbar.php
├── index.html
└── README.md

## Built with
- PHP
- MySQL
- HTML
- CSS
- JavaScript
- XAMPP (local development server)
- Git (version control)
