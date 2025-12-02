document.addEventListener('DOMContentLoaded', (event) => {
    const contactForm = document.getElementById('contactForm');
    
    // 1. Validation du formulaire de contact
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            
            // Réinitialisation des messages d'erreur
            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
            let isValid = true;

            const nom = document.getElementById('nom');
            const email = document.getElementById('email');
            const message = document.getElementById('message');

            // a) Validation du Nom
            if (nom.value.trim() === "") {
                document.getElementById('nomError').textContent = "Le nom complet est requis.";
                isValid = false;
            }

            // b) Validation de l'Email (Format)
            if (!validateEmail(email.value)) {
                document.getElementById('emailError').textContent = "Le format de l'email est invalide.";
                isValid = false;
            }

            // c) Validation du Message
            if (message.value.trim().length < 10) {
                document.getElementById('messageError').textContent = "Le message doit contenir au moins 10 caractères.";
                isValid = false;
            }
            
            // Empêcher l'envoi si non valide
            if (!isValid) {
                e.preventDefault();
            }
        });
    }

    /**
     * Vérification du format d'email (REGEX)
     */
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
        return re.test(String(email).toLowerCase());
    }
});