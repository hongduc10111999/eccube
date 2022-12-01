<?php
    session_start();
    include "conn.php";
?>  

<?php
    
    if (isset($_POST["email"]) && isset($_POST["pass"])) {
        $pass = ($_POST["pass"]);
        $email = ($_POST["email"]);
        $sql = "SELECT * FROM user WHERE email = '$email'"; 
        $db = $conn->query($sql);
        $row = mysqli_fetch_assoc($db);
        if($row > 0){
            echo json_encode(array(
                'status' => 0,
                'message' => 'Email đã tồn tại'
            ));
        } else if($email != "" && $pass != "") {
            
            $db1 = $conn->query($sql1);
            echo json_encode(array(
                'status' => 1,
                'message' => 'Thêm dữ liệu thành công'
            ));
        }
    }
?>

