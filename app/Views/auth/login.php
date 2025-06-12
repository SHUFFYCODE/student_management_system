<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Student System</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: rgb(77, 65, 82);
      display: flex;
      justify-content: flex-start;
      height: 100vh;
    }

    .left-panel {
      width: 100%;
      max-width: 500px;
      background-color: rgb(193, 168, 201);
      padding: 60px 40px;
      box-shadow: 2px 0 10px rgba(41, 54, 126, 0.05);
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .login-header {
      font-size: 28px;
      font-weight: 600;
      color: #222;
      margin-bottom: 30px;
    }

    label {
      display: block;
      margin-top: 20px;
      margin-bottom: 8px;
      font-size: 15px;
      color: #333;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      transition: border-color 0.3s ease;
    }

    input:focus {
      border-color: rgb(82, 97, 129);
      outline: none;
    }

    button {
      margin-top: 30px;
      width: 100%;
      padding: 12px;
      background-color: rgb(62, 71, 90);
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: rgb(116, 44, 44);
    }

    .alert {
      background-color: #fdecea;
      color: #b13a2f;
      padding: 10px;
      border-radius: 5px;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .register-link {
      margin-top: 25px;
      font-size: 14px;
      text-align: center;
    }

    .register-link a {
      color: rgb(33, 52, 94);
      text-decoration: none;
    }
  </style>
</head>
<body>

  <div class="left-panel">
    <div class="login-header">Good Day, User!</div>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="/login-check" method="post">
  <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
  <label for="username">Username</label>
  <input type="text" name="username" required>


  <label for="password">Password</label>
  <input type="password" name="password" required>


  <button type="submit">Login</button>
</form>


    <div class="register-link">
      Don't have an account? <a href="/register">Register here</a>
    </div>
  </div>

</body>
</html>
