<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #e6ffe6; /* خلفية بيضاء */
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-container {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      border-radius: 15px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
      padding: 50px 40px;
      width: 500px;
      transition: transform 0.3s ease;
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .form-group {
      position: relative;
      margin-bottom: 20px;
      transition: transform 0.3s ease;
    }

    .form-group:hover {
      transform: scale(1.03); /* يكبر عند التمرير */
    }

    .form-group input {
      width: 100%;
      padding: 12px 40px 12px 40px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 14px;
      background-color: rgba(255, 255, 255, 0.7);
    }

    .form-group i {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      color: #888;
      font-size: 16px;
    }

    .form-group i.fa-envelope,
    .form-group i.fa-lock {
      left: 12px;
    }

    .toggle-password {
      right: 12px;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #888;
    }

    input[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #28a745 ;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color:#218838 ;
    }

    .links {
      text-align: center;
      margin-top: 10px;
      font-size: 13px;
    }

    .links a {
      color: #2193b0;
      text-decoration: none;
    }

    .home-link {
      display: block;
      margin-top: 15px;
      text-align: center;
      color: #2193b0;
      text-decoration: none;
      font-size: 14px;
    }

    .error-message {
      color: red;
      font-size: 13px;
      display: none;
      margin-bottom: 10px;
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Log In</h2>

    <div class="error-message" id="error-msg">Please fill all fields correctly.</div>

    <form id="login-form" action="login_process.php" method="POST">
      <div class="form-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" required>
      </div>

      <div class="form-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
      </div>

      <input type="submit" value="Login">
    </form>
    <div class="links">
    <a href="forgot_password.html">Forgot Password?</a>
</div>

    

    <a href="index.html" class="home-link">← Back to Home</a>
  </div>

  <script>
    function togglePassword() {
      const pwd = document.getElementById("password");
      const icon = document.querySelector(".toggle-password");
      if (pwd.type === "password") {
        pwd.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        pwd.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }

    document.getElementById("login-form").addEventListener("submit", function(e) {
      const email = this.email.value.trim();
      const password = this.password.value.trim();
      if (email === "" || password.length < 4) {
        e.preventDefault();
        document.getElementById("error-msg").style.display = "block";
      }
    });
  </script>

</body>
</html>
