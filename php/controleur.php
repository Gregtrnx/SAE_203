<?php
  require "modele.php";

  // TRAITEMENT DU FORMULAIRE
  // Initialisation des variables
  if(!empty($_POST["liste"]))
  {
    $liste = $_POST["liste"];

    if ($liste == "clients")
      $table = listeClients();
    else if ($liste == "articles")
      $table = listeArticles();
    else if ($liste == "commandes")
      $table = listeCommandes();
  }
  else
    $liste = '';

  require "vue.php";