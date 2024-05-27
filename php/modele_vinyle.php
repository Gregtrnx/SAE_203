<?php
  // ****** ACCES AUX DONNEES ******
  try   // Connexion à la base de données
  {
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $bdd = new PDO('mysql:host=localhost;dbname=vinyl_records', 'root', '', $options);
  }
  catch(Exception $err)
  {
    die('Erreur connexion MySQL : ' . $err->getMessage());
  }

  // Envoi de la requête SQL
  $reponse = $bdd->query("SELECT id_artiste AS 'Référence', nom AS 'Nom', bio AS 'Biographie' FROM artiste;");

  // Lecture de toutes les lignes de la réponse dans un tableau associatif
  $table = $reponse->fetchAll(PDO::FETCH_ASSOC);

  $bdd = null;                // Fin de la connexion