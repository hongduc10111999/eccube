<?php 
    session_start();
    echo "đăng xuất thành công";
    session_destroy(); // xoá toàn bộ session
    //unset($_SESSION['name'], $_SESSION['pass'],$_SESSION['user']); // chỉ xoá session nào thì dùng đường dẫn đấy
    // header("location: login.php")
    echo "<br>";
?>
    <a href="login.php">trở về login</a>
<?php
?>