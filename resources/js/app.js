import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', () => {
    function updateFormState() {
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.querySelector('button[type="submit"]').disabled = !navigator.onLine;
        });
    }

    window.addEventListener('online', updateFormState);
    window.addEventListener('offline', updateFormState);

    updateFormState();
});


