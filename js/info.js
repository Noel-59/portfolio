window.onload = function() {
    const typewriter = document.querySelector('.typewriter');
    const text = typewriter.textContent; 
    typewriter.textContent = ''; 

    const cursorSpan = document.createElement('span');
    cursorSpan.classList.add('cursor');
    typewriter.appendChild(cursorSpan); 

    let index = 0;
    const speed = 80; 

    function type() {
        if (index < text.length) {
            typewriter.textContent += text.charAt(index); 
            index++;
            typewriter.appendChild(cursorSpan); 
            setTimeout(type, speed); 
        } else {
            cursorSpan.style.display = 'inline-block';
        }
    }

    type();
};
