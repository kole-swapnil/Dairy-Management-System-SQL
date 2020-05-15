<?php     
require_once "pdo.php";  
echo "<pre>\n";
$stmt = $pdo->query("SELECT packet_id,mfg_date,capacity,location,farmer.name FROM milk_packet JOIN customer JOIN farm JOIN farmer ON farm.farm_id = farmer.farmer_id and milk_packet.farm_id = farm.farm_id and customer.customer_id = milk_packet.customer_id");
echo '<table border="1">'."\n";
while($rows = $stmt->fetch(PDO::FETCH_ASSOC))
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
                    echo($rows['farmer.name']);
                    echo("</td></tr>\n");
}
    echo "</table>\n";
echo "</pre>\n";
