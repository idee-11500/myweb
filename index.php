<?php
    include("config/autoload.php");

    if( !isset($_SESSION["username"]) ) {
        LinkTo("login.php");
    }

    $page = ( isset($_GET["page"]) ) ? $_GET["page"] : "home";
?>
<!doctype html>
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
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #46d8ff;">
        <a class="navbar-brand" href="./">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./">หน้าแรก <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?page=about">เกี่ยวกับ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a href="./?page=cart" class="text-dark cart">
                    <i class="fas fa-shopping-cart mr-3"></i>
                    <span id="cart-number">
                        <?php
                            $sql = "  
                                SELECT SUM(qty) as cart_num FROM `cart` WHERE member_id='".$MEMBER["member_id"]."' 
                            ";
                            $rs = $DATABASE->QueryObj($sql);
                            if( sizeof($rs)==1 && $rs[0]["cart_num"]>0 ) {
                                echo '<span class="cart-number">'.$rs[0]["cart_num"].'</span>';
                            }
                        ?>
                    </span>
                </a>
                <div class="mr-4"><?php echo $MEMBER["member_name"]; ?> <?php echo $MEMBER["member_lname"]; ?></div>
                <a href="logout.php" class="btn btn-outline-success my-2 my-sm-0">ออกจากระบบ</a>
            </form>
        </div>
    </nav>
    <div class="container">
        <?php
            include("pages/".$page."/view.php");
        ?>
    </div>
    <div class="footer">
        Footer
    </div>
</body>

</html>