<?php include 'base_de_donnees.php' ?>
<?php include 'fonctions.php' ?>
<?php
session_start();
if (empty($_SESSION['pseudo'])) {
  header('location: connexion.php');
}
?>
<html>
<header>
  <title>Projet BDD Geo</title>
  <link rel='stylesheet' href='style.css'>
</header>
<body>

<div class='menu'>
  <ul>
    <li><a href='personnes.php'>Personnes</a></li>
    <li><a href='joueurs.php'>Joueurs</a></li>
    <li><a href='entraineurs.php'>Entraineurs</a></li>
    <li><a href='clubs.php'>Clubs</a></li>
    <li><a href='equipes.php'>Equipes</a></li>
    <li><a href='competitions.php'>Compétitions</a></li>
    <li><a href='rencontres.php'>Rencontres</a></li>
    <li><a href='positions.php'>Positions</a></li>
    <li><a href='joue_rencontre.php'>JoueRencontre</a></li>
    <li><a href='entraine.php'>Entraine</a></li>
    <li><a href='joue_pour.php'>JouePour</a></li>
  </ul>
</div>
<div class='menu'>
  <ul>
    <li><a href='meilleurs_buteurs.php'>Meilleurs buteurs</a></li>
    <li><a href='joueurs_ayant_joue_tout_les_matchs.php'>Joueurs ayant joué tout les matchs</a></li>
  </ul>
</div>
