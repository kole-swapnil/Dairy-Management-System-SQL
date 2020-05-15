<?php
    require_once "pdo.php";
    session_start();

        $stmt = $pdo->query("SELECT farmer.name,farm.location,farm.dairy_produced,farm_id FROM farm JOIN farmer ON farm.farmer_id = farmer.farmer_id");
        


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
<h1>FARM DATABASE</h1>
</div>
    <div class = "container">
        <table>
<?php
    
echo "<thead style = 'font-weight : bold;background-color : blue'>" ;
echo "<tr><td>" ;
echo 'Farmer Name' ;
echo "</td><td>" ;
echo 'Farm Location' ;
echo "</td><td>" ;
echo 'Dairy Produced Daily' ;
echo "</td><td>" ;
echo 'Delete Farm' ;
echo "</td><td>" ;
echo 'Edit Farm' ;
echo "</td></tr>" ;
echo "</thead>" ;
            $arows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($arows as $rows)
            {   $cid = $rows['farm_id'];
                
                    echo "<tr><td>";
                    echo($rows['name']);
                    echo("</td><td>");
                    echo($rows['location']);
                    echo("</td><td>");
                    echo($rows['dairy_produced']);
                    echo("</td><td>");
                    echo('<a href="delfarm.php?farm_id='.$cid.'">Delete</a>');
                    echo("</td><td>");
                    echo('<a href="editfarm.php?farm_id='.$cid.'">Edit</a>');
                    echo("</td></tr>");
            }
            ?>
        </table>
        </div>
    </body>
</html>
