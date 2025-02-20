<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    require_once 'connect.php';

    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $name = $_POST['user'];
    $pass = $_POST['pass'];

    try {
        $stmt = $conn->prepare("UPDATE user2025 SET fname = :fname, lname = :lname, user = :user, pass = :pass WHERE user_id = :user_id");
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':user', $name);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $stmt->execute();

        echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

        if ($stmt->rowCount() > 0) {
            echo '<script>
                setTimeout(function() {
                    swal({
                        title: "แก้ไขข้อมูลสำเร็จ",
                        text: "อิอิ",
                        type: "success"
                    }, function() {
                        window.location = "menu.php";
                    });
                }, 1000);
            </script>';
        } else {
            echo '<script>
                setTimeout(function() {
                    swal({
                        title: "ไม่มีการเปลี่ยนแปลงข้อมูล",
                        text: "แย่จัง",
                        type: "info"
                    }, function() {
                        window.location = "edit.php?user_id='.$user_id.'";
                    });
                }, 1000);
            </script>';
        }
    } catch (PDOException $e) {
        echo '<script>
            setTimeout(function() {
                swal({
                    title: "เกิดข้อผิดพลาด",
                    text: "'.$e->getMessage().'",
                    type: "error"
                }, function() {
                    window.location = "edit.php?user_id='.$user_id.'";
                });
            }, 1000);
        </script>';
    }

    $conn = null;
} else {
    header("Location: menu.php");
    exit();
}
?>
