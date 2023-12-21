// function for updating time and date 
$(document).ready(function() {
    function updateDateTime() {
        var currentDate = new Date().toLocaleDateString();
        var currentTime = new Date().toLocaleTimeString();

        $("#current-date").text(currentDate);
        $("#current-time").text(currentTime);
    }

    /// call the function 
    updateDateTime();
// to update the time 
    setInterval(function() {
        updateDateTime();
    }, 1000);
// to rotate the fotos 
    function rotatePhotos() {
        var images = $(".gallery-img");
        var currentImageIndex = 0;
// hide and show the images in orders 
        setInterval(function() {
            images.eq(currentImageIndex).hide();
            currentImageIndex = (currentImageIndex + 1) % images.length;
            images.eq(currentImageIndex).show();
        }, 3000); // Change delay (in milliseconds) as needed
    }
// rotate the photos 
    rotatePhotos();
});