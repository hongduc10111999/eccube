<?php
    session_start();
    include "conn.php";
?>

<?php
    $pass = ($_POST["pass"]);
    $email = ($_POST["email"]);
    if (isset($_POST["email"]) && isset($_POST["pass"])) {
        if (!empty($email) && !empty($pass)) {
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $usersql = array();
            $db = $conn->query($sql);
            $row = mysqli_fetch_array($db);
            if (mysqli_num_rows($db) == 0 || $pass != $row["password"]) {
                echo json_encode(array(
                    'status' => 0,
                    'message' => 'Thông tin đăng nhập không đúng'
                ));
            } else if ($email == $row["email"] && $pass == $row["password"]) {
                if ($row["status"] >= 1) {
                    //echo 'thanh cong';
                    echo json_encode(array(
                        'status' => 1,
                        'message' => 'Đăng nhập thành công'
                    ));
                    $_SESSION['user'] = $row;
                    $_SESSION['email'] = $email;
                    $_SESSION['pass'] = $pass;
                    //header("location: index.php");
                } else {
                    echo json_encode(array(
                        'status' => 2,
                        'message' => 'Bạn chưa được cấp quyền'
                    ));
                }
            }
        }
    }
?>