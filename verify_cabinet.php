<?ob_start();?>
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
    <script src="jquery-1.11.3.min.js"></script>
    <script src="mqttws31.js"></script>
    <script>
        var config = {
	    mqtt_server: "driver.cloudmqtt.com",
	    mqtt_websockets_port: 38759,
	    mqtt_user: "qqegzsva",
	    mqtt_password: "of4tBKL5qvc-"
        };

    $(document).ready(function(e) {
	// Create a client instance
	client = new Paho.MQTT.Client(config.mqtt_server, config.mqtt_websockets_port, "web_" + parseInt(Math.random() * 100, 10)); 
	//Example client = new Paho.MQTT.Client("m11.cloudmqtt.com", 32903, "web_" + parseInt(Math.random() * 100, 10));
	
	// connect the client
	client.connect({
		useSSL: true,
		userName: config.mqtt_user,
		password: config.mqtt_password,
		onSuccess: function() {
			// Once a connection has been made, make a subscription and send a message.
			// console.log("onConnect");
			$("#status").text("Connected").removeClass().addClass("connected");
			client.subscribe("/ESP32_smart/LED");
			mqttSend("/ESP32_smart/LED", "GET");
		},
		onFailure: function(e) {
			$("#status").text("Error : " + e).removeClass().addClass("error");
			// console.log(e);
		}
	});
	
	client.onConnectionLost = function(responseObject) {
		if (responseObject.errorCode !== 0) {
			$("#status").text("onConnectionLost:" + responseObject.errorMessage).removeClass().addClass("connect");
			setTimeout(function() { client.connect() }, 1000);
		}
	}
	
	client.onMessageArrived = function(message) {
		// $("#status").text("onMessageArrived:" + message.payloadString).removeClass().addClass("error");
		console.log(message.payloadString);
		if (message.payloadString == "1" || message.payloadString == "0") {
			$("#1").attr("disabled", (message.payloadString == "1" ? true : false));
        }
            else if (message.payloadString == "2" || message.payloadString == "0") {
                $("#2").attr("disabled", (message.payloadString == "2" ? true : false));
            }
            else if (message.payloadString == "3" || message.payloadString == "0") {
                $("#3").attr("disabled", (message.payloadString == "3" ? true : false));
            }
            else if (message.payloadString == "4" || message.payloadString == "0") {
                $("#4").attr("disabled", (message.payloadString == "4" ? true : false));
            }
            else if (message.payloadString == "5" || message.payloadString == "0") {
                $("#5").attr("disabled", (message.payloadString == "5" ? true : false));
            }
            else if (message.payloadString == "6" || message.payloadString == "0") {
                $("#6").attr("disabled", (message.payloadString == "6" ? true : false));
            }
            else {
            }
                // $("#led-on").attr("disabled", (message.payloadString == "LEDON" ? true : false));
                // $("#led-off").attr("disabled", (message.payloadString == "LEDOFF" ? true : false));  		
	}

	$("#1").click(function(e) {
        mqttSend("/ESP32_smart/LED", "1");
    });

    $("#2").click(function(e) {
        mqttSend("/ESP32_smart/LED", "2");
    });

    $("#3").click(function(e) {
        mqttSend("/ESP32_smart/LED", "3");
    });

    $("#4").click(function(e) {
        mqttSend("/ESP32_smart/LED", "4");
    });

    $("#5").click(function(e) {
        mqttSend("/ESP32_smart/LED", "5");
    });
	
    $("#6").click(function(e) {
        mqttSend("/ESP32_smart/LED", "6");
    });

    });

    var mqttSend = function(topic, msg) {
    var message = new Paho.MQTT.Message(msg);
	message.destinationName = topic;
	client.send(message); 
    }
    </script> 
    <!-- end script -->
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
        if (isset($_SESSION['Cabinet'])) {
            $result = $dbconn->select_Cabinet(array(
                'select_Cabinet' => $_SESSION['Cabinet'],
            ));
            
            if (isset($_POST['submitVerify'])) {
                if (isset($_SESSION['Cabinet'])) {
                    header('Location: checkout.php');
                } else {
                    alert('No Cabinet ALllllllllllll');
                }
            }
            
            if ($result->rowCount() == 1) {

                $row = $result->fetchAll()[0];
                $id = $row['id'];
                ?>
                    
                    <div class="VerifyCabinet">
                        <div class="ContentVerifyCabinet">
                            <div class="Cabinet_Verify">
                                <img src="<?php echo $row['cabinet_img']; ?>" alt="">
                            </div>
                            <h3 style='font-weight: 400'><?php echo $row['cabinet_name']; ?></h3>

                            <h5 style='font-weight: 400'>ID : <?php echo $id ?></h5>
                            
                            <h5 style='font-weight: 400'>จำนวน 1 ชิ้น</h5>
                            
                            <form method="POST">
                                <div class="d-flex w-10 btn-g">
                                    <form>
                                        <input class="btn btn-danger d-grid w-30" type=button onClick="window.history.back()" value="Back">
                                    </form>
                                    &nbsp;
                                    <button type="submit" class="btn btn-primary d-grid w-30" name="submitVerify" id="<?php echo $id; ?>" >Confirm</button>
                                    
                                    <!-- <button type='submit' name="can" class="mt-2 submit-btn m-1 bg-danger text-light" onclick="window.location.href = './'">Cancle</button>
                                    <button type='submit' class="mt-2 submit-btn m-1" name="submitVerify">ยืนยัน</button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                <?php
            } else {
                alert("ไม่พบยา");
            }
        } else {
            header('Location: menu.php');
        }
    ?>
    <br>
</body>
</html>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>