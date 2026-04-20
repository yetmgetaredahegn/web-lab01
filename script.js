document.getElementById('regForm')?.addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    if (password.length < 8) {
        alert("Security Note: Password must be at least 8 characters.");
        e.preventDefault();
    }
});
