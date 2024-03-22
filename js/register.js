document.getElementById('firstName').addEventListener('input', validateAndDisplayMessage);
document.getElementById('lastName').addEventListener('input', validateAndDisplayMessage);
document.getElementById('registrationForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission to check validation first
    validateForm();
});

function validateAndDisplayMessage() {
    // Validation logic for first_name field
    var firstName = document.getElementById('firstName').value.trim();
    var firstNameRegex = /^[a-zA-Z\s]+$/;

    if (!firstNameRegex.test(firstName)) {
        showMessage('Invalid first name. Only letters and spaces are allowed.', 'red');
    } else {
        showMessage('', 'green');
    }
}

function validateForm() {
    // Validation for last_name
    var lastName = document.getElementById('lastName').value.trim();
    var lastNameRegex = /^[a-zA-Z\s]+$/;
    if (!lastNameRegex.test(lastName)) {
        showMessage('Invalid last name. Only letters and spaces are allowed.', 'red');
        return;
    }

    }
    // Validation for phone
    var phone = document.getElementById('phone').value.trim();
    var phoneRegex = /^\d{14}$/;
    if (!phoneRegex.test(phone)) {
        showMessage('Invalid phone number. Please enter a 10-digit number.', 'red');
        return;
    }

    var email = document.getElementById('email').value.trim();
    var emailRegex = /^[^\s@]+@[^\s@]+\.[a-zA-Z]+$/; 
    if (!emailRegex.test(email)) {
        showMessage('Invalid email address.', 'red');
        return;
    }
    // Validation for password
    var password1 = document.getElementById('password').value;
    var password2 = document.getElementById('re-password').value;
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(password1)) {
        showMessage('Password must be at least 8 characters long and include a capital letter, a number, and a symbol.', 'red');
        return;
    }
    if (password1 !== password2) {
        showMessage('Passwords do not match.', 'red');
        return;
    }

    // All validations pass
    showMessage('Registration successful!', 'green');

function showMessage(message, color) {
    var messageElement = document.getElementById('message');
    messageElement.innerHTML = message;
    messageElement.style.color = color;

    // Show the message on the page
    setTimeout(function() {
        messageElement.innerHTML = '';
    }, 3000); // Clear the message after 3 seconds
}
