
    function updateDateTime() {
        var currentDate = new Date().toLocaleDateString();
        var currentTime = new Date().toLocaleTimeString();

        document.getElementById("current-date").textContent = currentDate;
        document.getElementById("current-time").textContent = currentTime;
    }

    // call the update function 
    setInterval(function() {
        updateDateTime();
    }, 1000);



    // rotate the photos in order 
    function rotatePhotos() {
        var images = document.querySelectorAll(".gallery-img");
        var currentImageIndex = 0;

        setInterval(function () {
            // remove the previous and displat the new 
            images[currentImageIndex].style.display = "none";
            currentImageIndex = (currentImageIndex + 1) % images.length;
            images[currentImageIndex].style.display = "block";
            // to cahnge in millisec
        }, 3000); 
    }

    // Call the function to rotate photos on page load
    window.onload = function () {
        // rotate the image 
        rotatePhotos();
    };


    