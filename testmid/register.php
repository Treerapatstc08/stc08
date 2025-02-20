<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('https://cdn.europosters.eu/image/750/wall-murals/the-batman-2022-i124463.jpg'); /* ใส่ URL รูปภาพที่ต้องการ */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
            padding: 15px;
        }

        .signup-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .signup-container h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .signup-container form {
            display: flex;
            flex-direction: column;
        }

        .signup-container input {
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .signup-container input:focus {
            border-color: rgb(199, 54, 54);
            box-shadow: 0 0 8px rgba(206, 15, 15, 0.6);
            outline: none;
        }

        .signup-container button {
            background: rgb(206, 70, 70);
            color: #fff;
            padding: 12px 15px;
            margin-top: 10px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s;
        }

        .signup-container button:hover {
            background: rgb(227, 77, 77);
            transform: scale(1.03);
        }

        .signup-container .login-link {
            display: inline-block;
            margin-top: 10px;
            font-size: 14px;
            text-decoration: none;
            color: rgb(206, 70, 70);
            transition: color 0.3s ease;
        }

        .signup-container .login-link:hover {
            color: rgb(227, 77, 77);
        }

        @media (max-width: 480px) {
            .signup-container {
                padding: 15px 20px;
            }

            .signup-container h2 {
                font-size: 20px;
            }

            .signup-container input,
            .signup-container button {
                font-size: 14px;
            }
        }
    </style>
    <script>
        function validateForm(event) {
            const user = document.querySelector('input[name="user"]').value.trim();
            const pass = document.querySelector('input[name="pass"]').value.trim();
            const fname = document.querySelector('input[name="fname"]').value.trim();
            const lname = document.querySelector('input[name="lname"]').value.trim();

            if (!user || !pass || !fname || !lname) {
                alert('กรุณากรอกข้อมูลทุกช่อง');
                event.preventDefault();
                return false;
            }

            if (/\s/.test(user) || /\s/.test(pass)) {
                alert('Username และ Password ห้ามมีช่องว่าง');
                event.preventDefault();
                return false;
            }

            if (user.length < 3 || user.length > 20) {
                alert('Username ต้องมีความยาวระหว่าง 3-20 ตัวอักษร');
                event.preventDefault();
                return false;
            }

            if (pass.length < 6) {
                alert('Password ต้องมีความยาวอย่างน้อย 6 ตัวอักษร');
                event.preventDefault();
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="signup-container">
        <h2>สมัครสมาชิก</h2>
        <form action="register_pross.php" method="POST" onsubmit="validateForm(event)">
            <input type="text" name="user" placeholder="Username" required>
            <input type="password" name="pass" placeholder="Password" required>
            <input type="text" name="fname" placeholder="ชื่อ" required>
            <input type="text" name="lname" placeholder="นามสกุล" required>
            <button type="submit">ตกลง</button>
            <center><a href="index.php" class="login-link">คุณมีบัญชีแล้ว?</a></center>
        </form>
    </div>
</body>
</html>
