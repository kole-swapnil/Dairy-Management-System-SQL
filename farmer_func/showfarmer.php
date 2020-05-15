<?php
    require_once "pdo.php";
    session_start();

        $stmt = $pdo->query("SELECT farmer.name,farmer.aadhar,farmer_id FROM farmer");
        


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
<h1>FARMER DATABASE</h1>
</div>
    <div class = "container">
        <table >
        <table>
<?php
    
echo "<thead style = 'font-weight : bold;background-color : red'>" ;
echo "<tr><td>" ;
echo 'Farmer Name' ;
echo "</td><td>" ;
echo 'Aadhar No.' ;
echo "</td><td>" ;
echo 'Delete Farmer' ;
echo "</td><td>" ;
echo 'Edit Farmer' ;
echo "</td></tr>" ;
echo "</thead>" ;
            $arows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($arows as $rows)
            {   $cid = $rows['farmer_id'];
                
                    echo "<tr><td>";
                    echo($rows['name']);
                    echo("</td><td>");
                    echo($rows['aadhar']);
                    echo("</td><td>");
                    echo('<a href="delfarmer.php?farmer_id='.$cid.'">Delete</a>');
                    echo("</td><td>");
                    echo('<a href="editfarmer.php?farmer_id='.$cid.'">Edit</a>');
                    echo("</td></tr>");
            }
            ?>
        </table>
        </div>
    </body>
</html>
