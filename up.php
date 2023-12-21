<!DOCTYPE html>
<html>
<head>
<title>Campus Compass</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat|Island+Moments|Nunito' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <link rel="stylesheet" href="mystyle.css">
    <style>
        table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color: coral;}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg shadow " style="background-color: #fff;">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="logo1.png" style="height: 120px;"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  mb-2 mb-lg-0">
              <li class="nav-item"> <a class="nav-link active" aria-current="page" href="index.html" style="font-family: 'Nunito'">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="About us.html" style="font-family: 'Nunito'">About Us</a></li>
              <li class="nav-item"><a class="nav-link" href="achievements.html" style="font-family: 'Nunito'">achievements</a></li>
              <li class="nav-item"><a class="nav-link" href="srvices.html" style="font-family: 'Nunito'"> Our services</a></li>
              <li class="nav-item"><a class="nav-link" href="log.php" style="font-family: 'Nunito'">Registration</a></li>
              <li class="nav-item"><a class="nav-link" href="Contact us.html" style="font-family: 'Nunito'">Contact Us</a></li>
              <li class="nav-item"><a class="nav-link" href="qe.php" style="font-family: 'Nunito'">Questionnaire</a></li>
              <li class="nav-item"><a class="nav-link" href="se.php" style="font-family: 'Nunito'">search</a></li>
              <li class="nav-item"><a class="nav-link" href="up.php" style="font-family: 'Nunito'">update</a></li>
              <li class="nav-item"><a class="nav-link" href="funpage1.html" style="font-family: 'Nunito'">funpage</a></li></li>
            </ul>
              
            <!-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
          </div>
        </div>
      </nav>
    
<br/> <br/> <br/> 

<br/> <br> <br> 
<h1>Update User</h1>
<form action="" method="POST" style="padding-top: 34px; border: 1px solid black; width: 45%; border-radius: 10px; margin: auto; margin-top: 20px; padding-bottom: 60px;">
<label for="Name">Search by Name:</label>
        <input type="text" name="Name" id="Name" required>
        <input type="submit" value="Search">
    </form>

   
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Name = $_POST["Name"];
        // Sanitize user input
        $Name = htmlspecialchars($Name);
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "campuscompass";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Prepare and execute the SQL query
        $sql = "SELECT * FROM users WHERE Name = '$Name'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Display the user information in a table
            echo "<h2>User Information</h2>";
            echo "<table>";
            echo "<tr><th>Name</th><th>Email</th><th>Phone Number</th><th>Password</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td>" . $row["Phone_no"] . "</td>";
                echo "<td>" . $row["Password"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            // Display the update form
            echo "<h2>Update User Information</h2>";
            echo "<form method='POST' action=''>";
            echo "<input type='hidden' name='Name' value='$Name'>";
            echo "<label for='Email'>Email:</label>";
            echo "<input type='text' name='Email' id='Email' required>";
            echo "<label for='Phone_no'>Phone Number:</label>";
            echo "<input type='text' name='Phone_no' id='Phone_no' required>";
            echo "<label for='Password'>Password:</label>";
            echo "<input type='password' name='Password' id='Password' required>";
            echo "<input type='submit' name='update' value='Update'>";
            echo "</form>";
            // Handle update operation
            if (isset($_POST["update"])) {
                $updatedEmail = $_POST["Email"];
                $updatedPhone = $_POST["Phone_no"];
                $updatedPassword = $_POST["Password"];
                $Name = $_POST["Name"]; // Retrieve the Name from the form

                // Sanitize user inputs
                $updatedEmail = htmlspecialchars($updatedEmail);
                $updatedPhone = htmlspecialchars($updatedPhone);
                $updatedPassword = htmlspecialchars($updatedPassword);

                // Update the user information in the database
                $updateQuery = "UPDATE users SET Email='$updatedEmail', Phone_no='$updatedPhone', Password='$updatedPassword' WHERE Name='$Name'";

                if ($conn->query($updateQuery) === TRUE) {
                    echo "User information updated successfully!";
                } else {
                    echo "Error updating user information: " . $conn->error;
                }
            }
        } else {
            echo "No user found with the name: $Name";
        }

        // Close the database connection
        $conn->close();
    }
    ?>
    <br> <br> <br> <br> <br> <br> 
    <footer style=" text-align: center; font-family: 'Times New Roman', Times, serif;
padding: 3px;
background-color: rgb(16, 2, 35); 
color: white;"> <!-- text color , padding and background color -->
 <div class="contact"> <a class="contact-link " href="Contact us.html" style="text-decoration: none; color:#fff"> Contact us</a> </div>
 <a href = "mailto: CampusCompass@example.com">or through CampusCompass@gmail.com</a>
</footer>

</body>
</html>