<?php
    include("config/autoload.php");


    if( isset($_POST["btn-login"]) ) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM member WHERE username='".$username."' AND password='".$password."' ";
        $rs = $DATABASE->QueryObj($sql);
        if( sizeof($rs)==1 ) {
            $_SESSION["username"] = $username;
            LinkTo("./");
        } else {
            echo '
                <script>
                    alert("รหัสไม่ถูกต้อง");
                </script>
            ';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- jquery -->
    <script src="assets/jquery/jquery-3.2.1.min.js"></script>
    <!-- popper -->
    <script src="assets/popper/popper.min.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <title>ระบบการกจัดการห้องสมุด</title>
    <link rel="shortcut icon" href="images/book.png">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <!-- index -->
    <link rel="stylesheet" href="assets/index.css">
    <script src="assets/index.js"></script>
    <script>
    $(function() {
        $("#showpassword").click(function() {
            var val = $(this).prop("checked");
            if (val == true) {
                $("#password").attr("type", "text");
            } else {
                $("#password").attr("type", "password");
            }
        });
    });
    </script>
</head>

<body>
    <form action="" method="post" style="width: 300px; margin: auto; margin-top: 60px;">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="showpassword">
            <label class="form-check-label" for="showpassword">แสดงรหัสผ่าน</label>
        </div>
        <button type="submit" name="btn-login" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>
            Login</button>
        <a href="./register.php" class="btn btn-link"><i class="fas fa-user-plus"></i> Register</a>
    </form>
</body>

</html>