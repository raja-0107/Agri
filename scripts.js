document.getElementById("loginBtn").addEventListener("click", function() {
    document.getElementById("loginForm").style.display = "block";
    document.getElementById("signupForm").style.display = "none";
});

document.getElementById("signupBtn").addEventListener("click", function() {
    document.getElementById("signupForm").style.display = "block";
    document.getElementById("loginForm").style.display = "none";
});

// Default view is the login form
document.getElementById("loginForm").style.display = "block";
document.getElementById("signupForm").style.display = "none";
