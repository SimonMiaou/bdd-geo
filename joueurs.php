<?php include 'header.php' ?>
<h1>Joueurs</h1>

<table>
  <tr>
    <th>N. registre joueur</th>
    <th>Nom</th>
    <th>Prenom</th>
  </tr>
  <?php
  $req = $bdd->query('SELECT Joueur.n_registre_joueur, Personne.nom, Personne.prenom
                      FROM Joueur JOIN Personne
                      ON Personne.n_registre = Joueur.n_registre_joueur');
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['n_registre_joueur'] ?></td>
      <td><?php echo $tuple['nom'] ?></td>
      <td><?php echo $tuple['prenom'] ?></td>
    </tr>
    <?php
  }
  ?>
</table>

<?php include 'footer.php' ?>
