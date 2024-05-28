<?php
  // Initialisation des messages
  $titre = "";
  
  if($liste != "")
  {
    // ****** PREPARATION DES DONNEES ******
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
  </header>
  
  <main class="resultat">
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
      <label class="form_elt">
        <span>Liste des clients</span>
        <input type="radio" name="liste" value="clients"
          <?php
            if ($liste == "clients")
            echo "checked";
          ?>>
      </label>
      <label class="form_elt">
        <span>Liste des articles</span>
        <input type="radio" name="liste" value="articles"
          <?php
            if ($liste == "articles")
              echo "checked";
          ?>>
      </label>
      <label class="form_elt">
        <span>Liste des commandes</span>
        <input type="radio" name="liste" value="commandes"
          <?php
            if ($liste == "commandes")
              echo "checked";
          ?>>
      </label>
      <button class="valid" name="clic" value="ok">Cliquez ici</button>
    </form>
    <?= $titre ?>
    <?= $resultat ?>
  </main>
</body>
</html>
