document.addEventListener('DOMContentLoaded', function() {
    var isScrolling = false;
    var redirectUrl = "/views/info.html"; 

    function handleScroll() {
        if (!isScrolling) {
            isScrolling = true;

            // Start the fade-out effect
            document.body.classList.add('fade-out');

            // Redirect after the fade-out transition
            setTimeout(function() {
                window.location.href = redirectUrl;
            }, 1000); // Match this duration with the CSS transition time
        }
    }

    // Attach the wheel event listener to the window object
    window.addEventListener('wheel', handleScroll);
});
