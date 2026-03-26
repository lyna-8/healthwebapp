<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sport_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST["username"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT); // تشفير كلمة السر

// التحقق من عدم وجود نفس البريد الإلكتروني مسبقاً
$check = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
    echo "❌ Email already exists. Try with another.";
} else {
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        // إنشاء الحساب بنجاح وتوجيه المستخدم لصفحة login
        header("Location: login.php");
        exit;
    } else {
        echo "❌ Error: " . $conn->error;
    }
}

$conn->close();
?>
