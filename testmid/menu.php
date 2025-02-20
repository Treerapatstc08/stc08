<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>หน้าแรก</title>
    <style>
      body {
        font-family: 'Arial', sans-serif;
        background-image: url('https://cdn.mos.cms.futurecdn.net/Xnb4HEar447wmhJJjuRkMY.jpg'); /* ใส่ URL รูปภาพที่ต้องการ */
    background-size: cover; /* ให้รูปภาพครอบคลุมพื้นที่ทั้งหมด */
    color: #333;
      }
      header {
        background-color: rgb(173, 19, 19);
        color: white;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
      }
      header .logo {
        font-size: 1.5rem;
        font-weight: bold;
      }
      header .nav-links button {
        background-color: rgb(219, 52, 52);
        color: white;
        border: none;
        padding: 10px 20px;
        margin: 5px;
        border-radius: 5px;
        font-size: 1em;
        cursor: pointer;
      }
      header .nav-links button:hover {
        background-color: rgb(185, 41, 41);
      }
      h1 {
        font-size: 2rem;
        text-align: center;
        margin-bottom: 20px;
        color: rgb(255, 255, 255);
      }
      .container {
    padding: 20px;
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.8); /* เพิ่มความโปร่งใส */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  .table {
    background-color: rgba(255, 255, 255, 0.9); /* พื้นหลังตารางโปร่งใส */
  }
  .table th {
    background-color: rgba(0, 0, 0, 0.8); /* เพิ่มความโปร่งใสให้หัวตาราง */
    color: white;
    text-align: center;
  }
  .table td {
    text-align: center;
    vertical-align: middle;
  }
      .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
      }
      .btn-warning:hover {
        background-color: #e0a800;
      }
      .btn-danger {
        background-color: rgb(255, 0, 25);
      }
      @media (max-width: 768px) {
        header {
          flex-direction: column;
          align-items: flex-start;
        }
        header .nav-links {
          width: 100%;
          display: flex;
          justify-content: space-around;
        }
        header .nav-links button {
          flex: 1;
          margin: 5px;
        }
        h1 {
          font-size: 1.5rem;
        }
      }
    </style>
  </head>
  <body>
    <header>
      <div class="logo">STC08 Treerapat Sriart</div>
      <nav class="nav-links">
        <button onclick="document.location='add.php'">เพิ่มข้อมูล</button>
        <button onclick="document.location='logout.php'">ออกจากระบบ</button>
      </nav>
    </header>
    <main><br>
      <h1>ข้อมูลผู้ใช้</h1>
      <div class="container">
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th>id</th>
                <th>ชื่อ-นามสกุล</th>
                <th>user</th>
                <th>pass</th>
                <th>ดำเนินการ</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once 'connect.php';
              $stmt = $conn->prepare("SELECT * FROM user2025");
              $stmt->execute();
              $result = $stmt->fetchAll();
              foreach ($result as $k) {
              ?>
              <tr>
                <td><?= $k['user_id']; ?></td>
                <td><?= $k['fname'] . ' ' . $k['lname']; ?></td>
                <td><?= $k['user']; ?></td>
                <td><?= $k['pass']; ?></td>
                <td>
                  <a href="edit.php?user_id=<?= $k['user_id']; ?>" class="btn btn-warning btn-sm">แก้ไขข้อมูล</a>
                  <a href="delete.php?user_id=<?= $k['user_id']; ?>" class="btn btn-danger btn-sm">ลบข้อมูล</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </body>
</html>
