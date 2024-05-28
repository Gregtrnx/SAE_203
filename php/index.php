<?php
// ****** ACCES AUX DONNEES ******

/*******************************************************
Se connecte à la base de données magasin 
Entrée : 
Retour : 
  [object] : Connexion vers la BDD magasin
*******************************************************/
if (!function_exists('connexionBDD')) {
    function connexionBDD()
    {
        try   // Connexion à la base de données
        {
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $database = new PDO('mysql:host=localhost;dbname=vinyl_records', 'root', '', $options);
        }
        catch(Exception $err)
        {
            die('Erreur connexion MySQL : ' . $err->getMessage());
        }

        return $database;
    }
}

/*******************************************************
Exécute une requête de type SELECT et retourne la réponse dans un tableau associatif 
Entrée : 
  requete [string] : Requête SELECT à exécuter
Retour : 
  [array] : Tableau associatif contenant la réponse
*******************************************************/
if (!function_exists('lectureBDD')) {
    function lectureBDD($requete)
    {
        $bdd = connexionBDD();      // Connexion à la base de données
        $reponse = $bdd->query($requete);    // Envoi de la requête SQL

        // Lecture de toutes les lignes de la réponse dans un tableau associatif
        $tableau = $reponse->fetchAll(PDO::FETCH_ASSOC);

        $bdd = null;                // Fin de la connexion

        return $tableau;            // Renvoi du tableau associatif
    }
}

/*******************************************************
Retourne la liste des vinyles des années 70 
Entrée : 
Retour : 
  [array] : Tableau associatif contenant la liste des vinyles des années 70
*******************************************************/
if (!function_exists('listevinyle70')) {
    function listevinyle70()
    {
        // Envoi de la requête SQL pour récupérer la liste des vinyles des années 70
        $vinyle70 = lectureBDD("SELECT titre AS 'Titre', artiste AS 'Artiste', année AS 'Année', etat AS 'Etat', prix AS 'Prix' FROM vinyle WHERE année LIKE '__7%';");
        return $vinyle70;
    }
}

/*******************************************************
Retourne la liste des vinyles des années 80 
Entrée : 
Retour : 
  [array] : Tableau associatif contenant la liste des vinyles des années 80
*******************************************************/
if (!function_exists('listevinyle80')) {
    function listevinyle80()
    {
        // Envoi de la requête SQL pour récupérer la liste des vinyles des années 80
        $vinyle80 = lectureBDD("SELECT titre AS 'Titre', artiste AS 'Artiste', année AS 'Année', etat AS 'Etat', prix AS 'Prix' FROM vinyle WHERE année LIKE '__8%';");
        return $vinyle80;
    }
}

/*******************************************************
Retourne la liste des vinyles des années 90 
Entrée : 
Retour : 
  [array] : Tableau associatif contenant la liste des vinyles des années 90
*******************************************************/
if (!function_exists('listevinyle90')) {
    function listevinyle90()
    {
        // Envoi de la requête SQL pour récupérer la liste des vinyles des années 90
        $vinyle90 = lectureBDD("SELECT titre AS 'Titre', artiste AS 'Artiste', année AS 'Année', etat AS 'Etat', prix AS 'Prix' FROM vinyle WHERE année LIKE '__9%';");
        return $vinyle90;
    }
}

/*******************************************************
Retourne la liste des vinyles des années 2000 
Entrée : 
Retour : 
  [array] : Tableau associatif contenant la liste des vinyles des années 2000
*******************************************************/
if (!function_exists('listevinyle20')) {
    function listevinyle20()
    {
        // Envoi de la requête SQL pour récupérer la liste des vinyles des années 2000
        $vinyle20 = lectureBDD("SELECT titre AS 'Titre', artiste AS 'Artiste', année AS 'Année', etat AS 'Etat', prix AS 'Prix' FROM vinyle WHERE année LIKE '_0%';");
        return $vinyle20;
    }
}

// TRAITEMENT DU FORMULAIRE
// Initialisation des variables
if (!empty($_POST["liste"])) {
    $liste = $_POST["liste"];

    if ($liste == "70") {
        $table = listevinyle70();
    } else if ($liste == "80") {
        $table = listevinyle80();
    } else if ($liste == "90") {
        $table = listevinyle90();
    } else if ($liste == "20") {
        $table = listevinyle20();
    }
}

// AFFICHAGE
require "vue.php";
