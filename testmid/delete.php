<?php 
if(isset($_GET['user_id'])){
require_once 'connect.php';

$user_id = $_GET['user_id'];
$stmt = $conn->prepare('DELETE FROM user2025 WHERE user_id=:user_id');
$stmt->bindParam(':user_id', $user_id , PDO::PARAM_INT);
$stmt->execute();

echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

  if($stmt->rowCount() ==1){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "ลบข้อมูลสำเร็จ",
                  text: "ลบข้อมูลได้แต่ลบเขาออกไปไม่ได้หรอก",
                  type: "success"
              }, function() {
                  window.location = "menu.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }else{
       echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "menu.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
$conn = null;
}
?>