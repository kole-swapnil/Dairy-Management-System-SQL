<?php
    require_once "pdo.php";
    session_start();


    
    if(isset($_POST['farm_id']))
        {
            $stmt = $pdo->prepare("DELETE FROM farm WHERE farm_id = :cid");
            $stmt->execute(array(':cid' => $_POST['farm_id']));
            $_SESSION['success'] = 'Record Deleted';
            header('Location:showfarm.php');
            return;
        }

        $stmt = $pdo->prepare("SELECT farm_id,farmer.name,farm.location,farm.dairy_produced,farm.farmer_id FROM farm JOIN farmer ON farm.farmer_id = farmer.farmer_id WHERE farm_id = :cip");
        $stmt->execute(array(':cip' => $_GET['farm_id']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( $row === false ) {
            $_SESSION['error'] = 'Bad value for user_id';
            header( 'Location: index.php' ) ;
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
<?php $_row['name'] ?>
	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/distributor.png" alt="IMG">
			</div>

			<form method = "post" action = "delfarm.php" class="contact1-form validate-form">
				<span class="contact1-form-title">
					CONFIRM DELETION
				</span>
                <input type="hidden" name="farm_id" value="<?= $row['farm_id'] ?>">
                
                <div class="wrap-input1">
					<input class="input1" type="text" name="name" value="<?= $row['name'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
					<input class="input1" type="text" name="location" value="<?= $row['location'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
					<input class="input1" type="text" name="dairy_produced" value="<?= $row['dairy_produced'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="container-contact1-form-btn">
                <button class="contact1-form-btn">
                <span >
                <input style = "background-color : rgba(0,0,0,0)" type="submit" value="Delete" name="delete">
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
