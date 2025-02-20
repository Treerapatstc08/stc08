<?php
session_start();
if(isset($_POST['user'])){
    require_once 'connect.php';

    $name = $_POST['user'];
    $pass = $_POST['pass'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $stmt = $conn->prepare("INSERT INTO user2025 (user, pass, fname, lname)
    VALUES (:user, :pass, :fname, :lname)");
    $stmt->bindParam(':user', $name , PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass , PDO::PARAM_STR);
    $stmt->bindParam(':fname', $fname , PDO::PARAM_STR);
    $stmt->bindParam(':lname', $lname , PDO::PARAM_STR);
    $result = $stmt->execute();

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if($result){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มข้อมูลสำเร็จ",
                  text: "ไปล็อกอินได้เลยยยย!",
                  type: "success"
              }, function() {
                  window.location = "index.php";
              });
            }, 1000);
        </script>';
    }else{
       echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  text: "หว่าแย่จังลองใหม่อีกรอบ",
                  type: "error"
              }, function() {
                  window.location = "register.php";
              });
            }, 1000);
        </script>';
    }
    $conn = null;
}
?>
