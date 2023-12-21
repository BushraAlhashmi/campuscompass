<?php
class FormHandler {
    private $formData;

    public function __construct() {
        $this->formData = [];
    }

    public function handleForm() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Handle form data
            $signedAs = $_POST["signedas"] ?? '';
            $answer = $_POST["answer"] ?? '';
            $choice = $_POST["choice"] ?? '';
            $message = $_POST["Message"] ?? '';

            // Validation (you can add your own validation rules)
            if ($signedAs !== '' && $answer !== '' && $choice !== '' && $message !== '') {
                $this->formData[] = [
                    'signedAs' => $signedAs,
                    'answer' => $answer,
                    'choice' => $choice,
                    'message' => $message
                ];
                echo "Form submitted successfully!";
            } else {
                echo "Please fill in all fields!";
            }
        }
    }

    public function displayFormData() {
        echo "<h2>Submitted Form Data</h2>";
        if (!empty($this->formData)) {
            echo "<table border='1'>
                <tr>
                    <th>Signed As</th>
                    <th>Answer</th>
                    <th>Choice</th>
                    <th>Message</th>
                </tr>";
            foreach ($this->formData as $data) {
                echo "<tr>";
                echo "<td>" . $data['signedAs'] . "</td>";
                echo "<td>" . $data['answer'] . "</td>";
                echo "<td>" . $data['choice'] . "</td>";
                echo "<td>" . $data['message'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No form data submitted yet.";
        }
    }
}

// Create an instance of FormHandler
$formHandler = new FormHandler();

// Handle form submission
$formHandler->handleForm();
?>
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
  <script>
        // Validate function inputs
        function formValidation() {
            // Check dropdown
            var dropdown = document.getElementsByName('signedas')[0];
            if (dropdown.value === '') {
                alert("Please choose an option from the dropdown!");
                return false;
            }

            // Check radio buttons
            var radios = document.getElementsByName('answer');
            var radioSelected = false;
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    radioSelected = true;
                    break;
                }
            }
            if (!radioSelected) {
                alert("Please select satisfaction with the website!");
                return false;
            }

            // Check textarea
            var message = document.getElementById('Message').value.trim();
            if (message === '') {
                alert("Please enter your comment!");
                return false;
            }

            // Check all textareas
            var textAreas = document.getElementsByTagName('textarea');
            for (var j = 0; j < textAreas.length; j++) {
                if (textAreas[j].value.trim() === '') {
                    alert("Please fill in all text areas!");
                    return false;
                }
            }

            return true;
        }

        // Function for form submission
        function submitForm(event) {
            event.preventDefault();

            if (formValidation()) {
                const selectedOption = document.getElementsByName('signedas')[0].value;
                const feedback = document.getElementById('Message').value;

                const tableBody = document.getElementById('feedbackTableBody');

                const newRow = tableBody.insertRow();
                const cell1 = newRow.insertCell(0);
                const cell2 = newRow.insertCell(1);

                cell1.textContent = selectedOption;
                cell2.textContent = feedback;

                const table = document.getElementById('feedbackTable');
                table.style.display = 'table';

                alert('Thank you for your feedback!');
            }
        }

        // Event listener for form submission
        document.forms['myForm'].addEventListener('submit', submitForm);

        // Function to clear the table
        function clearTable() {
            const tableBody = document.getElementById('feedbackTableBody');
            tableBody.innerHTML = '';

            const table = document.getElementById('feedbackTable');
            table.style.display = 'none';
        }

        // Event listener for "Clear Table" button
        document.getElementById('clearTableBtn').addEventListener('click', clearTable);
    </script>
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
              <li class="nav-item"><a class="nav-link" href="indexjQ.html" style="font-family: 'Nunito'">HOMEjq</a></li>
              <li class="nav-item"><a class="nav-link" href="About us.html" style="font-family: 'Nunito'">About Us</a></li>
              <li class="nav-item"><a class="nav-link" href="achievements.html" style="font-family: 'Nunito'">achievements</a></li>
              <li class="nav-item"><a class="nav-link" href="srvices.html" style="font-family: 'Nunito'"> Our services</a></li>
              <li class="nav-item"><a class="nav-link" href="log.php" style="font-family: 'Nunito'">Registration</a></li>
             <li class="nav-item"><a class="nav-link" href="Contact us.html" style="font-family: 'Nunito'">Contact Us</a></li>
              <li class="nav-item"><a class="nav-link" href="Questionnaire.html" style="font-family: 'Nunito'">Questionnaire</a></li>
              <li class="nav-item"><a class="nav-link" href="quesJQ.html" style="font-family: 'Nunito'">QuestionnaireJQ</a></li>
              <li class="nav-item"><a class="nav-link" href="FunPage1.html" style="font-family: 'Nunito'">funpage</a></li></li>
            </ul>
              
            <!-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
          </div>
        </div>
      </nav>
    
