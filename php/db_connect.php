<?php
try {
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $bdd = new PDO('mysql:host=localhost;dbname=vinyl_records', 'root', '', $options);
} catch(Exception $err) {
    die('Erreur connexion MySQL : ' . $err->getMessage());
}
?>