document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            // Reset des erreurs
            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
            let isValid = true;

            const nom = document.getElementById('nom');
            const email = document.getElementById('email');
            const message = document.getElementById('message');

            // Validation Nom
            if (nom.value.trim().length < 2) {
                document.getElementById('nomError').textContent = "Le nom est trop court.";
                isValid = false;
            }

            // Validation Email
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!re.test(email.value.toLowerCase())) {
                document.getElementById('emailError').textContent = "Format email invalide.";
                isValid = false;
            }

            // Validation Message
            if (message.value.trim().length < 10) {
                document.getElementById('messageError').textContent = "Message trop court (min 10 car.).";
                isValid = false;
            }
            
            if (!isValid) e.preventDefault();
        });
    }
});