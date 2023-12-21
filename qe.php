
<!DOCTYPE html>
<html lang="en">
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
 <style>/* Add this CSS to your existing stylesheet or create a new CSS file */

  /* Style for the feedback table */
  #feedbackTable {
      width: 80%;
      margin: auto;
      margin-top: 30px;
      border-collapse: collapse;
  }
  
  #feedbackTable th,
  #feedbackTable td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
  }
  
  #feedbackTable th {
      background-color: #f2f2f2;
      color: #333;
  }
  </style>
</head>

<body>
  <script src="quesJS.js"></script>
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
    
<form method="POST" action="" style="padding-top: 34px; border: 1px solid black; width: 45%; border-radius: 10px; margin: auto; margin-top: 20px; padding-bottom: 60px;"name="myForm">
    <br /><h2 style="margin: 20px">Drop Us a Feedback</h2> <br />
    <label>You signed in as:</label><br>
    <select name="signedas">
        <option value="" disabled selected hidden>Choose one role</option>
        <option value="client">a client</option>
        <option value="server">server</option>
    </select><br><br>
    
    <label>Are you satisfied with our website?</label><br> 
    <label style="margin-right: 30px"><input type="radio" id="yes" name="answer"  value="yes"> Yes </label>
    <label><input type="radio" name="answer" value="no" id="no"> No </label><br/><br> 
    
    <label>Rate us out of five:</label><br> 
    <label style="margin-right: 15px"><input type="radio" name="choice" value="1"></label>1
    <label style="margin-right: 15px"><input type="radio" name="choice" value="2"></label>2
    <label style="margin-right: 15px"><input type="radio" name="choice" value="3"></label>3
    <label style="margin-right: 15px"><input type="radio" name="choice" value="4"></label>4
    <label style="margin-right: 15px"><input type="radio" name="choice" value="5"></label>5
    
    <br/><br><br /> 
   
    <textarea name="Message" id="Message" rows="4" cols="35" placeholder="Enter your comment here"></textarea><br /><br />

    <input class="btn btn-outline-success" type="reset" value="Clear">
    <input class="btn btn-outline-success" type="submit" value="Submit" style="margin-left: 25px;">

</form>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$submissionsArray = [];

// Function to display the submissions table
function displaySubmissionsTable($submissions) {
    echo "<h2>Submitted Feedback</h2>";
    echo "<table border='1'>
        <tr>
            <th>Signed as</th>
            <th>Satisfaction</th>
            <th>Rating</th>
            <th>Comment</th>
        </tr>";

    foreach ($submissions as $submission) {
        echo "<tr>";

        echo "<td>" . $submission->signedAs . "</td>";
        echo "<td>" . $submission->satisfaction . "</td>";
        echo "<td>" . $submission->rating . "</td>";
        echo "<td>" . $submission->comment . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $signedAs = $_POST["signedas"] ?? '';
    $satisfaction = $_POST["answer"] ?? '';
    $rating = $_POST["choice"] ?? '';
    $comment = $_POST["Message"] ?? '';

    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "campuscompass";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO feedback (signed_as, satisfaction, rating, comment) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die('Error: ' . $conn->error);
    }
    
    $stmt->bind_param("ssis", $signedAs, $satisfaction, $rating, $comment);
    
    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    
    // Fetch data after insertion
    $fetchSql = "SELECT * FROM feedback";
    $result = $conn->query($fetchSql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_object()) {
            $submission = new stdClass();
            $submission->signedAs = $row->signed_as;
            $submission->satisfaction = $row->satisfaction;
            $submission->rating = $row->rating;
            $submission->comment = $row->comment;

            $submissionsArray[] = $submission;
        }
    }

    // Close the database connection
    $conn->close();
}

// Display the submissions table

?>

<?php displaySubmissionsTable($submissionsArray); ?> 


<!-- print the footer at the end of the page -->
<!-- align the text to the centre and choose Times New Roman as text font -->
<footer style=" text-align: center; font-family: 'Times New Roman', Times, serif;
padding: 3px;
background-color: rgb(16, 2, 35); 
color: white;"> <!-- text color , padding and background color -->
 <div class="contact"> <a class="contact-link " href="Contact us.html" style="text-decoration: none; color:#fff"> Contact us</a> </div>
 <a href = "mailto: CampusCompass@example.com">or through CampusCompass@gmail.com</a>
</footer>

</body>
</html>
