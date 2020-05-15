<?php
    require_once "pdo.php";
    session_start();

        $stmt = $pdo->query("SELECT customer.name as mane,packet_id,mfg_date,capacity,location,farmer.name FROM milk_packet JOIN customer JOIN farm JOIN farmer ON farm.farmer_id = farmer.farmer_id and milk_packet.farm_id = farm.farm_id and customer.customer_id = milk_packet.customer_id");
        
        


?>
<html>
<head>
	<title>my data</title>
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
<h1>MILK PACKET DATABASE</h1>
</div>
    <div class = "container">
        <table>
<?php
    
echo "<thead style = 'font-weight : bold;background-color : red'>" ;
echo "<tr><td>" ;
echo 'Customer Name' ;
echo "</td><td>" ;
echo 'Packet_ID' ;
echo "</td><td>" ;
echo 'Manufacture Date' ;
echo "</td><td>" ;
echo 'Capacity' ;
echo "</td><td>" ;
echo 'Location' ;
echo "</td><td>" ;
echo 'Name' ;
echo "</td></tr>" ;
echo "</thead>" ;
            $arows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($arows as $rows)
            {   
                
                    echo "<tr><td>";
                    echo($rows['mane']);
                    echo("</td><td>");
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
