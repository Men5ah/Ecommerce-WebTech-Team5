const firstName = document.getElementById('firstName');
const nameReg = /^[^\d\s]+$/;
const lastName = document.getElementById('lastName');
const email = document.getElementById('email');
const emailReg = /^[^\s@]+@[^\s@]+\.[a-zA-Z]+$/;
const password = document.getElementById('password');
const rePassword = document.getElementById('re-password');
const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/;
const phone = document.getElementById('phone');
const phoneRegex = /^(\+\d{1,3}[\s-]?)?(\(\d{2,3}\)[\s-]?)?[\d\s-]{6,}$/;
const btn = document.getElementById('registerBtn');

btn.addEventListener( "click", function(event){
    validateNames(event)
    validateEmail(event)
    validatePasswords(event)
    validatePhone(event)
});

function validateNames(event){
    if(firstName.value == '' || lastName.value == ''){
        alert("Enter your names")
        event.preventDefault();
    } else if (!nameReg.test(firstName.value) && !nameReg.test(lastName.value)) {
        alert("Use only letters and special characters for your names. No spaces");
        event.preventDefault();
    }
}
function validateEmail(event){
    if(email.value == ""){
        alert("Please enter an e-mail address.")
        event.preventDefault();
    } else if(!emailReg.test(email.value)){
        alert("Please enter a valid e-mail address.");
        event.preventDefault();
    }
}

function validatePasswords(event){
    if(password.value==''){
        alert("Please enter a password")
        event.preventDefault();
    } else if(!passwordRegex.test(password.value)){
        alert("Password must be at least 8 characters long and include a capital letter, a number, and a symbol.")
        event.preventDefault();
    }

    if(password.value!=rePassword.value){
        alert("Your passwords don't match.")
        event.preventDefault();
    }
}

function validatePhone(event){
    if(phone.value==''){
        console.log(phone.value);
        alert("Please enter a phone number")
        event.preventDefault();
    } else if(!phoneRegex.test(phone.value)){
        alert("Please enter a valid phone number")
        event.preventDefault();
    }
}