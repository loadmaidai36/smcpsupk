<?php
    include './class/action.php';
    $dbconn = new Cabinet();
    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    if (empty($_SESSION['username'])) {
        if (isset($_POST['submitLogin'])) {
            $result = $dbconn->login(array(
                'username' => $_POST["username"],
                'password' => $_POST["password"]
            ));
            
            if ($result->rowCount() == 1) {

                $row = $result->fetchAll()[0];
                $_SESSION["username"] = $row[
                    "username"
                ];
                header('Location: menu.php');
            } else {
                alert("ไม่พบบัญชีผู้ใช้");
            }
        }
    } else {
        header('Location: menu.php');
    }
?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <title>Smart Medicine</title>
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
    <!--start menu -->
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
    <!--end menu -->
    <!--start login -->
    <br>
    <div class="container">
        <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                <div class="app-brand justify-content-center">
                    <a class="app-brand-link gap-2">
                        <span class="app-brand-text demo text-body fw-bolder">SMART MEDICINE CABINET</span>
                    </a>
                </div>
            
                <p class="mb-4">ลงชื่อเข้าใช้งาน</p>
                <!-- Form Login -->
                <form id="formAuthentication" class="mb-3" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Username</label>
                    <input
                        type="text"
                        class="form-control"
                        id="email"
                        name="username"
                        placeholder="Enter your username"
                        autofocus>
                </div>

                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                    </div>
                <div class="input-group input-group-merge">
                    <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                </div>
                </div>
                
                <div class="mb-3">
                    <button name="submitLogin" class="btn btn-primary d-grid w-30" type="submit" name="authen">Sign in</button>
                    <form>
                        <input class="btn btn-danger d-grid w-30" type=button onClick="window.history.back()" value="Back">
                    </form>
                </div>
                </form>
                </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!--end login -->
</body>
</html>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>