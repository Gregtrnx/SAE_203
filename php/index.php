<?php
require 'db_connect.php';

// Initialisation des variables
$liste = '';
$table = [];
$titre = '';
$resultat = '';

// Fonction pour récupérer les vinyles d'une décennie
function getVinylesByDecade($decade) {
    global $bdd;
    $stmt = $bdd->prepare("SELECT id, nom, artiste FROM vinyles WHERE decade = :decade");
    $stmt->execute(['decade' => $decade]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['liste'])) {
    $liste = $_POST['liste'];
    $table = getVinylesByDecade($liste);

    if (!empty($table)) {
        $titre = "<h3>Liste des vinyles des années $liste</h3>";
        $resultat = "<table class='table table-striped'><thead><tr>";

        // Titres des colonnes
        foreach (array_keys($table[0]) as $cle) {
            $resultat .= "<th>$cle</th>";
        }
        $resultat .= "</tr></thead><tbody>";

        // Lignes du tableau
        foreach ($table as $ligne) {
            $resultat .= "<tr>";
            foreach ($ligne as $valeur) {
                $resultat .= "<td>$valeur</td>";
            }
            $resultat .= "</tr>";
        }
        $resultat .= "</tbody></table>";
    } else {
        $resultat = "Aucun résultat trouvé.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
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
                <span>Années 1970</span>
                <input type="radio" name="liste" value="1970"
                    <?php if ($liste == "1970") echo "checked"; ?>>
            </label>
            <label class="form_elt">
                <span>Années 1980</span>
                <input type="radio" name="liste" value="1980"
                    <?php if ($liste == "1980") echo "checked"; ?>>
            </label>
            <label class="form_elt">
                <span>Années 1990</span>
                <input type="radio" name="liste" value="1990"
                    <?php if ($liste == "1990") echo "checked"; ?>>
            </label>
            <label class="form_elt">
                <span>Années 2000</span>
                <input type="radio" name="liste" value="2000"
                    <?php if ($liste == "2000") echo "checked"; ?>>
            </label>
            <button class="valid" name="clic" value="ok">Cliquez ici</button>
        </form>
        <?= $titre ?>
        <?= $resultat ?>
    </main>
</body>
</html>
