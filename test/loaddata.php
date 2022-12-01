<?php
session_start();
include "conn.php";
?>
<?php
$output = '';
$output.='<form id="edit_form" action="" method="POST">
<table border="1" align="center" class="table" >
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Password</th>
        <th>Status</th>
        <th colspan="2"></th>
    </tr>';
        $sql = "SELECT * FROM user";
        $db = $conn->query($sql);
        if ($db->num_rows > 0) {
            while ($row = mysqli_fetch_array($db)) {
                $output.='
                    <tr>
                        <td>'.$row["ID"].'</td>
                        <td>'.$row["email"].'</td>
                        <td id="pass_text" data-id='.$row["ID"].'>'.$row["password"].'</td>
                        <td contenteditable>'.$row["status"].'</td>
                        <td><button class="sua_click btn btn-warning" value="'.$row["ID"].'">Sửa</button></td>
                        <td><button data-text='.$row["email"].' class="xoa_click btn btn-danger" value="'.$row["ID"].'">Xoá</button></td>
                    </tr>';
            }
        }

$output.='</table>';

echo $output;
?>
