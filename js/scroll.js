// js/scroll.js
document.addEventListener('DOMContentLoaded', function () {
    var isScrolling = false;
    var redirectUrl = "/views/info.html"; 

    function handleScroll() {
        if (!isScrolling) {
            isScrolling = true;

            document.body.classList.add('fade-out');

            setTimeout(function () {
                window.location.href = redirectUrl;
            }, 500); 
        }
    }

    window.addEventListener('wheel', handleScroll);

    window.addEventListener('touchstart', function (e) {
        if (e.touches.length > 0) {
            handleScroll();
        }
    });

    let touchStartX = 0;

    window.addEventListener('touchstart', function (event) {
        touchStartX = event.touches[0].clientX; 
    });

    window.addEventListener('touchmove', function (event) {
        let touchEndX = event.touches[0].clientX;
        if (touchStartX - touchEndX > 50) { 
            handleScroll();
        }
        else if (touchEndX - touchStartX > 50) { 
            handleScroll();
        }
    });
});
