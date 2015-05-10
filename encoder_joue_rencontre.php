<?php include 'header.php' ?>
<h1>Encoder une activité</h1>

<?php
if (isset($_POST['n_registre_joueur']) && isset($_POST['id_rencontre']) && isset($_POST['n_minutes_jouees']) && isset($_POST['n_goals_marques'])) {
  $bdd->query('INSERT INTO JoueRencontre (n_registre_joueur, id_rencontre, n_minutes_jouees, n_goals_marques)
    VALUES (
      '.$_POST['n_registre_joueur'].',
      '.$_POST['id_rencontre'].',
      '.$_POST['n_minutes_jouees'].',
      '.$_POST['n_goals_marques'].')');
  echo '<p>Activité encodée, <a href="joue_rencontre.php">retour aux activités</a></p>';
}
?>

<form method='post' action='encoder_joue_rencontre.php'>
  <p>
    <b>Joueur:</b><br />
    <select name='n_registre_joueur'>
      <?php
      $req = $bdd->query('SELECT Joueur.n_registre_joueur, Personne.nom, Personne.prenom
                          FROM Joueur JOIN Personne
                          ON Personne.n_registre = Joueur.n_registre_joueur');
      while ($tuple = $req->fetch()) {
        echo '<option value="'.$tuple['n_registre_joueur'].'">'.$tuple['prenom'].' '.$tuple['nom'].'</option>';
      }
      ?>
    </select>
  </p>
  <p>
    <b>Rencontre:</b><br />
    <select name='id_rencontre'>
      <?php
      $req = $bdd->query('SELECT Rencontre.id_rencontre, Rencontre.etape, Rencontre.date, Competition.nom_competition
                          FROM Rencontre
                          JOIN Competition ON Competition.id_competition = Rencontre.id_competition');
      while ($tuple = $req->fetch()) {
        echo '<option value="'.$tuple['id_rencontre'].'">'.$tuple['date'].' '.$tuple['nom_competition'].' '.$tuple['etape'].'</option>';
      }
      ?>
    </select>
  </p>
  <p>
    <b>Minutes jouées:</b><br />
    <input type='number' name='n_minutes_jouees' />
  </p>
  <p>
    <b>Goals marqués:</b><br />
    <input type='number' name='n_goals_marques' />
  </p>
  <p>
    <input type='submit' value='Soumettre' />
  </p>
</form>

<?php include 'footer.php' ?>
