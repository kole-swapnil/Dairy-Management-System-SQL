<?php
    require_once "pdo.php";
    session_start();

    if(isset($_POST['name']) && isset($_POST['Aadhar']))
    {
        $stmt = $pdo->prepare("SELECT packet_id,mfg_date,capacity,location,farmer.name FROM milk_packet JOIN customer JOIN farm JOIN farmer ON farm.farmer_id = farmer.farmer_id and milk_packet.farm_id = farm.farm_id and customer.customer_id = milk_packet.customer_id WHERE customer.aadhar = :aad");
        $stmt->execute(array(':aad' => $_POST['Aadhar']));
        
        
    }
?>
<html>
<head>
    <title>my data</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/table.css">    
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/home.css">
    

</head>
    <body>
<div class="head">
<h1>TRACK MILK PACKET</h1>
</div>

<div class = "container">
<table>
<?php
    
echo "<thead style = 'font-weight : bold;background-color : red'>" ;
echo "<tr><td>" ;
echo 'packet_id' ;
echo "</td><td>" ;
echo 'mfg_date' ;
echo "</td><td>" ;
echo 'capacity' ;
echo "</td><td>" ;
echo 'location' ;
echo "</td><td>" ;
echo 'Farmer_name' ;
echo "</td></tr>" ;
echo "</thead>" ;
            //$stm = $pdo->prepare("SELECT packet_id,mfg_date,capacity,location,farmer.name FROM milk_packet JOIN customer JOIN farm JOIN farmer ON farm.farm_id = farmer.farmer_id and milk_packet.farm_id = farm.farm_id and customer.customer_id = milk_packet.customer_id WHERE customer.aadhar = :aad");
            //$stm->execute(array(':aad' => $_POST['Aadhar']));
            $arows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($arows as $rows)
            { 
                
                    echo "<tr><td>";
                    echo($rows['packet_id']);
                    echo("</td><td>");
                    echo($rows['mfg_date']);
                    echo("</td><td>");
                    echo($rows['capacity']);
                    echo("</td><td>");
                    echo($rows['location']);
                    echo("</td><td>");
                    echo($rows['name']);
                    echo("</td></tr>");
            }
            ?>
        </table>
        </div>
    </body>
</html>
