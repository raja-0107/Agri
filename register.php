<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "agri_project");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'] ?? '';
$phoneno = $_POST['phoneno'] ?? '';
$email = $_POST['email'] ?? '';
$address = $_POST['Address'] ?? '';
$password = $_POST['password'] ?? '';

// Check for empty fields
if (empty($username) || empty($phoneno) || empty($email) || empty($address) || empty($password)) {
    echo "<script>alert('⚠️ All fields are required.'); window.history.back();</script>";
    exit();
}

// Check if username already exists
$check = $conn->prepare("SELECT * FROM register WHERE username = ?");
$check->bind_param("s", $username);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    echo "<script>alert('❌ Username already exists. Please choose another one.'); window.history.back();</script>";
    exit();
}

// Insert into register table
$register = $conn->prepare("INSERT INTO register (username, phoneno, email, address, password) VALUES (?, ?, ?, ?, ?)");
$register->bind_param("sssss", $username, $phoneno, $email, $address, $password);

if ($register->execute()) {
    // Insert into login table
    $login = $conn->prepare("INSERT INTO login (username, password) VALUES (?, ?)");
    $login->bind_param("ss", $username, $password);
    $login->execute();

    echo "<script>alert('✅ Registration successful!'); window.location.href = 'placed.html';</script>";
} else {
    echo "<script>alert('❌ Registration failed.'); window.history.back();</script>";
}

$check->close();
$register->close();
$conn->close();
?>
