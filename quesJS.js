 // validate function inputs
    function formValidation() {
        // check the input 
        var dropdown = document.getElementsByName('signedas')[0];
        if (dropdown.value === '') {
            // display alert message 
            alert("Please choose an option from the dropdown!");
            return false; // no submission 
        }

        // Check raio
        var radios = document.getElementsByName('answer');
        var radioSelected = false;
        for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                radioSelected = true;
                break;
            }
        }
        if (!radioSelected) {
            // alert for no selection  
            alert("Please select satisfaction with the website!");
            return false; // Prevent form submission
        }

        // Check  textarea input 
        var message = document.getElementById('Message').value.trim();
        if (message === '') {
            // alert to fill 
            alert("Please enter your comment!");
            return false; // Prevent form submission
        }

        /// get text area feedback 
        var textAreas = document.getElementsByTagName('textarea');
        for (var j = 0; j < textAreas.length; j++) {
            if (textAreas[j].value.trim() === '') {
                alert("Please fill in all text areas!");// to fill 
                return false; 
            }
        }

        // if all are filled
        return true;
 

    }

    // Function for form submission
    function submitForm(event) {
        event.preventDefault();

        // alert for getting the feedback 
        if (formValidation()) {
            alert("Thank you for your feedback!"); // Show thanks message 
            document.forms['myForm'].submit(); // Submit the form
        }
    }

    // Event listener for form submission
    document.forms['myForm'].addEventListener('submit', submitForm);


    // Function to handle form submission
    function submitForm(event) {
        event.preventDefault(); 

        // Call formValidation function to validate the form
        if (formValidation()) {
            // Get the selected server or client and feedback
            const selectedOption = document.getElementsByName('signedas')[0].value;
            const feedback = document.getElementById('Message').value;

            // get table body 
            const tableBody = document.getElementById('feedbackTableBody');

            // to crate new row 
            const newRow = tableBody.insertRow();
            const cell1 = newRow.insertCell(0);
            const cell2 = newRow.insertCell(1);

            // set the getten value to new values 
            cell1.textContent = selectedOption;
            cell2.textContent = feedback;

            // display new row 
            const table = document.getElementById('feedbackTable');
            table.style.display = 'table';

            alert('Thank you for your feedback!'); // Show thank you message
        }
    }

    // Event listener for form submission
    document.forms['myForm'].addEventListener('submit', submitForm);
     // to clear the table 
    function clearTable() {
        const tableBody = document.getElementById('feedbackTableBody');
        tableBody.innerHTML = ''; 

        // hide 
        const table = document.getElementById('feedbackTable');
        table.style.display = 'none';
    }

    // Event listener for "Clear Table" button
    document.getElementById('clearTableBtn').addEventListener('click', clearTable);
