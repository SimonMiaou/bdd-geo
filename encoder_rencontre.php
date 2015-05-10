<?php include 'header.php' ?>
<h1>Encoder une nouvelle rencontre</h1>

<?php
if (isset($_POST['etape']) && isset($_POST['date']) && isset($_POST['id_competition']) && isset($_POST['id_equipe_domicile']) && isset($_POST['id_equipe_exterieur'])) {
  $bdd->query('INSERT INTO Rencontre (etape, `date`, id_competition, id_equipe_domicile, id_equipe_exterieur)
    VALUES (
      '.$_POST['etape'].',
      "'.$_POST['date'].'",
      '.$_POST['id_competition'].',
      '.$_POST['id_equipe_domicile'].',
      '.$_POST['id_equipe_exterieur'].')');
  echo '<p>Rencontre encodée, <a href="rencontres.php">retour aux rencontres</a></p>';
}
?>

<form method='post' action='encoder_rencontre.php'>
  <p>
    <b>Compétition:</b><br />
    <select name='id_competition'>
      <?php
      $req = $bdd->query('SELECT * FROM Competition');
      while ($tuple = $req->fetch()) {
        echo '<option value="'.$tuple['id_competition'].'">'.$tuple['nom_competition'].'</option>';
      }
      ?>
    </select>
  </p>
  <p>
    <b>Date:</b><br />
    <input type='date' name='date' />
  </p>
  <p>
    <b>Etape:</b><br />
    <input type='number' name='etape' />
  </p>
  <p>
    <b>Equipe domicile</b><br />
    <select name='id_equipe_domicile'>
      <?php
      $req = $bdd->query('SELECT * FROM Equipe');
      while ($tuple = $req->fetch()) {
        echo '<option value="'.$tuple['id_equipe'].'">'.$tuple['nom'].'</option>';
      }
      ?>
    </select>
  </p>
  <p>
    <b>Equipe extérieur</b><br />
    <select name='id_equipe_exterieur'>
      <?php
      $req = $bdd->query('SELECT * FROM Equipe');
      while ($tuple = $req->fetch()) {
        echo '<option value="'.$tuple['id_equipe'].'">'.$tuple['nom'].'</option>';
      }
      ?>
    </select>
  </p>
  <p>
    <input type='submit' value='Soumettre' />
  </p>
</form>

<?php include 'footer.php' ?>
