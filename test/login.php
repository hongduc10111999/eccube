<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>

        form {
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

    <?php
    session_start();
    include "conn.php";

    ?>

    <?php
    $email = $pass = "";
    if (empty($_SESSION['user'])) {
    ?>
        <h2>PHP Form </h2>
        <form id="login_form" method="post">
            <div class="mb-3">
                <label  for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="pass" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Login</button>
        </form>
    <?php
    } else {
        header("location: index.php");
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>      
        $("#login_form").submit(function(event) {
            //alert( "Handler for .submit() called." );
            event.preventDefault(); // chống lại những phần submit khác
            $.ajax({
                type: "POST",
                url: 'action.php',
                data: $(this).serializeArray(), // lấy dữ liệu tại trang này
                success: function(res) { //dữ liệu trả về
                    res = JSON.parse(res); //nhận vào một chuỗi JSON và chuyển nó thành một đối tượng JS
                    //console.log("res : " , res);
                    if (res.status == 0) {
                        alert(res.message);
                    }
                    if (res.status == 1) {
                        alert(res.message);
                        location.reload();
                    }
                    if (res.status == 2) {
                        alert(res.message);
                    }
                    
                },
                //dataType: dataType
            });
            $.ajax({
                type: "POST",
                url: 'checklogin.php',
                data: $(this).serializeArray(),
                success: function(res) {
                    res = JSON.parse(res);
                    if (res.status == 0) {
                        alert(res.message);
                    }
                    if (res.status == 1) {
                        alert(res.message);
                        location.reload();
                    }
                    if (res.status == 2) {
                        alert(res.message);
                    }
                },
            });
        });
    </script>
</body>

</html>