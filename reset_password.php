<?php
$conn = new mysqli("localhost", "root", "", "sport_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["token"])) {
    $token = $_GET["token"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token=? AND token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<h3 style='color:red; text-align:center;'>The link is invalid or has expired.</h3>";
        exit;
    }

    // Show password reset form with styling
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <title>Reset Password</title>
        <style>
            body {
                background: #f3f4f6;
                font-family: Arial, sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .reset-box {
                background: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                width: 100%;
                max-width: 400px;
                text-align: center;
            }
            input[type="password"], input[type="submit"] {
                width: 100%;
                padding: 12px;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 16px;
            }
            input[type="submit"] {
                background-color: #007bff;
                color: white;
                cursor: pointer;
                border: none;
                transition: background-color 0.3s ease;
            }
            input[type="submit"]:hover {
                background-color: #0056b3;
            }
            h2 {
                margin-bottom: 20px;
                color: #333;
            }
        </style>
    </head>
    <body>
        <div class="reset-box">
            <h2>Reset Your Password</h2>
            <form method="POST">
                <input type="hidden" name="token" value="' . htmlspecialchars($token) . '">
                <input type="password" name="new_password" placeholder="Enter new password" required>
                <input type="submit" value="Reset Password">
            </form>
        </div>
    </body>
    </html>
    ';
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["token"], $_POST["new_password"])) {
    $token = $_POST["token"];
    $new_password = password_hash($_POST["new_password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET password=?, reset_token=NULL, token_expiry=NULL WHERE reset_token=?");
    $stmt->bind_param("ss", $new_password, $token);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<h3 style='color:green; text-align:center;'>Your password has been successfully reset. You can now log in.</h3>";
    } else {
        echo "<h3 style='color:red; text-align:center;'>An error occurred. Please try again.</h3>";
    }
}
?>
