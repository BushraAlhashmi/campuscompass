<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "campuscompass";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $Phone_no = $_POST['Phone_no'];
    $Email = $_POST['Email'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT); // Hash the password

    // Prepare and bind SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO user (Name, Age, Phone_no, Email, Password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $Name, $Age, $Phone_no, $Email, $Password);

    // Execute the prepared statement
    $stmt->execute();

    echo "New record inserted successfully.";

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
