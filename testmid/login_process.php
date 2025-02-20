<?php
session_start();
$user = $_POST['user'];
$name = $_POST['pass'];

require_once 'connect.php';
$stmt = $conn->prepare("SELECT * FROM user2025 WHERE user = '$user' AND pass = '$name'");
$stmt->execute();
$result = $stmt->fetchALL();
$row = $stmt->rowCount();
if($row < 1) {
 header("refresh:2; url=index.php");
 session_destroy();
}
else {
 foreach($result as $k) {
     $_SESSION['user_id'] = $k['user_id'];
     $_SESSION['user'] = $k['user'];
     $_SESSION['pass'] = $k['pass'];        
 }
 header("refresh:2; url=menu.php");
}
 echo '
 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

         if($result){
     echo '<script>
          setTimeout(function() {
           swal({
               title: "ยินดีต้อนรับ",
               text: "ยินดีต้อนรับ คนเก่งและมีวินัยในการฝึกฝน",
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
               title: "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง",
               text: "นึกดีๆ นะครับ",
               type: "error"
           }, function() {
               window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
           });
         }, 1000);
     </script>';
 }
 $conn = null;
    ?>