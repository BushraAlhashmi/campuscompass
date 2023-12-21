
  // jQuery for form validation
  $(document).ready(function() {
      // Form validation function
      function formValidation() {
          // Validation logic for the form elements
          // Check if the dropdown has a selected value
          if ($('select[name="options"]').val() === null) {
              alert("Please choose an option from the dropdown!");
              return false; // Prevent form submission
          }

          // Check if radio buttons are selected
          if (!$('input[name="answer"]').is(':checked')) {
              alert("Please select satisfaction with the website!");
              return false; // Prevent form submission
          }

          // Check if text area is not empty
          if ($.trim($('#Message').val()) === '') {
              alert("Please enter your comment!");
              return false; // Prevent form submission
          }

          // Additional validation for other text areas (if any)
          $('textarea').each(function() {
              if ($.trim($(this).val()) === '') {
                  alert("Please fill in all text areas!");
                  return false; // Prevent form submission
              }
          });

          // Returning true if all validations pass
          return true;
      }

      // Submit event listener for the form
      $('form[name="myForm"]').submit(function(event) {
          event.preventDefault(); // Prevent default form submission

          // Call formValidation function to validate the form
          if (formValidation()) {
              // Submit the form if validation passes
              alert("Thank you for your feedback!"); // Show thank you message
              this.submit();
          }
      });
  });
