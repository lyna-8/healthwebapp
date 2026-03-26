<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #a8e6a3, #d0f5c1); /* خلفية خضراء فاتحة */
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-container {
      background: white; /* لون أبيض للإطار */
      border-radius: 20px;
      padding: 50px 40px;
      width: 400px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease;
    }

    .form-container:hover {
      transform: scale(1.02);
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
    }

    input {
      width: 100%;
      padding: 14px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      outline: none;
      transition: transform 0.2s ease;
    }

    input:hover,
    input:focus {
      transform: scale(1.03);
    }

    button {
  width: 100%;
  padding: 14px;
  background-color: #12642d;
  color: white;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
  background-color: #0f4f23;
  transform: scale(1.05);
}


    .home-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #333;
      text-decoration: none;
      font-size: 14px;
    }

    .home-link:hover {
      color: #0b3e19;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Sign Up</h2>
    <form action="signup_process.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Create Account</button>
    </form>
    <a class="home-link" href="index.html">← Back to Home</a>
  </div>
</body>
</html>
