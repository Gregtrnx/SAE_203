<?php
  // TRAITEMENT DES DONNEES TRANSMISES DANS L'URL
  // Initialisation des variables
  if(!empty($_GET["liste"]))
  {
    $liste = $_GET["liste"];

    if ($liste == "vinyle")
      require "modele_vinyle.php";
  }
  else
    $liste = '';

  require "vue.php";