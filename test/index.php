<?php
session_start();
include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        html {
            
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        table {
            text-align: center;
        }
        .form_insert {
            width: 300px;
            margin-left: 50%;
            transform: translateX(-50%);
        }
        form button {
            margin-left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>

<body>
    
    <div class="container">
    <?php
    if (isset($_SESSION['user'])) {
        echo "Xin chào {$_SESSION['email']}";
    ?>
        <br>
        <a href="logout.php">Đăng xuất</a>
        <h3>INSERT DATA</h3>
        <form id="insert_data" method="POST" class="form_insert">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input id="email" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input id="pass" name="pass" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button name="them" type="submit" class="btn btn-success">Create</button>
        </form>

        <h3>LOAD DATA</h3>
        <div id="load_data">

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="main.js"></script>

    <?php
    } else {
        echo "bạn chưa đăng nhâp"
    ?>
        <br>
        <a href="login.php">Trở về đăng nhập</a>
    <?php
    }
    ?>

        
</body>

</html>