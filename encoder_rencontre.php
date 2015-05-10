<?php include 'header.php' ?>
<h1>Encoder une nouvelle rencontre</h1>

<?php
if (isset($_POST['etape']) && isset($_POST['date']) && isset($_POST['id_competition']) && isset($_POST['id_equipe_domicile']) && isset($_POST['id_equipe_exterieur'])) {
  $annee = intval(date('Y', strtotime($_POST['date'])));

  $req = $bdd->query('SELECT * FROM Competition WHERE id_competition='.$_POST['id_competition']);
  $competition = $req->fetch();

  $req = $bdd->query('SELECT * FROM Equipe
    JOIN Entraine ON Entraine.id_equipe = Equipe.id_equipe
    JOIN JouePour ON JouePour.id_equipe = Equipe.id_equipe
    WHERE Equipe.id_equipe = '.$_POST['id_equipe_domicile'].'
    AND Entraine.annee = '.$annee.'
    AND JouePour.annee = '.$annee);
  $equipe_domicile = $req->fetch();

  $req = $bdd->query('SELECT * FROM Equipe
    JOIN Entraine ON Entraine.id_equipe = Equipe.id_equipe
    JOIN JouePour ON JouePour.id_equipe = Equipe.id_equipe
    WHERE Equipe.id_equipe = '.$_POST['id_equipe_exterieur'].'
    AND Entraine.annee = '.$annee.'
    AND JouePour.annee = '.$annee);
  $equipe_exterieur = $req ? $req->fetch() : NULL ;

  if ($competition['annee'] != $annee) {
    echo '<p>La date doit correspondre à l\'année de la compétition</p>';
  }
  else if (empty($equipe_domicile)) {
    echo '<p>L\'équipe domicile n\'a pas d\'entraineur ou de joueur pour l\'année de la compétition.</p>';
  }
  else if (empty($equipe_exterieur)) {
    echo '<p>L\'équipe extérieur n\'a pas d\'entraineur ou de joueur pour l\'année de la compétition.</p>';
  }
  else if ($equipe_domicile['id_equipe'] == $equipe_exterieur['id_equipe']) {
    echo '<p>L\'équipe domicile doit être différente de l\'équipe extérieur';
  }
  else {
    $bdd->query('INSERT INTO Rencontre (etape, date, id_competition, id_equipe_domicile, id_equipe_exterieur)
      VALUES (
        '.$_POST['etape'].',
        "'.$_POST['date'].'",
        '.$_POST['id_competition'].',
        '.$_POST['id_equipe_domicile'].',
        '.$_POST['id_equipe_exterieur'].')');
    echo '<p>Rencontre encodée, <a href="rencontres.php">retour aux rencontres</a></p>';
  }
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
