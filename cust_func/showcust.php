<?php
    require_once "pdo.php";
    session_start();

        $stmt = $pdo->query("SELECT customer.name,customer.aadhar,customer_id FROM customer");
        


?>
<html>
<head>
	<title>my data</title>
    <!--===============================================================================================-->
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
    </head>
    <body>
<div class="head">
<h1>CUSTOMER DATABASE</h1>
</div>
    <div class = "container">
        <table >
<?php
    
echo "<thead style = 'font-weight : bold;background-color : red'>" ;
echo "<tr><td>" ;
echo 'Customer Name' ;
echo "</td><td>" ;
echo 'Aadhar No.' ;
echo "</td><td>" ;
echo 'Delete customer' ;
echo "</td><td>" ;
echo 'Edit customer' ;
echo "</td></tr>" ;
echo "</thead>" ;
            $arows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($arows as $rows)
            {   $cid = $rows['customer_id'];
                
                    echo "<tr><td>";
                    echo($rows['name']);
                    echo("</td><td>");
                    echo($rows['aadhar']);
                    echo("</td><td>");
                    echo('<a href="delcust.php?customer_id='.$cid.'">Delete</a>');
                    echo("</td><td>");
                    echo('<a href="editcust.php?customer_id='.$cid.'">Edit</a>');
                    echo("</td></tr>");
            }
            ?>
        </table>
        </div>
    </body>
</html>
