function validateSignup() {
    var username = document.getElementById('username').value.trim();
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();

    if (username === '') {
        alert('Please enter your username');
        return;
    }
    if (email === '') {
        alert('Please enter your email');
        return;
    }

    if (password === '') {
        alert('Please enter your password');
        return;
    }
    alert('Registered successfully!');
}

    