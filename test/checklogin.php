<?php
        session_start();
        include "conn.php";
    ?>
    <?php
    // define variables and set to empty values
        $email = $pass = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (($_POST["pass"]) == "" && ($_POST["email"]) == ""){
                echo json_encode(array(
                    'status' => 0,
                    'message' => 'Email và Password không được bỏ trống'
                ));
            }
            else if (empty($_POST["email"])) {
                echo json_encode(array(
                    'status' => 1,
                    'message' => 'Email khônng được bỏ trống'
                ));
            }
            else if (empty($_POST["pass"])) {
                echo json_encode(array(
                    'status' => 2,
                    'message' => 'Password không được bỏ trống'
                ));
            } 
           
        }


    ?>
