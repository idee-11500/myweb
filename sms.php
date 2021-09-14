<?php
    include("config/autoload.php");

    include("sms.class.php");
    if( isset($_POST["btn-send"]) ) {
        $phone = $_POST["phone"];
        $message = $_POST["message"];

        
        $sms = new thsms();
        $sms->username   = 'khomaru';
        $sms->password   = '7ce884';
        $a = $sms->getCredit();
        // var_dump( $a);
        $b = $sms->send( '0000', $phone, $message);
        if( $b[0] ) {
            echo '
                <script>
                    alert("ส่งเรียบร้อย");
                </script>
            ';
        } else {
            echo '
                <script>
                    alert("No No No");
                </script>
            ';
        }
        // var_dump( $b);
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
</head>

<body>
    <form action="" method="post" style="width: 300px; margin: auto; margin-top: 60px;">
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value=" ">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <input type="text" class="form-control" id="message" name="message">
        </div>
        <button type="submit" name="btn-send" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>
            Send</button>
    </form>
</body>

</html>