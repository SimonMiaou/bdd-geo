<?php session_start(); ?>
<html>
<header>
  <title>Projet BDD Geo</title>
  <link rel='stylesheet' href='style.css'>
</header>
<body>

<?php
if (isset($_POST['pseudo']) && isset($_POST['mot_de_passe'])) {
  if ($_POST['pseudo'] == 'Simon' && $_POST['mot_de_passe'] == 'azerty') {
    $_SESSION['pseudo'] = 'Simon';
    echo '<p>Connextion réussie, <a href="index.php">continuer</a></p>';
  }
  else {
    $_SESSION['pseudo'] = NULL;
    echo '<p>Identifiants invalide.</p>';
  }
}

if (empty($_POST['pseudo']) || empty($_SESSION['pseudo'])) {
?>

<form method='post' action='connexion.php'>
  <p>
    <b>Pseudo:</b><br />
    <input type='text' name='pseudo' />
  </p>
  <p>
    <b>Mot de passe:</b><br />
    <input type='password' name='mot_de_passe' />
  </p>
  <p>
    <input type='submit' value='Soumettre' />
  </p>
</form>

<?php
}
?>

</body>
</html>
