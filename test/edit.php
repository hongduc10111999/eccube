<?php
        session_start();
        include "conn.php";
    ?>
<?php
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "SELECT * FROM user WHERE ID = $id";
        $db = $conn->query($sql);
        $row = mysqli_fetch_array($db);
        echo '<table border="1" align="center" class="table">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th colspan="2"></th>
                </tr>
                <tr>
                        <td  style="background-color: rgb(226,226,226) ; color:red">'.$row["ID"].'</td>
                        <td style="background-color: rgb(226,226,226) ; color:red">'.$row["email"].'</td>
                        <td id="pass_text" data-id='.$row["ID"].' contenteditable>'.$row["password"].'</td>
                        <td contenteditable>'.$row["status"].'</td>
                        <td><button class="capnhat btn btn-warning" value="'.$row["ID"].'">Cập nhật</button></td>
                    </tr>
            </table>.'
        ;

    }
?>
<?php
    if(isset($_POST['id']) && isset($_POST['text']) ){
        $id = $_POST['id'];
        $text = $_POST['text'];
        $sql = "UPDATE user SET password = '$text' WHERE ID = $id";
        $db = $conn->query($sql);
    }
?>