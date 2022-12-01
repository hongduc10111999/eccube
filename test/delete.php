<?php
        session_start();
        include "conn.php";
    ?>
<?php
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM user WHERE ID = $id";
        $db = $conn->query($sql);
        echo 1;
    } else {
        echo 0;
    }
?>