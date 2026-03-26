<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $conn = new mysqli("localhost", "root", "", "sport_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // تحقق من وجود البريد
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

        $update = $conn->prepare("UPDATE users SET reset_token=?, token_expiry=? WHERE email=?");
        $update->bind_param("sss", $token, $expiry, $email);
        $update->execute();

        $reset_link = "http://localhost/sport/reset_password.php?token=$token";

        // واجهة جميلة لعرض الرابط
        echo '
            <div style="
                margin-top: 30px;
                text-align: center;
                background-color: #f0f9ff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                max-width: 500px;
                margin-left: auto;
                margin-right: auto;
                font-family: Arial, sans-serif;
            ">
               
                <p style="font-size: 16px; color: #333;">
                If your email exists in our system, a password reset link has been sent.
                </p>
                <a href="' . $reset_link . '" 
                   style="display: inline-block; margin-top: 15px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">
                   Click here to reset your password
                </a>
            </div>
        ';
    } // <-- هذا هو القوس الناقص
    
}
?>
