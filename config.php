<?php
// Database server
$db_host = 'localhost';
$db_name = 'campuscompass';
$db_username = 'root';
$db_password = 'root';
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form action="in.php" method="POST" >
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <label for="id">ID:</label>
    <input type="text" id="id" name="id" required><br><br>
    
    <input type="submit" value="Submit" href="try.html">
</form>

<?php
error_reporting(E_ALL);


ini_set('display_errors', 1);

ini_set('log_errors', 'On');
ini_set('error_log', '/path/to/php_errors.log');

php_info(); // 500 error
phpinfo(); // Works correctly
// Connect to MySQL server
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database
$sql = "CREATE DATABASE campuscompass";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db("campuscompass");

// Create the table
$sql = "CREATE TABLE user (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL
)";
CREATE TABLE `campuscompass`.`user` (`id` INT NOT NULL , `name` INT NOT NULL , `password` INT NOT NULL , `email` INT NOT NULL ) ENGINE = InnoDB;
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<?php
// Connect to MySQL server
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campuscompass";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form inputs
$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$id = $_POST['id'];

// Insert the data into the table
$sql = "INSERT INTO user (name, password, email, id) VALUES ('$name', '$password', '$email', '$id')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . $conn->error;
}

$conn->close();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<?php
// Connect to MySQL server
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campuscompass";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the table
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Password</th>
                <th>Email</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['password']."</td>
                <td>".$row['email']."</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No data found";
}

$conn->close();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<?php
    // define variables and set to empty values
    $id = $name = $password = $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = test_input($_POST["id"]);
      $name = test_input($_POST["name"]);
      $email = test_input($_POST["email"]);
      $password = test_input($_POST["password"]);
     

      include('config.php');
      $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
      $sqlQuery = mysqli_query($conn, "INSERT INTO user 
        set id = '".$id."',
        name = '".$name."', 
        email='".$email."', 
        password='".$password."', 
        Phone_no='".$phone_no."'
        ");
      
    }

    function test_input($info) {
      $info = trim($info);
      $info = stripslashes($info);
      $info = htmlspecialchars($info);
      return $info;
    }
    ?>
</body>
</html>