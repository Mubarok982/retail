<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Retail App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            /* Background gradien yang bersih */
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 380px;
            text-align: center;
            animation: slideUp 0.9s ease-in-out;
        }

        /* Styling untuk SVG Toko */
        .store-icon {
            width: 120px; /* Ukuran ikon SVG */
            margin-bottom: 1rem; /* Jarak bawah dari judul */
        }

        .login-box h1 {
            color: #1a1a1a;
            font-weight: 600;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .login-box h1 span {
            color: #007bff;
            font-weight: 700;
        }

        .login-box p {
            margin-bottom: 25px;
            color: #555;
            font-size: 15px;
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .input-group i {
            position: absolute;
            top: 50%;
            left: 18px;
            transform: translateY(-50%);
            color: #888;
            transition: color 0.3s;
        }

        .input-group input {
            width: 100%;
            padding: 14px 18px 14px 50px;
            background: #f0f4f8;
            border: 2px solid transparent;
            border-radius: 30px;
            outline: none;
            font-size: 15px;
            transition: all 0.3s;
            color: #333;
        }

        .input-group input:focus {
            background: #fff;
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
        }

        .input-group:focus-within i {
            color: #007bff;
        }

        .btn-login {
            background: linear-gradient(45deg, #007bff, #0056d2);
            border: none;
            color: white;
            padding: 14px 0;
            width: 100%;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        }

        .btn-login:hover, .btn-login:focus {
            background: linear-gradient(45deg, #0056d2, #0038a8);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 86, 210, 0.4);
            outline: none;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-error {
            color: #D8000C;
            background-color: #FFD2D2;
            border: 1px solid #D8000C;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-box">

        <svg class="store-icon" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path d="M 20 70 C 40 50, 160 50, 180 70 Z" fill="#4FC3F7"/>
            <rect x="25" y="70" width="150" height="100" fill="#FFC107"/>
            <path d="M20,80 l160,0 l-15,20 l-130,0 z" fill="#FFFFFF"/>
            <path d="M22,80 l20,0 l-7,20 l-20,0 z" fill="#F44336"/>
            <path d="M62,80 l20,0 l-7,20 l-20,0 z" fill="#F44336"/>
            <path d="M102,80 l20,0 l-7,20 l-20,0 z" fill="#F44336"/>
            <path d="M142,80 l20,0 l-7,20 l-20,0 z" fill="#F44336"/>
            <rect x="80" y="110" width="40" height="60" fill="#8BC34A"/>
            <circle cx="88" cy="140" r="3" fill="#FFFFFF"/>
            <circle cx="52" cy="120" r="15" fill="#4DD0E1" stroke="#FFFFFF" stroke-width="3"/>
            <circle cx="148" cy="120" r="15" fill="#4DD0E1" stroke="#FFFFFF" stroke-width="3"/>
        </svg>

        <h1><span>Retail</span>App</h1>
        <p>Manage Toko Anda Dengan Mudah Di Sini</p>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert-error">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('auth/login') ?>" method="post">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
</body>
</html>