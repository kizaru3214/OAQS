// Main JavaScript for Queue System
document.addEventListener('DOMContentLoaded', function() {
    console.log('AquaQueue System Loaded!');
    
    // Auto-login demo button (for testing)
    const demoLoginBtn = document.getElementById('demo-login');
    if (demoLoginBtn) {
        demoLoginBtn.addEventListener('click', function() {
            document.getElementById('email').value = 'user@test.com';
            document.getElementById('password').value = 'password123';
            document.querySelector('form').submit();
        });
    }
    
    // Service selection
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach(card => {
        card.addEventListener('click', function() {
            serviceCards.forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            this.classList.add('border-[#71C9CE]', 'bg-[#CBF1F5]');
        });
    });
    
    // Time slot selection
    const timeSlots = document.querySelectorAll('.time-slot:not(.booked)');
    timeSlots.forEach(slot => {
        slot.addEventListener('click', function() {
            timeSlots.forEach(s => s.classList.remove('selected'));
            this.classList.add('selected');
            this.classList.add('bg-[#71C9CE]', 'text-white');
        });
    });
    
    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let valid = true;
            const inputs = this.querySelectorAll('input[required]');
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    valid = false;
                    input.classList.add('border-red-500');
                    
                    // Add error message
                    if (!input.nextElementSibling?.classList.contains('error-msg')) {
                        const errorMsg = document.createElement('p');
                        errorMsg.className = 'error-msg text-red-500 text-xs mt-1';
                        errorMsg.textContent = 'This field is required';
                        input.parentNode.appendChild(errorMsg);
                    }
                } else {
                    input.classList.remove('border-red-500');
                    const errorMsg = input.parentNode.querySelector('.error-msg');
                    if (errorMsg) errorMsg.remove();
                }
            });
            
            if (!valid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    });
    
    // Queue simulation
    const queueNumbers = document.querySelectorAll('.queue-number');
    if (queueNumbers.length > 0) {
        setInterval(() => {
            // Simulate queue updates
            console.log('Queue updated');
        }, 30000);
    }
});