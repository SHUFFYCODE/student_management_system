<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login | Student System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />


  <style>
    body {
      background-color: #4d4152;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }


    .card {
      border-radius: 1rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }


    .card-header {
      background-color: #c1a8c9;
      border-bottom: none;
      border-radius: 1rem 1rem 0 0;
      text-align: center;
      color: #333;
      font-weight: bold;
      font-size: 1.5rem;
      padding: 1.5rem 1rem;
    }


    .logo {
      display: block;
      margin: 0 auto 15px auto;
      max-width: 100px;
    }


    .form-control:focus {
      box-shadow: none;
      border-color: #8260a5;
    }


    .btn-primary {
      background-color: #3e475a;
      border: none;
    }


    .btn-primary:hover {
      background-color: #742c2c;
    }


    .register-link a {
      color: #223466;
      text-decoration: none;
    }


    .register-link a:hover {
      text-decoration: underline;
    }


    .form-check-label {
      margin-left: 0.25rem;
    }


    .input-group-text {
      cursor: pointer;
    }
  </style>
</head>
<body>


  <div class="card p-4" style="width: 100%; max-width: 420px;">
    <div class="card-header">     
      Good Day, User!
    </div>


    <div class="card-body">
      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger text-center">
          <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>


      <form action="/login-check" method="post">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">


        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" class="form-control" name="username" id="username" required>
          </div>
        </div>


        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" class="form-control" name="password" id="password" required>
            <span class="input-group-text" onclick="togglePassword()">
              <i class="bi bi-eye" id="toggleIcon"></i>
            </span>
          </div>
        </div>


        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
          <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>


        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>


      <div class="text-center mt-3 register-link">
        Don't have an account? <a href="/register">Register here</a>
      </div>
    </div>
  </div>


  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const toggleIcon = document.getElementById('toggleIcon');


      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('bi-eye');
        toggleIcon.classList.add('bi-eye-slash');
      } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('bi-eye-slash');
        toggleIcon.classList.add('bi-eye');
      }
    }
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


