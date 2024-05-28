<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des Vinyles</title>
  <link rel="stylesheet" href="/styles/vue-style.css">
</head>

<body>
  <header>
    <h1>Liste des Vinyles</h1>
  </header>
  <main>
    <div class="selection">
      <div class="row">
        <?php if (!empty($table)): ?>
          <?php foreach ($table as $vinyle): ?>
            <div class="col-sm-2">
              <div class="decade">
                <img class="img_d" src="/images/VINYLE_CLASSIQUE.jpg" alt="<?= $vinyle['Titre'] ?>">
                <h3><?= $vinyle['Titre'] ?></h3>
                <h4><?= $vinyle['Artiste'] ?></h4>
                <button class="acc">
                  <span>Accéder</span>
                </button>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>Aucun vinyle trouvé.</p>
        <?php endif; ?>
      </div>
    </div>
  </main>
  <footer>
    <div class="credit">© 2024 Vinyl Records, Inc</div>
    <div class="reseau">
      <a href="#"><img src="/images/facebook (1).svg" alt="Facebook"></a>
      <a href="#"><img src="/images/twitter (1).svg" alt="Twitter"></a>
      <a href="#"><img src="/images/icons8-instagram-24.svg" alt="Instagram"></a>
    </div>
  </footer>
</body>

</html>