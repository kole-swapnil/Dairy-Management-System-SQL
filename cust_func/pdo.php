<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=milk_factory','kole','swapnil');

$pdo-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>