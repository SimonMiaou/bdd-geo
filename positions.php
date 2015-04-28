<?php include 'header.php' ?>
<h1>Positions</h1>

<table>
  <tr>
    <th>N. registre joueur</th>
    <th>Nom joueur</th>
    <th>Prénom joueur</th>
    <th>Position</th>
  </tr>
  <?php
  $req = $bdd->query('SELECT PositionJoueur.n_registre_joueur, Personne.nom, Personne.prenom, PositionJoueur.position
    FROM PositionJoueur JOIN Personne
    ON Personne.n_registre = PositionJoueur.n_registre_joueur');
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
