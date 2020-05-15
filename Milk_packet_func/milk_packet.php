<?php
    require_once "pdo.php";
    session_start();

    if(isset($_POST['capacity']) && isset($_POST['mfg_date']) && isset($_POST['farm_id']) && isset($_POST['customer_id']))
        {
            $stmt = $pdo->prepare("INSERT INTO milk_packet(capacity,mfg_date,farm_id,customer_id) VALUES(:cap,:date,:fid,:cid)");
            $stmt->execute(array(':cap' => $_POST['capacity'],':date' => $_POST['mfg_date'],':fid' => $_POST['farm_id'],':cid' => $_POST['customer_id']));
            $_SESSION['success'] = 'Record Added';
            	header('Location:showmilk_packet.php');
            return;
        }






?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>DISTRIBUTOR</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/distributor.png" alt="IMG">
			</div>

			<form method = "post" class="contact1-form validate-form">
				<span class="contact1-form-title">
					MILK PACKET ADD
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="capacity" placeholder="Capacity">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input">
					<input class="input1" type="text" name="mfg_date" placeholder="Manufactured Date">
					<span class="shadow-input1"></span>
				</div>
				<div class="wrap-input1 validate-input">
					<input class="input1" type="text" name="farm_id" placeholder="Farm_ID">
					<span class="shadow-input1"></span>
				</div>
				
				<div class="wrap-input1 validate-input">
					<input class="input1" type="text" name="customer_id" placeholder="Customer_ID">
					<span class="shadow-input1"></span>
				</div>

				

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn">
						<span>
							ADD FARM
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
            </form>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