<br/> <br/> <br/> 
<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
</head>
<body>
 <!-- Your HTML form -->
  <!-- Your HTML form -->
  <form method="POST" action="" name="myForm" onsubmit="return formValidation()">
        <label>You signed in as:</label><br>
        <select name="signedas">
            <option value="" disabled selected hidden>Choose one role</option>
            <option value="client">a client</option>
            <option value="server">server</option>
        </select><br><br>
       
        <label>Are you satisfied with our website?</label><br> 
        <label><input type="radio" name="answer" value="yes"> Yes </label>
        <label><input type="radio" name="answer" value="no"> No </label><br/><br> 
        
        <label>Rate us out of five:</label><br> 
        <label><input type="radio" name="choice" value="1"> 1</label>
        <label><input type="radio" name="choice" value="2"> 2 </label>
        <label><input type="radio" name="choice" value="3">3 </label>
        <label><input type="radio" name="choice" value="4">4 </label>
        <label><input type="radio" name="choice" value="5"> 5</label>
          <!-- Textarea for feedback -->
        <textarea name="Message" placeholder="Enter your comment here" id="Message" rows="4" cols="35"></textarea><br /><br />
        

        <br/><br><br /> 
       
       <br /><br />

        <input class="btn btn-outline-success" type="submit" value="Submit" style="margin-left: 25px;">
    </form>

    <!-- Table to display feedback -->
    <table border="1" id="feedbackTable" style="display: none;">
        <thead>
            <tr>
                <th>signed as</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody id="feedbackTableBody">
        </tbody>
    </table>

    <!-- Clear Table button -->
    <button id="clearTableBtn">Clear Table</button>
    <!-- PHP code for form submission -->
    

<div class="container py-3" style = "text-align: center;">
  <!-- get the input to display it in the table -->
 
   <!-- table for displaying the signed as user and its feed back -->
<table class="table table-bordered"style="text-align:center"id="feedbackTable" class="table table-striped" style="display: none;">
  <thead>
    <tr class="table-light" style = "border-width: 5px">
      <th scope="col" style = "border-width: 5px">signed as </th>
      <th scope="col" style = "border-width: 5px">feedback</th>
    </tr>
  </thead>
  <tbody class="table-light"id="feedbackTableBody">
  </tbody>
</table>
<!--to clear the table -->
<button class="btn btn-danger" id="clearTableBtn">Clear Table</button>


<br/> <br/> 
<script src="quesJS.js"></script></div>
<?php
class FeedbackRow {
    private $feedbackId;
    private $signedAs;
    private $satisfaction;
    private $rating;
    private $comment;

    public function __construct($feedbackId, $signedAs, $satisfaction, $rating, $comment) {
        $this->feedbackId = $feedbackId;
        $this->signedAs = $signedAs;
        $this->satisfaction = $satisfaction;
        $this->rating = $rating;
        $this->comment = $comment;
    }

    // Getter methods
    public function getFeedbackId() {
        return $this->feedbackId;
    }

    public function getSignedAs() {
        return $this->signedAs;
    }

    public function getSatisfaction() {
        return $this->satisfaction;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getComment() {
        return $this->comment;
    }
}

// Example usage
$row = new FeedbackRow(1, 'client', 'yes', 5, 'Great website!');
echo $row->getSignedAs(); // Accessing the signedAs property
?>

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
