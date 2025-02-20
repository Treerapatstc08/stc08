<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('https://www.icegif.com/wp-content/uploads/2023/09/icegif-424.gif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #333;
            padding: 10px;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            color: #333;
            text-align: center;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            margin-bottom: 1rem;
            padding: 0.8rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .login-container input:focus {
            border-color: rgb(199, 24, 24);
            outline: none;
            box-shadow: 0 0 6px rgba(243, 0, 0, 0.7);
        }

        .login-container button {
            padding: 0.8rem;
            font-size: 1rem;
            color: #fff;
            background: linear-gradient(135deg, rgb(224, 92, 92), rgb(141, 9, 9));
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .login-container button:hover {
            background: linear-gradient(135deg, rgb(143, 19, 19), rgb(214, 119, 119));
            transform: scale(1.03);
        }

        .signup-link {
            display: block;
            margin-top: 1rem;
            text-align: center;
            font-size: 0.9rem;
            color: #555;
            text-decoration: none;
            transition: color 0.3s;
        }

        .signup-link:hover {
            color: rgb(214, 7, 42);
        }

        @media (max-width: 576px) {
            .login-container {
                padding: 1.5rem;
            }

            .login-container h2 {
                font-size: 1.6rem;
            }

            .login-container input[type="text"],
            .login-container input[type="password"] {
                padding: 0.7rem;
                font-size: 0.9rem;
            }

            .login-container button {
                padding: 0.7rem;
                font-size: 0.9rem;
            }

            .signup-link {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>

<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<div class="login-container">
    <h2>Login</h2>
    <form action="login_process.php" method="POST">
        <input type="text" name="user" placeholder="Username" required>
        <input type="password" name="pass" placeholder="Password" required>
        <button type="submit">Login</button>
        <a href="register.php" class="signup-link">คุณต้องการสมัครบัญชี?</a>
    </form>
</div>

</body>
</html>
