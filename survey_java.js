function celebrate(event) {
    event.preventDefault(); // Prevent form from submitting
    const confettiContainer = document.getElementById('confetti');

    // Create confetti pieces
    for (let i = 0; i < 100; i++) {
        const confetti = document.createElement('div');
        confetti.classList.add('confetti-piece');
        confetti.style.left = Math.random() * 100 + 'vw';
        confetti.style.animationDuration = Math.random() * 3 + 2 + 's';
        confetti.style.backgroundColor = getRandomColor();
        confettiContainer.appendChild(confetti);
    }

    // Clear confetti after animation
    setTimeout(() => {
        confettiContainer.innerHTML = '';
        alert('Thank you for submitting the survey!');
    }, 5000);
}

// Generate random color
function getRandomColor() {
    const colors = ['#ff8cfc', '#8a95ff', '#d4a3ff'];
    return colors[Math.floor(Math.random() * colors.length)];
}
