<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>แก้ไขข้อมูล</title>
    <style>
      body {
        height: 100%;
        margin: 0;
        font-family: 'Arial', sans-serif;
        background-image: url('https://m.media-amazon.com/images/S/pv-target-images/97b9bca227183b76f77b816a407390dbacdfae709d98764e9709b7286359e279.jpg');
        background-size: cover;
        background-position: center;
        color: #333;
      }

      .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 15px;
      }

      .card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 30px;
        width: 100%;
        max-width: 400px;
      }

      .card h1 {
        font-size: 1.8rem;
        font-weight: bold;
        color: #555;
        text-align: center;
        margin-bottom: 20px;
      }

      label {
        font-weight: bold;
        color: #444;
      }

      .form-control {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        transition: all 0.3s ease;
      }

      .form-control:focus {
        border-color: rgb(235, 116, 116);
        box-shadow: 0 0 6px rgba(196, 33, 33, 0.6);
      }

      .btn-primary {
        background: linear-gradient(to right, rgb(235, 116, 116), rgb(202, 46, 46));
        border: none;
        color: white;
        padding: 10px 15px;
        font-size: 1rem;
        font-weight: bold;
        border-radius: 8px;
        transition: background 0.3s ease;
        width: 100%;
        margin-top: 10px;
      }

      .btn-primary:hover {
        background: linear-gradient(to right, rgb(206, 129, 129), rgb(168, 19, 19));
      }

      .alert {
        text-align: center;
        font-size: 1.1rem;
        font-weight: bold;
        color: white;
        background: #e74c3c;
        border-radius: 8px;
        padding: 10px;
      }

      @media (max-width: 576px) {
        .card {
          padding: 20px;
        }

        .card h1 {
          font-size: 1.5rem;
        }

        .form-control {
          padding: 8px;
        }

        .btn-primary {
          font-size: 0.9rem;
          padding: 8px;
        }
      }
    </style>
  </head>
  <body>
    <?php
    $user_id = $_GET['user_id'] ?? null;
    if ($user_id) {
        require_once 'connect.php';
        $stmt = $conn->prepare("SELECT * FROM user2025 WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            header("refresh:1; url=menu.php");
            exit();
        }
    ?>
    <div class="container">
      <div class="card">
        <h1>ฟอร์มแก้ไขข้อมูล</h1>
        <form action="edit_db.php" method="POST">
          <input type="hidden" name="user_id" value="<?= htmlspecialchars($row['user_id']); ?>">
          <div class="mb-3">
            <label for="fname">ชื่อ:</label>
            <input type="text" name="fname" class="form-control" required value="<?= htmlspecialchars($row['fname']); ?>" minlength="1">
          </div>
          <div class="mb-3">
            <label for="lname">นามสกุล:</label>
            <input type="text" name="lname" class="form-control" required value="<?= htmlspecialchars($row['lname']); ?>" minlength="1">
          </div>
          <div class="mb-3">
            <label for="user">Username:</label>
            <input type="text" name="user" class="form-control" required value="<?= htmlspecialchars($row['user']); ?>" minlength="1">
          </div>
          <div class="mb-3">
            <label for="pass">Password:</label>
            <input type="text" name="pass" class="form-control" required value="<?= htmlspecialchars($row['pass']); ?>" minlength="1">
          </div>
          <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
        </form>
      </div>
    </div>
    <?php
    } else {
        echo "<div class='container'><div class='alert'>ไม่พบข้อมูล user_id</div></div>";
    }
    ?>
  </body>
</html>
