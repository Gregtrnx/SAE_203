<?php
  // ****** PREPARATION DES DONNEES ******

  // Initialisation du menu
  $menu = "<a class='lien' href='/php/controleur.php?liste=vinyle'>Artiste</a>

  // Initialisation des messages
  $titre = "";
  
  if($liste != "")
  {
    $titre = "<h3>Liste des $liste</h3>";

    // Début du tableau HTML
    $resultat = "<table>";

    // Ajout de la ligne avec les titres de colonnes
    $resultat .= "<tr>";
    foreach($table[0] as $cle => $valeur)
    {
      $resultat .= "<th>$cle</th>";
    }
    $resultat .= "</tr>";

    // Ajout des lignes avec une boucle foreach()
    foreach($table as $ligne)
    {
      $resultat .= "<tr>";
      foreach($ligne as $valeur)
      {
        $resultat .= "<td>$valeur</td>";
      }
      $resultat .= "</tr>";
    }

    // Fin du tableau HTML
    $resultat .= "</table>";
  }
  else
    $resultat = "Veuillez choisir une liste";
?>

<!-- ****** AFFICHAGE DES DONNEES ****** -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <link href="/styles/style.css" rel="stylesheet">
  <title>PHP</title>
</head>

<body>
  <header>
    <h1>PHP</h1>
    <div class="menu"><?= $menu ?></div>
  </header>
  
  <main class="resultat">
    <?= $titre ?>
    <?= $resultat ?>
  </main>
</body>
</html>
