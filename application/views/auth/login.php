<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | Retail App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-box {
      background: #fff;
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 360px;
      text-align: center;
      animation: fadeIn 0.8s ease-in-out;
    }

    .login-box h1 {
      color: #2b2b2b;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .login-box h1 span {
      color: #007bff;
    }

    .login-box p {
      margin-bottom: 20px;
      color: #444;
      font-size: 14px;
    }

    .input-group {
      position: relative;
      margin-bottom: 1.2rem;
    }

    .input-group input {
      width: 100%;
      padding: 12px 16px;
      background: #eaf1ff;
      border: none;
      border-radius: 30px;
      outline: none;
      font-size: 14px;
      transition: 0.3s;
    }

    .input-group input:focus {
      background: #dbe9ff;
    }

    .btn-login {
      background: linear-gradient(to right, #007bff, #0056d2);
      border: none;
      color: white;
      padding: 12px 0;
      width: 100%;
      border-radius: 30px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn-login:hover {
      background: linear-gradient(to right, #0056d2, #0038a8);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

  <div class="login-box">
    <h1><span>Retail</span>App</h1>
    <p>Silakan login untuk masuk</p>

    <?php if ($this->session->flashdata('error')): ?>
      <div style="color:red; margin-bottom:10px;">
        <?= $this->session->flashdata('error'); ?>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('auth/login') ?>" method="post">
      <div class="input-group">
        <input type="text" name="username" placeholder="Username" required>
      </div>
      <div class="input-group">
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit" class="btn-login">Login</button>
    </form>
  </div>

</body>
</html>
