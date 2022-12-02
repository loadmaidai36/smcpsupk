<?php
    include './class/action.php';
    $dbconn = new Cabinet();
    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    
    if (empty($_SESSION['username'])) {
      header('Location: login.php');
    }
    unset($_SESSION['Cabinet']);
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
    <br>
    <!--end navbar -->
    <br>
    <!--start  product -->
    <div class="container">
      <div class="row">
        <?php
        
        $result = $dbconn->getCabinet();
        $rows = $result->fetchAll();
        
                                
        if (isset($_POST['submitSelect'])) {
            if (!empty($_POST["select_Cabinet"])) {
                $_SESSION['Cabinet'] = $_POST["select_Cabinet"];
                header('Location: verify_cabinet.php');
            } else {
                alert('เลือกยาของคุณ');
            }
        }
        if ($result->rowCount() >= 1) {

            foreach($rows as $row) {
            ?>
                
                <div class="col-12 col-sm-4 col-md-4" style="margin-bottom: 20px;">
                  <div class="card" style="width: 100%;">
                    <img src="<?php echo $row['cabinet_img']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['cabinet_name']; ?></h5>
                      <p class="card-text">วิธีใช้ : <?php echo $row['cabinet_details']; ?></p>
                      <form method="POST">
                        <input type="text" hidden name="select_Cabinet" value="<?php echo $row['id']; ?>">
                        <button type='submit' class="mt-2 btn btn-primary m-1" name="submitSelect">ยืนยัน</button>
                      </form>
                    </div>
                  </div>
                </div>
            <?php
            }
        } else {
            print('not Found');
        }
        ?>
      </div>
    <!--end product -->
</body>
</html>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>