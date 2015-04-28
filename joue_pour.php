<?php include 'header.php' ?>
<h1>JouePour</h1>

<table>
  <tr>
    <th>N. registre joueur</th>
    <th>Joueur</th>
    <th>ID équipe</th>
    <th>Equipe</th>
    <th>Année</th>
  </tr>
  <?php
  $req = $bdd->query('SELECT JouePour.n_registre_joueur, Personne.prenom as prenom_joueur, Personne.nom as nom_joueur, JouePour.id_equipe, Equipe.nom as nom_equipe, JouePour.annee
    FROM JouePour
    JOIN Personne ON Personne.n_registre = JouePour.n_registre_joueur
    JOIN Equipe ON Equipe.id_equipe = JouePour.id_equipe');
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['n_registre_joueur'] ?></td>
      <td>
        <?php echo $tuple['prenom_joueur'] ?>
        <?php echo $tuple['nom_joueur'] ?>
      </td>
      <td><?php echo $tuple['id_equipe'] ?></td>
      <td><?php echo $tuple['nom_equipe'] ?></td>
      <td><?php echo $tuple['annee'] ?></td>
    </tr>
    <?php
  }
  ?>
</table>

<?php include 'footer.php' ?>
