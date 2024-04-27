function validateLogin() {
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();

    if (email === '') {
        alert('Please enter your email');
        return;
    }

    if (password === '') {
        alert('Please enter your password');
        return;
    }
    alert('Login successful!');
}

    