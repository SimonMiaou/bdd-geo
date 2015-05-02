<?php include 'header.php' ?>
<h1>Positions</h1>

<form method='get' action='positions.php'>
  <input type='text' name='n_registre_joueur' placeholder='N. registre joueur' required />
  <input type='submit' value='Soumettre' />
</form>

<table>
  <tr>
    <th>N. registre joueur</th>
    <th>Nom joueur</th>
    <th>Prénom joueur</th>
    <th>Position</th>
  </tr>
  <?php
  $where = '';
  if (isset($_GET['n_registre_joueur']) && $_GET['n_registre_joueur'] && $_GET['n_registre_joueur'] != '*') {
    $where = 'WHERE PositionJoueur.n_registre_joueur = '.intval($_GET['n_registre_joueur']);
  }
  $req = $bdd->query('SELECT PositionJoueur.n_registre_joueur, Personne.nom, Personne.prenom, PositionJoueur.position
    FROM PositionJoueur JOIN Personne
    ON Personne.n_registre = PositionJoueur.n_registre_joueur '.$where);
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['n_registre_joueur'] ?></td>
      <td><?php echo $tuple['nom'] ?></td>
      <td><?php echo $tuple['prenom'] ?></td>
      <td><?php echo $tuple['position'] ?></td>
    </tr>
    <?php
  }
  ?>
</table>

<?php include 'footer.php' ?>
