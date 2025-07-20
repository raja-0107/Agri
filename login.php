<?php
$conn = new mysqli("localhost", "root", "", "agri_project");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (!empty($username) && !empty($password)) {
    $stmt = $conn->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        echo "<script>alert('✅ Login successful!'); window.location.href = 'placed.html';</script>";
    } else {
        echo "<script>alert('❌ Invalid username or password!'); window.history.back();</script>";
    }

    $stmt->close();
} else {
    echo "⚠️ Both username and password are required.";
}

$conn->close();
?>
