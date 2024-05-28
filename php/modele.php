<?php
  // ****** ACCES AUX DONNEES ******

  /*******************************************************
  Se connecte à la base de données magasin 
    Entrée : 
  
    Retour : 
      [object] : Connexion vers la BDD magasin
  *******************************************************/
  function connexionBDD()
  {
    try   // Connexion à la base de données
    {
      $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
      $database = new PDO('mysql:host=localhost;dbname=magasin', 'root', '', $options);
    }
    catch(Exception $err)
    {
      die('Erreur connexion MySQL : ' . $err->getMessage());
    }

    return $database;
  }

  /*******************************************************
  Exécute une requête de type SELECT et retourne la réponse dans un tableau associatif 
    Entrée : 
      requete [string] : Requête SELECT à exécuter
  
    Retour : 
      [array] : Tableau associatif contenant la réponse
  *******************************************************/
  function lectureBDD($requete)
  {
    $bdd=connexionBDD();      // Connexion à la base de données
  
    $reponse=$bdd->query($requete);    // Envoi de la requête SQL
  
    // Lecture de toutes les lignes de la réponse dans un tableau associatif
    $tableau=$reponse->fetchAll(PDO::FETCH_ASSOC);
  
    $bdd=null;                // Fin de la connexion
  
    return $tableau;          // Renvoi du tableau associatif
  }


  /*******************************************************
  Retourne la liste des clients 
    Entrée : 
  
    Retour : 
      [array] : Tableau associatif contenant la liste des clients
  *******************************************************/
  function listeClients()
  {
    // Envoi de la requête SQL pour récupérer la liste des clients
    $clients = lectureBDD("SELECT nom AS 'Nom', prenom AS 'Prénom', ville AS 'Ville', mail AS 'Adresse mail' FROM client;");
    return $clients;
  }

  /*******************************************************
  Retourne la liste des articles 
    Entrée : 
  
    Retour : 
      [array] : Tableau associatif contenant la liste des articles
  *******************************************************/
  function listeArticles()
  {
    // Envoi de la requête SQL pour récupérer la liste des articles
    return lectureBDD("SELECT id_article AS 'Référence', designation AS 'Désignation', prix AS 'Prix', categorie AS 'Catégorie' FROM article;");
  }

  /*******************************************************
  Retourne la liste des commandes 
    Entrée : 
  
    Retour : 
      [array] : Tableau associatif contenant la liste des commandes
  *******************************************************/
  function listeCommandes()
  {
        // Envoi de la requête SQL pour récupérer la liste des commandes
        return lectureBDD("SELECT nom AS 'Nom', prenom AS 'Prénom', ville AS 'Ville', DATE_FORMAT(date, '%d/%m/%Y') AS 'Date commande', SUM(quantite * prix) AS 'Total'
        FROM client 
        INNER JOIN commande ON client.id_client = commande.id_client
          INNER JOIN ligne ON commande.id_comm = ligne.id_comm
            INNER JOIN article ON article.id_article=ligne.id_article
        GROUP BY commande.id_comm
        ORDER BY nom, date;");
  }