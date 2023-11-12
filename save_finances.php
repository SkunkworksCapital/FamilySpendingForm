<?php
$servername = "localhost:3306";
$username = "sagejyou_localhost";
$password = "pass";
$dbname = "sagejyou_ie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Extract and sanitize input data
$salary1 = $conn->real_escape_string($_POST['salary1']);
$salary2 = $conn->real_escape_string($_POST['salary2']);
$rentalIncome = $conn->real_escape_string($_POST['rentalIncome']);
$foodDrink = $conn->real_escape_string($_POST['foodDrink']);
$insurance = $conn->real_escape_string($_POST['insurance']);
$entertainment = $conn->real_escape_string($_POST['entertainment']);
$travel = $conn->real_escape_string($_POST['travel']);
$utilities = $conn->real_escape_string($_POST['utilities']);
$AccountNumber = $conn->real_escape_string($_POST['AccountNumber']);

// Calculate net surplus/deficit
$totalIncome = $salary1 + $salary2 + $rentalIncome;
$totalExpenses = $foodDrink + $insurance + $entertainment + $travel + $utilities;
$netSurplusDeficit = $totalIncome - $totalExpenses;

// SQL to insert data
$sql = "INSERT INTO Finance_Tracker3 (salary1, salary2, rentalIncome, foodDrink, insurance, entertainment, travel, utilities, netSurplusDeficit, AccountNumber) VALUES ('$salary1', '$salary2', '$rentalIncome', '$foodDrink', '$insurance', '$entertainment', '$travel', '$utilities', '$netSurplusDeficit','$AccountNumber')";

if ($conn->query($sql) === TRUE) {
    echo "<!DOCTYPE html>
          <html>
          <head>
              <title>Record Saved</title>
              <style>
                  body {
                      font-family: Arial, sans-serif;
                      background-color: #f4f4f4;
                      display: flex;
                      justify-content: center;
                      align-items: center;
                      height: 100vh;
                      margin: 0;
                  }
                  .success-message {
                      background-color: #dff0d8;
                      color: #3c763d;
                      padding: 20px;
                      margin: 15px;
                      border-radius: 5px;
                      border: 1px solid #d6e9c6;
                  }
              </style>
          </head>
          <body>
              <div class='success-message'>
                  <strong>Success!</strong> Thank you, one of our agents will be in contact shotly.
              </div>
          </body>
          </html>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
