<?php 
session_start();
session_destroy();

echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

echo '<script>
          setTimeout(function() {
           swal({
               title: "Logout Complete",
               text: "ขอบคุณครับ",
               type: "success"
           }, function() {
               window.location = "index.php"; // หน้าที่ต้องการให้เปลี่ยนไป
           });
         }, 1000);
     </script>';
?>
