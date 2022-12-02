<?php
    include './class/action.php';
    $dbconn = new Cabinet();
    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    
    if (empty($_SESSION['Cabinet']) || empty($_SESSION['username'])) {
        header('Location: login.php');
        print("em");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>
   <!--start banner -->
   <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <img src="img/q2.png" width="100%">
            </div>
        </div>
    </div>
    <!--end banner -->
    <!-- start navbar -->
    <div class="container">
        <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <script defer type="text/javascript">
                    window.onload = function () {
                    $('.TimeZone').html('<i class="fa-solid fa-timer"></i>&nbsp;' + new Date().toLocaleString());
                    setInterval(() => {
                        $('.TimeZone').html('<i class="fa-solid fa-timer"></i>&nbsp;' + new Date().toLocaleString());
                    }, 1000);
                    function test(index) {
                        $(`#item_${index}`).prop( "checked", true );
                    }
                    }
                </script>
                <div class="TimeZone">
                </div>
            </nav>
        </div>
        </div>
    </div>
    <!--end navbar -->
    <?php
        if (isset($_POST['delsessionsub'])) {
            session_destroy();
            header('Location: ./');
        }
        print($_SESSION['Cabinet']);
        ?>
        <div class="CheckOutMain">
            <div class="Container_CheckOut">
                <center>
                <div class="textDaa" >
                    <h5>กรุณารอรับยาที่ช่องด้านล่าง</h5>
                </div>
                <form method='POST'>
                    <button type='submit' class="mt-2 submit-btn m-1 w-100 exit-session" name="delsessionsub">ออกจากระบบ</button>
                </form>
                
                <div class="Tips"><h6>กรุณาออกจากระบบทุกครั้ง</h6></div>
                </center>
            </div>
        </div>
        <br>
        <?php
        ?>
</body>
</html>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>