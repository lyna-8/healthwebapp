<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sport_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    if (password_verify($password, $user["password"])) {
        // ✅ تم تسجيل الدخول بنجاح
        $_SESSION["username"] = $user["username"];
        $_SESSION["email"] = $user["email"];
        
        header("Location: dashboard.php"); // التوجيه للوحة التحكم
        exit;
    } else {
        echo "❌ Invalid password.";
    }
} else {
    echo "❌ Email not found.";
}

$conn->close();
?>
