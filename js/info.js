window.onload = function() {
    const typewriter = document.querySelector('.typewriter');
    const text = typewriter.textContent; // Get the original text content
    typewriter.textContent = ''; // Clear the content to start typing

    // Create a span element for the blinking cursor
    const cursorSpan = document.createElement('span');
    cursorSpan.classList.add('cursor');
    typewriter.appendChild(cursorSpan); // Append it to the typewriter element

    let index = 0;
    const speed = 80; // Typing speed in milliseconds per character

    function type() {
        if (index < text.length) {
            typewriter.textContent += text.charAt(index); // Append the next character
            index++;
            typewriter.appendChild(cursorSpan); // Re-append the cursor to keep it at the end
            setTimeout(type, speed); // Repeat until the whole text is typed
        } else {
            // Optionally, keep the cursor visible after typing is done
            cursorSpan.style.display = 'inline-block'; // Ensure cursor is visible
        }
    }

    type(); // Start typing
};
