<?php
    include("config/autoload.php");


    if( isset($_POST["btn-register"]) ) {
        $member_name = $_POST["member_name"];
        $member_lname = $_POST["member_lname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

        $sql = "SELECT * FROM member WHERE username='".$username."' ";
        $rs = $DATABASE->QueryObj($sql);
        if( sizeof($rs)>0 ) {
            echo '
                <script>
                    alert("ชื่อผู้ใช้ซ้ำกัน");
                </script>
            ';
            LinkTo("register.php");
        }


        $member_id = $DATABASE->QueryMaxId("member", "member_id"); //"4";

        $sql = "
            INSERT INTO `member` (
                `member_id`, 
                `member_name`, 
                `member_lname`, 
                `username`, 
                `password`
            ) VALUES (
                '".$member_id."',
                '".$member_name."',
                '".$member_lname."',
                '".$username."',
                '".$password."'
            )
        ";
        if( $DATABASE->Query($sql) ) {
            LinkTo("./login.php");
        } else {
            echo '
                <script>
                    alert("สมัครสมาชิกไม่สำเร็จ");
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

    });

    function checkPassword() {
        var password = $("#password").val();
        var password2 = $("#password2").val();
        if (password == password2) {
            return true;
        } else {
            $("#password, #password2").addClass("is-invalid");
            return false;
        }
    }
    </script>
</head>

<body>
    <form action="" method="post" style="width: 400px; margin: auto; margin-top: 60px;"
        onsubmit="return checkPassword()">
        <div class="form-group">
            <label for="member_name">ชื่อ</label>
            <input type="text" class="form-control" id="member_name" name="member_name">
        </div>
        <div class="form-group">
            <label for="member_lname">นามสกุล</label>
            <input type="text" class="form-control" id="member_lname" name="member_lname">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input type="password" class="form-control" id="password2" name="password2">
        </div>
        <a href="./login.php" class="btn btn-link"><i class="fas fa-arrow-left"></i> กลับสู่หน้าเข้าสู่ระบบ</a>
        <button type="submit" name="btn-register" class="btn btn-primary">
            <i class="fas fa-user-plus"></i>
            สมัครสมาชิก</button>
    </form>
</body>

</html>