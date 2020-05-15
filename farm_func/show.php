<?php
    require_once "pdo.php";
    session_start();

    if(isset($_POST['name']) && isset($_POST['Aadhar']))
    {
        $stmt = $pdo->prepare("SELECT packet_id,mfg_date,capacity,location,farmer.name FROM milk_packet JOIN customer JOIN farm JOIN farmer ON farm.farm_id = farmer.farmer_id and milk_packet.farm_id = farm.farm_id and customer.customer_id = milk_packet.customer_id WHERE customer.aadhar = :aad");
        $stmt->execute(array(':aad' => $_POST['Aadhar']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row === false)
        {
            $_SESSION['error'] = "No entry found";
            header('Location:customer.html');
            return;
        }
    }
?>
<html>
<head>
	<title>my data</title>
    <link rel="stylesheet" type="text/css" href="first.css">
</head>
    <body>
        <table class = "tav">
<?php
    
echo "<thead style = 'font-weight : bold;background-color : blue'>" ;
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
            $stm = $pdo->prepare("SELECT packet_id,mfg_date,capacity,location,farmer.name FROM milk_packet JOIN customer JOIN farm JOIN farmer ON farm.farm_id = farmer.farmer_id and milk_packet.farm_id = farm.farm_id and customer.customer_id = milk_packet.customer_id WHERE customer.aadhar = :aad");
            $stm->execute(array(':aad' => $_POST['Aadhar']));
            $arows = $stm->fetchAll(PDO::FETCH_ASSOC);
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
    </body>
</html>
